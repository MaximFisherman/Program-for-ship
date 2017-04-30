<?php
header('Content-type: text/html; charset=utf-8');
session_start();
include "../Clasess/Class_ship.php";
$ship_class = new Ship();
$ship_class->Add_resource($_POST['Date_resource'],$_POST['Element_resource'],$_POST['Hour_Guarantee']);
echo("<script>document.location.replace('../pages/Resource_of_exploitation.php');</script>");
?>