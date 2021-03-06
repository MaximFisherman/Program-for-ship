<?php
require_once("Class_base.php");
class Ship extends Base
{
    public $count_engine;

    //Добавление корабля
    function Add_ship($name_ship,$type_ship,$build_year_ship,$height,$length,$width,$snar_cargo,$max_cargo,$max_draft,$flag,$name_file_photo,$etalon_speed,$str_engine){
        mysqli_query($this->dlink, "INSERT INTO `Ships`(`name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,photo_ship, speed) VALUES ('".$name_ship."','".$type_ship."','".$build_year_ship."','".$height."','".$length."','".$width."','".$snar_cargo."','".$max_cargo."','".$max_draft."','".$flag."','".$name_file_photo."','".$etalon_speed."')");

        $str =  explode("|",$str_engine);

        for($i=0;$i<count($str)-1;$i++) {
            mysqli_query($this->dlink, " INSERT INTO `Engine_ship`(`name`, `power`) VALUES ('" . $name_ship . "','" . $str[$i] . "')");
        }
        echo("<script>document.location.replace('../pages/Start_page.php');</script>");
    }

    function Get_Path($name_ship){
        $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,photo_ship FROM `Ships` where name like '%".$name_ship."%'");
        $name_file = 0;
        while($arr = mysqli_fetch_array($result)) {
        $name_file = $arr['photo_ship'];
        }
        return $name_file;
    }

    function Update_ship($name_ship,$type_ship,$build_year_ship,$height,$length,$width,$snar_cargo,$max_cargo,$max_draft,$flag,$name_file_photo,$etalon_speed,$str_engine)
    {
            mysqli_query($this->dlink, "UPDATE `Ships` SET `name`='".$name_ship."',`type`='".$type_ship."',`build_year`='".$build_year_ship."',`height`='".$height."',`length`='".$length."',`width`='".$width."',`curb_weight`='".$snar_cargo."',`max_cargo`='".$max_cargo."',`max_draft`='".$max_draft."',`flag`='".$flag."',`photo_ship`='".$name_file_photo."',`speed`='".$etalon_speed."' where name like '%".$name_ship."%'");

            $str =  explode("|",$str_engine);
        for($i=0;$i<count($str)-1;$i++) {
            mysqli_query($this->dlink, "UPDATE `Engine_ship` SET `power`='".$str[$i]."' WHERE name like '%".$name_ship."%';");
        }
        echo("<script>document.location.replace('../pages/Start_page.php');</script>");
    }

    function delete_ship($name_ship){
        mysqli_query($this->dlink, "DELETE FROM `Ships` WHERE name like '%".$name_ship."%'");
    }

    function delete_record_to_table_ship($id){
        mysqli_query($this->dlink, "DELETE FROM `Ship_Resource` WHERE id= ".$id." ");
    }

    function Add_resource($date_resource,$element_resource,$hour_guarantee){
        mysqli_query($this->dlink,"INSERT INTO `Ship_Resource`(`name_ship`, `date_resource`, `element`, `hour_guarantee`,flag) VALUES ('".$_SESSION['Name_ship']."','".$date_resource."','".$element_resource."','".$hour_guarantee."','1')");
            $this->State_res(); //Внесение поправки в статистику с учетом нового параметра ремонта
    }

    function View_resource_ship_to_table(){
        $result =  mysqli_query($this->dlink, "SELECT id,`name_ship`, `date_resource`, `element`, `hour_guarantee` FROM `Ship_Resource` where name_ship like '%".$_SESSION['Name_ship']."%'");
        while($arr = mysqli_fetch_array($result)) {
            echo("
        <tr class=\"odd gradeX\">
                                            <td>" . $arr['date_resource'] . "</td>
                                            <td>".$arr['element']."</td>
                                            <td>".$arr['hour_guarantee']."</td>
                                            <td class=\"center\"><button onclick='Delete_record_resource(this);' id='".$arr['id']."' class=\"btn btn-danger btn-xs\"  ><span class=\"glyphicon glyphicon-trash\"></span></button></td>
        </tr>
        ");
        }

        //echo("<script>$('#Resource_of_exploitation').html($str);</script>");
    }

    //Применение новой работы для смены статистики рейса
    function State_res(){
        $result =  mysqli_query($this->dlink, "SELECT `id`, `name_ship`, `date_resource`, `element`, `hour_guarantee`,flag FROM `Ship_Resource` where name_ship like '%".$_SESSION['Name_ship']."%'");
        $state_work = null;
        while($arr = mysqli_fetch_array($result)) {
            if(strcasecmp($arr["element"],'Очистка корпуса')==0&&$arr['flag']='1'){
                mysqli_query($this->dlink, "UPDATE `Narost` SET `kg_narost`='0',`effectivnost`='0' WHERE name like '%".$_SESSION['Name_ship']."%' ");
                mysqli_query($this->dlink, "UPDATE `Ship_Resource` SET `flag`='0' WHERE  name like '%".$_SESSION['Name_ship']."%' ");
            }
            if(strcasecmp($arr["element"],'Замена корпуса')==0&&$arr['flag']='1'){
                mysqli_query($this->dlink, "UPDATE `Narost` SET `corrosion`='0',kg_narost='0',`effectivnost`='0' WHERE name like '%".$_SESSION['Name_ship']."%' ");
                mysqli_query($this->dlink, "UPDATE `Ship_Resource` SET `flag`='0' WHERE  name like '%".$_SESSION['Name_ship']."%' ");
            }
            if(strcasecmp($arr["element"],'Ремонт корпуса')==0&&$arr['flag']='1'){
                mysqli_query($this->dlink, "UPDATE `Narost` SET `corrosion`='0',kg_narost='0',`effectivnost`='0 WHERE name like '%".$_SESSION['Name_ship']."%' ");
                mysqli_query($this->dlink, "UPDATE `Ship_Resource` SET `flag`='0' WHERE  name like '%".$_SESSION['Name_ship']."%' ");
            }
        }
    }



    function View_ship_characteristics($nameship){
        $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,photo_ship FROM `Ships` where name like '%".$nameship."%'");
        while($arr = mysqli_fetch_array($result)) {
            echo("
            <script>
            $(\".name_ship\").text(\"".$arr['name']."\");
            $(\".length_ship\").text(\"".$arr['length']."\");
            $(\".width_ship\").text(\"".$arr['width']."\");
            $(\".height_ship\").text(\"".$arr['height']."\");
            $(\".max_draft_ship\").text(\"".$arr['max_draft']."\");
            $(\".type_ship\").text(\"".$arr['type']."\");
            $(\".curb_weight_ship\").text(\"".$arr['curb_weight']."\");
            $(\".year_build_ship\").text(\"".$arr['build_year']."\");
            $(\".max_cargo_ship\").text(\"".$arr['max_cargo']."\");
            $(\".flag_ship\").text(\"".$arr['flag']."\");//Если добавим флаг 
            
            //Фото корабля
            $('.photo_ship').attr('src', '".$arr['photo_ship']."');

            </script>
            ");
            /*
            echo("<td>" . $arr['name'] . "</td>");
            echo("<td>" . $arr['type'] . "</td>");
            echo("<td>" . $arr['build_year'] . "</td>");
            echo("<td>" . $arr['height'] . "</td>");
            echo("<td>" . $arr['length'] . "</td>");
            echo("<td>" . $arr['width'] . "</td>");
            echo("<td>" . $arr['flag'] . "</td>");*/
        }
        }

    function getCountEngine($name_ship){
        $result = mysqli_query($this->dlink, "Select `name`,`power` from  Engine_ship where name like '".$name_ship."'");
        $count = 0;
        while($arr = mysqli_fetch_array($result)) {
            $count ++;
            $this->count_engine = $count;
        }
    }

    function setPowerEngine($name_ship){
        $result = mysqli_query($this->dlink, "Select `name`,`power` from  Engine_ship where name like '".$name_ship."'");
        $count=0;
        while($arr = mysqli_fetch_array($result)) {
            $count++;
            echo("<script>
                $('#id_Engine_number_".$count."').val('".$arr['power']."');
            </script>
            ");
        }
    }

    function Edit_record_ship($name_ship){
        $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`,speed, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`, photo_ship FROM `Ships` where name like '%".$name_ship."%'");
        while($arr = mysqli_fetch_array($result)) {
           $this->getCountEngine($name_ship);// get count engine ship


            echo("<script>
        $('#id_Name_ship').val('".$arr['name']."');
        //Close input 
        $('#id_Name_ship').prop('disabled', true);
        
        $('#id_Height_ship').val('".$arr['height']."');
        $('#id_Width_ship').val('".$arr['width']."');
        $('#id_Length_ship').val('".$arr['length']."');
        $('#id_year_start_ship').val('".$arr['build_year']."');
        $('#id_Lifting_capacity').val('".$arr['max_cargo']."');
        $('#id_Curb_weight').val('".$arr['curb_weight']."');
        $('#id_maximum_draft').val('".$arr['max_draft']."');
        $('#id_Speed_ship').val('".$arr['speed']."');
        $('#id_flag_ship').val('".$arr['flag']."');
       
        
        //Secret input 
         $('#edit_ship').val('".$arr['name']."');
         
         //Select type ship  
         $('#id_Type_ship').val('".$arr['type']."');
         
        //count ship engine 
        $('#ship_engine_count').val('".$this->count_engine."');
        $( \"#ship_engine_count\" ).trigger( \"change\" );
        </script>
        ");
        }
        $this->View_table_ship();//View table ships
        $this->setPowerEngine($name_ship);//add to input record
    }


    function View_table_ship(){
       $result =  mysqli_query($this->dlink, "SELECT  `name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag` FROM `Ships` ");

        echo("
    <div class=\"container\">
    <div class=\"row\">
		
        
        <div class=\"col-md-12\">
        <h4>Таблица кораблей</h4>
        <div class=\"table-responsive\">

                
              <table id=\"mytable\" class=\"table table-bordred table-striped\">
                   
                   <thead>
                   <th>Имя корабля</th>
                    <th>Тип</th>
                     <th>Дата постройки</th>
                     <th>Высота</th>
                     <th>Длина</th>
                     <th>Ширина</th>
                     <th>Флаг</th>
                      
                      <th>Открыть</th>
                      <th>Изменить</th>
                      <th>Удалить</th>
                   </thead>
    <tbody>
    ");
    while($arr = mysqli_fetch_array($result)) {
    echo("<tr>");
        echo("<td>".$arr['name']."</td>");
        echo("<td>".$arr['type']."</td>");
        echo("<td>".$arr['build_year']."</td>");
        echo("<td>".$arr['height']."</td>");
        echo("<td>".$arr['length']."</td>");
        echo("<td>".$arr['width']."</td>");
        echo("<td>".$arr['flag']."</td>");
     echo("<td><a class=\"btn btn-primary btn-xs\" href='index.php?name_ship=".$arr['name']."'>Открыть</a></td>
    <td><a class=\"btn btn-warning btn-xs\" href='' onclick='Edit_ship(this)' id='".$arr['name']."'  data-toggle=\"modal\" data-target=\"#usuario\">Изменить</a></td>
    <td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button onclick='Delete_ship(this);' id='".$arr['name']."' class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#delete\" ><span class=\"glyphicon glyphicon-trash\"></span></a></p></td>
    ");

    echo("</tr>");
        }
        echo("
    <tr>
    
    </tbody>
        
</table>           
        </div>
	</div>
</div>


<div class=\"modal fade\" id=\"edit\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"edit\" aria-hidden=\"true\">
      <div class=\"modal-dialog\">
    <div class=\"modal-content\">
          <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></button>
        <h4 class=\"modal-title custom_align\" id=\"Heading\">Edit Your Detail</h4>
      </div>
          <div class=\"modal-body\">
          <div class=\"form-group\">
        <input class=\"form-control \" type=\"text\" placeholder=\"Mohsin\">
        </div>
        <div class=\"form-group\">
        
        <input class=\"form-control \" type=\"text\" placeholder=\"Irshad\">
        </div>
        <div class=\"form-group\">
        <textarea rows=\"2\" class=\"form-control\" placeholder=\"CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan\"></textarea>
    
        
        </div>
      </div>
          <div class=\"modal-footer \">
        <button type=\"button\" class=\"btn btn-warning btn-lg\" style=\"width: 100%;\"><span class=\"glyphicon glyphicon-ok-sign\"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class=\"modal fade\" id=\"delete\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"edit\" aria-hidden=\"true\">
      <div class=\"modal-dialog\">
    <div class=\"modal-content\">
          <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></button>
        <h4 class=\"modal-title custom_align\" id=\"Heading\">Delete this entry</h4>
      </div>
          <div class=\"modal-body\">
       
       <div class=\"alert alert-danger\"><span class=\"glyphicon glyphicon-warning-sign\"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class=\"modal-footer \">
        <a href='../php/Delete_ship_record.php?delete_ship=yes' type=\"button\" class=\"btn btn-success\" ><span class=\"glyphicon glyphicon-ok-sign\"></span> Yes</a>
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
            ");

    echo("
    
    ");
    }
}
?>