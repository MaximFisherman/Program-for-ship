<?php
header('Content-type: text/html; charset=utf-8');
session_start();
include "../Clasess/Class_ship.php";
$ship_class = new Ship();

//Передача парметра в сессию
if(isset($_POST['id_resource']))
{
    $ship_class->delete_record_to_table_ship($_POST['id_resource']);
}

?>