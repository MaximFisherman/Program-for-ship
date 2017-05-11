<?php
header('Content-type: text/html; charset=utf-8');
include "../Clasess/Class_ship.php";
echo("ZANCH".$_POST['Name_ship'].$_POST['Height_ship'].$_POST['Width_ship'].$_POST['Length_ship']."<br>Type ship:".$_POST['Type_ship']);
echo("Year build ship:".$_POST['Year_start_ship']);
echo("Snar cargo ship:".$_POST['Curb_weight']);
echo("Lifting capacity".$_POST["Lifting_capacity"]);
echo("maximum draft".$_POST['maximum_draft']);
echo("Flag_ship".$_POST['Flag_ship']);
$ship_class = new Ship();
$str_engine=null;
for($i=0;$i<$_POST['length_count_ship_engine_php'];$i++)
$str_engine.= $_POST['Engine_number_'.($i+1).'']."|";
echo("<br>".$str_engine);

if(!(isset($name_file))) {
    $uploaddir = '../File/Ship/';
    $uploadfile = $uploaddir . basename($_FILES['photo_new_ship']['name']);
    $name_file = null;
    if (move_uploaded_file($_FILES['photo_new_ship']['tmp_name'], $uploadfile)) {
        $type_file = pathinfo($uploadfile, PATHINFO_EXTENSION);
        $name_file = $uploaddir . "" . uniqid() . "." . $type_file;
        rename($uploadfile, $name_file);
    } else {
        echo "";
    }
}

if($_POST['name_edit_ship']!=''){

        if(isset($name_file)) {
            $ship_class->Update_ship($_POST['name_edit_ship'], $_POST['Type_ship'], $_POST['Year_start_ship'], $_POST['Height_ship'], $_POST['Length_ship'], $_POST['Width_ship'], $_POST['Curb_weight'], $_POST["Lifting_capacity"], $_POST['maximum_draft'], $_POST['Flag_ship'], $name_file, $_POST['Speed_ship'], $str_engine);
        }else {
            $name_file = $ship_class->Get_Path($_POST['name_edit_ship']);
            echo("Hello ".$name_file);
            $ship_class->Update_ship($_POST['name_edit_ship'], $_POST['Type_ship'], $_POST['Year_start_ship'], $_POST['Height_ship'], $_POST['Length_ship'], $_POST['Width_ship'], $_POST['Curb_weight'], $_POST["Lifting_capacity"], $_POST['maximum_draft'], $_POST['Flag_ship'], $name_file, $_POST['Speed_ship'], $str_engine);
        }

}else {
    $ship_class->Add_ship($_POST['Name_ship'], $_POST['Type_ship'], $_POST['Year_start_ship'], $_POST['Height_ship'], $_POST['Length_ship'], $_POST['Width_ship'], $_POST['Curb_weight'], $_POST["Lifting_capacity"], $_POST['maximum_draft'], $_POST['Flag_ship'], $name_file, $_POST['Speed_ship'], $str_engine);
}
?>