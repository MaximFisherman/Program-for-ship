<?php
require_once("Class_base.php");
class Ship extends Base
{
    //Добавление корабля
    function Add_ship($name_ship,$type_ship,$build_year_ship,$height,$length,$width,$snar_cargo,$max_cargo,$max_draft,$flag,$name_file_photo){
        mysqli_query($this->dlink, "INSERT INTO `Ships`(`name`, `type`, `build_year`, `height`, `length`, `width`, `curb_weight`, `max_cargo`, `max_draft`, `flag`,photo_ship) VALUES ('".$name_ship."','".$type_ship."','".$build_year_ship."','".$height."','".$length."','".$width."','".$snar_cargo."','".$max_cargo."','".$max_draft."','".$flag."','".$name_file_photo."')");
        echo("<script>document.location.replace('../pages/Start_page.php');</script>");
        }
    function delete_ship($name_ship){
        mysqli_query($this->dlink, "DELETE FROM `Ships` WHERE name like '%".$name_ship."%'");
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
                      
                      <th>Открыть подробнее</th>
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
     echo("<td><a class=\"btn btn-primary btn-xs\" href='index.html'>Открыть</a></td>
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