<?php
require_once('config/setting.php');
//require_once - the call of external file
//will reduce error of recalling
//include - recall it will produce error - declare duplicate
//require - recall it will produce error - declare duplicate
//this is connection name
$virtual_con=mysqli_connect($hostname,$userdb,$passwd,$database);
// command for to connect to database
?>
