<?php
header('Content-type: text/html; charset=utf-8');
session_start();
include "../Clasess/Class_ship.php";
$ship_class = new Ship();

//Передача парметра в сессию
if(isset($_POST['id_ship']))
{
    $_SESSION['id_ship'] = $_POST['id_ship'];
}

if(isset($_GET['delete_ship'])) {
    $ship_class->delete_ship($_SESSION['id_ship']);
    unset($_SESSION['id_ship']);
   echo("<script>document.location.replace('../pages/Start_page.php');</script>");

}
?>