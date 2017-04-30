<?php
require_once("Class_base.php");
class Logic extends Base
{
    function add_param_to_table(){

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
            //alert(array_DEL[j]);
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