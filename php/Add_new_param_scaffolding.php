<?php
session_start();
require_once "../Clasess/Class_logic.php";
if(isset($_POST['name_layer'])){
    $_SESSION['name_layer_ses'] = $_POST['name_layer'];
    $_SESSION['speed_ship_ses'] = $_POST['speed_ship'];
}

echo("saa".$_SESSION['name_layer_ses'].$_SESSION['speed_ship_ses']);
?>