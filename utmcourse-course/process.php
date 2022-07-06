<?php

$mysqli = new mysqli('localhost','root','','usersdb') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $Course_ID = $_POST['Course_ID'];
    $Course_Name = $_POST['Course_Name'];
    $Course_Desc = $_POST['Course_Desc'];

    $mysqli->query("INSERT INTO coursedesc (Course_ID, Course_Name, Course_Desc) VALUES ('$Course_ID', '$Course_Name', '$Course_Desc')") or
    die($mysqli->error);
}

?>