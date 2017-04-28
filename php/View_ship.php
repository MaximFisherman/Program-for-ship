<?php
header('Content-type: text/html; charset=utf-8');
include "../Clasess/Class_ship.php";
$ship_class = new Ship();
$ship_class->View_table_ship();
?>