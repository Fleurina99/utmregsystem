<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<?php
 require_once('config/setting.php');
 require_once('config/dbcon.php');
 require_once('config/function.php');

session_start();
session_destroy();
$to='index.php';
gotoInterface($to);

?>
