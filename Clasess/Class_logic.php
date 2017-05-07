<?php
require_once("Class_base.php");
class Logic extends Base
{
    public $corrosion_boost; //В слуае если процент наростов выше 30% то корроизия увеличивается в 1.5
    public $speed_ship; //Средняя скорость корабля
    public $weight_ship; //Средняя скорость корабля
    public $gasoline_costs_mas = array();//Расход топлива на двигатели теоретический расход без наростов
    public $gasoline_costs_mas_real = array();//Реальный расход топлива с учетом наростов
    public $procent_effective;
    public $corrosion_effect;//Эффект коррозии на корпус корабля

    public $time_reise = array();

    function Corrosion_boost_check(){
        $result =  mysqli_query($this->dlink, "SELECT  name,kg_narost,effectivnost From Narost where name like '%".$_SESSION['Name_ship']."%'");
        $narost=null;
        while($arr = mysqli_fetch_array($result)) {
            $narost += $arr['kg_narost'];
        }

        $this->get_mass_ship();
        //$procent_narost = ($narost * $this->weight_ship);
        $procent_narost = ($narost * 100)/$this->weight_ship;
        //ТОгда эффект увеличения коррозии увеличивается
        if($procent_narost>30)$this->corrosion_boost = 1;
    }


    function add_param_narost_to_table($name_ship,$kg_narost,$time,$way){
        //Просчет как это будет влиять на эффективность движения судна и развите корроизии судна
        //Поличение веса корабля с учетом оборудования
        $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,speed FROM `Ships` where name like '%".$name_ship."%'");
        $weight=null;
        $sred_speed_ship = null;
        while($arr = mysqli_fetch_array($result)) {
            $weight = $arr['curb_weight'] - $arr['max_cargo'];
            $sred_speed_ship = $arr['speed']*1.852;
        }

        //$effectivnost  = ($sred_speed_ship*$kg_narost)/$weight; //Процент снижения эффективности хода корабля (снижение скорости)
        $temp = ($kg_narost*0.07)/ 100 ;

        $effectivnost = ($sred_speed_ship * $temp)/1;
        mysqli_query($this->dlink,"INSERT INTO `Narost`(`name`, `kg_narost`, `effectivnost`,time, way, corrosion) VALUES ('".$name_ship."','".$kg_narost."','".$effectivnost."','".$time."','".$way."','".$this->corrosion_effect."')");
    }

    function view_statistic(){
        $result =  mysqli_query($this->dlink, "SELECT  name,kg_narost,effectivnost,corrosion From Narost where name like '%".$_SESSION['Name_ship']."%'");
        $speed_down=null;
        $count_reice_ship=0;
        $corrosion_effect = null;
        while($arr = mysqli_fetch_array($result)) {
            $speed_down += $arr['effectivnost'];
            $corrosion_effect[$count_reice_ship]=$arr['corrosion'];
            $this->Calculation_oil($count_reice_ship);
            $count_reice_ship++;
        }
        $this->get_sred_speed_ship();
        $result_speed = ($this->speed_ship*1.852)-$speed_down;
        $result_speed =  $result_speed / 1.852;
        //Диаграмма снижения скорости
        echo("<script>
        Morris.Donut({
        element: 'morris-donut-chart',
        data: [
            {label: \"Скорость корабля в узлах\", value:".$result_speed." },
            {label: \"Эффект наростов на корпус\", value: ".$speed_down/1.852."},
        ]
    });
    </script>");
    //Chart corrosion on the voyage
        echo("<script>
new Morris.Line({
  element: 'Line-chart-corrosion',
  data: [");

        for($i=0;$i<$count_reice_ship;$i++) {
            echo("
    { y: '".($i+1)."', a: ".$corrosion_effect[$i]." },
    ");
        }
        echo("],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Количество проржавевшего метала в граммах']
});
</script>");


        //Диаграмма расхода топлива
        echo("<script>
new Morris.Line({
  element: 'Line-chart',
  data: [");

        for($i=0;$i<$count_reice_ship;$i++) {
            echo("
    { y: '".($i+1)."', a: ".$this->gasoline_costs_mas[$i].", b: ".$this->gasoline_costs_mas_real[$i]." },
    ");
        }
  echo("],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Идеальный расход топлива', 'Реальный расход топлива']
});
</script>");


        /////Диаграмма количетва наростов за все рейсы
        echo("
        <script>
         Morris.Bar({
        element: 'morris-bar-chart',
         data: [ ");
        $i=0;
        $result =  mysqli_query($this->dlink, "SELECT  name,kg_narost,effectivnost From Narost where name like '%".$_SESSION['Name_ship']."%'");
        while($arr = mysqli_fetch_array($result)) {
            $i++;
            echo("
        { y: ".$i.", a: ".$arr['kg_narost']."},
        ");
        }
        echo("
        ],
         xkey: 'y',
         ykeys: ['a'],
         labels: ['Количество кг наростов на корпусе']
});
    
        </script>
        ");

        /////Диаграмма км по рейсам
        echo("
        <script>
         Morris.Bar({
        element: 'morris-bar-chart-km',
         data: [ ");
        $i=0;
        $result =  mysqli_query($this->dlink, "SELECT  name,kg_narost,effectivnost,Way From Narost where name like '%".$_SESSION['Name_ship']."%'");
        while($arr = mysqli_fetch_array($result)) {
            $i++;
            echo("
        { y: ".$i.", a: ".$arr['Way']."},
        ");
        }
        echo("
        ],
         xkey: 'y',
         ykeys: ['a'],
         labels: ['км']
});
    
        </script>
        ");

    }

    function get_mass_ship(){
        $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,speed FROM `Ships` where name like '%".$_SESSION['Name_ship']."%'");
        while($arr = mysqli_fetch_array($result)) {
            $this->weight_ship = $arr['curb_weight'] - $arr['max_cargo'];
        }
    }

    function get_sred_speed_ship(){
        $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,speed FROM `Ships` where name like '%".$_SESSION['Name_ship']."%'");
        while($arr = mysqli_fetch_array($result)) {
            $this->speed_ship = $arr['speed'];
        }
    }

    function get_time_way(){
        $result =  mysqli_query($this->dlink, "SELECT  `id_narost`, `name`, `kg_narost`, `effectivnost`, `Time`, `Way` FROM `Narost` where name like '%".$_SESSION['Name_ship']."%'");
        $i=0;
        while($arr = mysqli_fetch_array($result)) {
            $this->time_reise[$i] = $arr['Time'];
            $i++;
        }
    }

    function get_procent_effective($i){
        $result =  mysqli_query($this->dlink, "SELECT  name,kg_narost,effectivnost From Narost where name like '%".$_SESSION['Name_ship']."%' limit ".($i+1)."");
        $sum_narost=null;
        while($arr = mysqli_fetch_array($result)) {
             $sum_narost += $arr['kg_narost'];
        }
        $s=($sum_narost *0.07)/100;
        $this->procent_effective = $s;
    }

    function Calculation_oil($i){
        $result =  mysqli_query($this->dlink, "SELECT `id_engine`, `name`, `power` FROM `Engine_ship` WHERE name like '%".$_SESSION['Name_ship']."%'");
        $this->get_time_way();

        $summ_coast_gazoline = null;
        $summ_coast_gazoline_real = null;//Рельная стоимость топлива с учетом наростов
        $TEMP_summ_coast_gazoline_real = null;
        while($arr = mysqli_fetch_array($result)) {
            $G=(0.27)/($arr['power']);
            $N=($arr['power']*$G);
            $N*=$arr['power'];
            //Теоритические расчеты стоимости топлива
            $summ_coast_gazoline += ($N*$this->time_reise[$i]);
            $TEMP_summ_coast_gazoline_real = $summ_coast_gazoline;

            //Реальные затраты топлива с учетом наростов на корпусе
            $this->get_procent_effective($i);//Получение процента эфективности и расчет того какой процент наростов и на сколько процентов влияет на эфективность судна
            $Edit_coast_gazoline = ( $TEMP_summ_coast_gazoline_real * $this->procent_effective )/1;

            $summ_coast_gazoline_real+=$Edit_coast_gazoline;;


            //$G=(0.27 * 95.6148);
            //$real_oil = (95.6148*1*$G*0.3)/0.85;
            //echo("<br>Oil".$i." = ".$N*$arr['power']."л/ч");
        }

        $this->gasoline_costs_mas[$i] = $summ_coast_gazoline;
        $this->gasoline_costs_mas_real[$i] = $summ_coast_gazoline_real+$this->gasoline_costs_mas[$i];
    }

//Расчет процента коррозии металла корабля
    function calculation_corrosion($mass_cargo,$time){
        $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,speed FROM `Ships` where name like '%".$_SESSION['Name_ship']."%'");
        $S = null; //Area
        $mass_ship=null;//weight ship
        $M = null;//Общий вес корабля с грузом
        while($arr = mysqli_fetch_array($result)) {
            $S = 2*(($arr['height']*$arr['length'])+($arr['height']*$arr['width']+($arr['length']*$arr['width'])));
            $M = $arr['curb_wight']-$arr['max_cargo']+$mass_cargo;
        }

        $V=$M/($time*$S);

        $this->Corrosion_boost_check();//Ускоритель коррозии метоала (при количестве наростов больше 30% от массы корабля)
        if($this->corrosion_boost == 1)//Если значение ускорителя коррозии равно 1 то коррозия метала увеличивается в 1.5 раза
        $this->corrosion_effect=abs($V)*$time*1.5;
        else
        $this->corrosion_effect=abs($V)*$time;
    }

//Функция принимающая запрос со стороны клиента и обрабатывает и запихивает значения в БД
    function calculation($layer_length, $mass_cargo){

        $temp_length = explode("|", $layer_length);
        //echo("<script> alert('asdas".$temp_length[0]."');</script>");
        $temp_number = null;
        $number = null;
        $length = null;
        for($i=0;$i<count($temp_length);$i++) {
            $pos = strpos($temp_length[$i], "%");
            $temp_str = $temp_length[$i];
            $number[$i] = substr($temp_str,0,$pos);
            $length[$i] = substr($temp_length[$i],$pos+1,strlen($temp_length[$i]));
        }
        $this->get_sred_speed_ship();
        $speed_km = 1.852 * $this->speed_ship;
        $zone_temperature = null;
        $sum_time = null;//Подсчет количества времени общего на маршрут
        $sum_length = null; // Подсчет общей длины маршрута
        for($i=0;$i<count($temp_length)-1;$i++) {
            $t_ship[$i] = $length[$i] / $speed_km;

            $sum_time+=$t_ship[$i];
            $sum_length+=$length[$i];

            if(strcasecmp($number[$i],'1')||strcasecmp($number[$i],'9')||strcasecmp($number[$i],'11'))
                $zone_temperature[$i] = 0.03 * $t_ship[$i];
            if(strcasecmp($number[$i],'2')||strcasecmp($number[$i],'5')||strcasecmp($number[$i],'6')||strcasecmp($number[$i],'8')||strcasecmp($number[$i],'10'))
                $zone_temperature[$i] = 0.05 * $t_ship[$i];
            if(strcasecmp($number[$i],'3')||strcasecmp($number[$i],'4')||strcasecmp($number[$i],'7'))
                $zone_temperature[$i] = 0.075 * $t_ship[$i];
        }
        $this->calculation_corrosion($mass_cargo,$sum_time);//Подсчет коррозийного эффекта а рейс
        $kg_narost=null;
        for($i=0;$i<count($temp_length)-1;$i++){
            $kg_narost += $zone_temperature[$i];
        }

        $this->add_param_narost_to_table($_SESSION['Name_ship'],$kg_narost,$sum_time,$sum_length);//Добаление количества наростов с маршрута в журнал

    }


    function Clear_map_slice(){
        echo("
        <script>
                                    $('.clearClass').click(function() {
                                        var id_elem = $(this).attr('id');
                                        if(id_elem == '1_clear'){
                                            alert('yea');ctx1.clearRect(0,0,10000,10000);
                                        }
                                    });
                                
        </script>
        ");
    }

    function View_peace_map($str){
        echo("<script>var array_DEL = [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1];//Масив для удаления лишних элементов canvas </script>");


        $pieces = explode("%", $str);
        for($i=0;$i<=count($pieces);$i++){
            //echo("<script>alert('".$pieces[$i]."');</script>");
            if(strcasecmp($pieces[$i],"cold_water_1")==0){
                echo("<script>
array_DEL[1]=1;
var example1 = document.getElementById(\"1\"),
ctx1       = example1.getContext('2d'), //Контекст
pic1       = new Image();              // \"Создаём\" изображение
pic1.src    = '../File/Slice_map/1.jpg';  // Источник изображения, позаимствовано на хабре
pic1.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx1.drawImage(pic1, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }

            if(strcasecmp($pieces[$i],"warm_water_2")==0){
                echo("<script>
array_DEL[2]=2;
var example2 = document.getElementById(\"2\"),
ctx2       = example2.getContext('2d'), //Контекст
pic2       = new Image();              // \"Создаём\" изображение
pic2.src    = '../File/Slice_map/2.jpg';  // Источник изображения, позаимствовано на хабре
pic2.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx2.drawImage(pic2, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }

            if(strcasecmp($pieces[$i],"hot_water_3")==0){
                echo("<script>
array_DEL[3]=3;
var example3 = document.getElementById(\"3\"),
ctx3       = example3.getContext('2d'), //Контекст
pic3       = new Image();              // \"Создаём\" изображение
pic3.src    = '../File/Slice_map/3.jpg';  // Источник изображения, позаимствовано на хабре
pic3.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx3.drawImage(pic3, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }

            if(strcasecmp($pieces[$i],"hot_water_4")==0){
                echo("<script>
array_DEL[4]=4;
var example4 = document.getElementById(\"4\"),
ctx4       = example4.getContext('2d'), //Контекст
pic4       = new Image();              // \"Создаём\" изображение
pic4.src    = '../File/Slice_map/4.jpg';  // Источник изображения, позаимствовано на хабре
pic4.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx4.drawImage(pic4, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }

            if(strcasecmp($pieces[$i],"warm_water_5")==0){
                echo("<script>
array_DEL[5]=5;
var example5 = document.getElementById(\"5\"),
ctx5       = example5.getContext('2d'), //Контекст
pic5       = new Image();              // \"Создаём\" изображение
pic5.src    = '../File/Slice_map/5.jpg';  // Источник изображения, позаимствовано на хабре
pic5.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx5.drawImage(pic5, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
}
                </script>");
            }

            if(strcasecmp($pieces[$i],"warm_water_6")==0){
                echo("<script>
array_DEL[6]=6;
var example6 = document.getElementById(\"6\"),
ctx6       = example6.getContext('2d'), //Контекст
pic6       = new Image();              // \"Создаём\" изображение
pic6.src    = '../File/Slice_map/6.jpg';  // Источник изображения, позаимствовано на хабре
pic6.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx6.drawImage(pic6, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }

            if(strcasecmp(trim($pieces[$i]),"hot_water_7")==0){
                echo("<script>
array_DEL[7]=7;
var example7 = document.getElementById(\"7\"),
ctx7       = example7.getContext('2d'), // Контекст
pic7       = new Image();              // \"Создаём\" изображение
pic7.src    = '../File/Slice_map/7.jpg';  // Источник изображения, позаимствовано на хабре
pic7.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx7.drawImage(pic7, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }

            if(strcasecmp(trim($pieces[$i]),trim("warm_water_8"))==0){
            echo("<script>
array_DEL[8]=8;
var example8 = document.getElementById(\"8\"),
ctx8       = example8.getContext('2d'), // Контекст
pic8       = new Image();              // \"Создаём\" изображение
pic8.src    = '../File/Slice_map/8.jpg';  // Источник изображения, позаимствовано на хабре
pic8.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx8.drawImage(pic8, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
        }
            if(strcasecmp($pieces[$i],"cold_water_9")==0){
                echo("<script>
array_DEL[9]=9;
var example9 = document.getElementById(\"9\"),
ctx9       = example9.getContext('2d'), // Контекст
pic9       = new Image();              // \"Создаём\" изображение
pic9.src    = '../File/Slice_map/9.jpg';  // Источник изображения, позаимствовано на хабре
pic9.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx9.drawImage(pic9, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }
            if(strcasecmp($pieces[$i],"warm_water_10")==0) {
                echo("<script>
array_DEL[10]=10;
var example10 = document.getElementById(\"10\"),
ctx10       = example10.getContext('2d'), // Контекст
pic10       = new Image();              // \"Создаём\" изображение
pic10.src    = '../File/Slice_map/10.jpg';  // Источник изображения, позаимствовано на хабре
pic10.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx10.drawImage(pic10, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
            }
                if(strcasecmp($pieces[$i],"cold_water_11")==0){
                    echo("<script>
array_DEL[11]=11;
var example11 = document.getElementById(\"11\"),
ctx11       = example11.getContext('2d'), // Контекст
pic11       = new Image();              // \"Создаём\" изображение
pic11.src    = '../File/Slice_map/11.jpg';  // Источник изображения, позаимствовано на хабре
pic11.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
ctx11.drawImage(pic11, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
};
                </script>");
                }
        }

        echo("
<script>
        var del_mas = [1,2,3,4,5,6,7,8,9,10,11];
        //Удаление элемнтов
        for(var j =1;j<array_DEL.length;j++){
        for(var i=1;i<=11;i++){
            if(array_DEL[j]==i)
                {del_mas[i-1]=0;}
        }
        }
        for(var r=0;r<del_mas.length;r++){ 
            $('#'+del_mas[r]+'_del').empty();
        }
 </script>
        ");

    }

}
?>