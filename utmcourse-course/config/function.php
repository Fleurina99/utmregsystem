<?php

function getusername($uid, $virtual_con){
  // get the user name

$sql="select * from students where Matric_ID='".$uid."'";
  $result=mysqli_query($virtual_con,$sql);
  $row=mysqli_fetch_assoc($result);

  return $row['Name'];
  //echo "Welcome back ". $uname." User has log on before";
  //populate the user name to $uname
}

function getusernamelect($uid, $virtual_con){
  // get the user name

$sql="select * from lect where lect_id='".$uid."'";
  $result=mysqli_query($virtual_con,$sql);
  $row=mysqli_fetch_assoc($result);

  return $row['lect_name'];
  //echo "Welcome back ". $uname." User has log on before";
  //populate the user name to $uname
}
function getusernamestaff($uid, $virtual_con){
  // get the user name

$sql="select * from staff where staffId='".$uid."'";
  $result=mysqli_query($virtual_con,$sql);
  $row=mysqli_fetch_assoc($result);

  return $row['name'];
  //echo "Welcome back ". $uname." User has log on before";
  //populate the user name to $uname
}
function getuserID($uid, $virtual_con){
  // get the user name

$sql="select * from students where Matric_ID='".$uid."'";
  $result=mysqli_query($virtual_con,$sql);
  $row=mysqli_fetch_assoc($result);

  return $row['Matric_ID'];
  //echo "Welcome back ". $uname." User has log on before";
  //populate the user name to $uname
}
function getuserIDlect($uid, $virtual_con){
  // get the user name

$sql="select * from lect where lect_id='".$uid."'";
  $result=mysqli_query($virtual_con,$sql);
  $row=mysqli_fetch_assoc($result);

  return $row['lect_id'];
  //echo "Welcome back ". $uname." User has log on before";
  //populate the user name to $uname
}
function getlogin($chkU,$chkP,$virtual_con){
  //validation of usersdb
  $sql="select * from students where Matric_ID='".$chkU."'
  and  Password='".$chkP."'";
  //echo $sql;
  //create an sql statement need execute this command
  // mysqli_query($connection,$sqlstament)
  $result=mysqli_query($virtual_con,$sql);
  return $result;
}
function getloginlect($chkU,$chkP,$virtual_con){
  //validation of usersdb
  $sql="select * from lect where lect_id='".$chkU."'
  and  password='".$chkP."'";
  //echo $sql;
  //create an sql statement need execute this command
  // mysqli_query($connection,$sqlstament)
  $result=mysqli_query($virtual_con,$sql);
  return $result;
}
function getloginstaff($chkU,$chkP,$virtual_con){
  //validation of usersdb
  $sql="select * from staff where staffId='".$chkU."'
  and  password='".$chkP."'";
  //echo $sql;
  //create an sql statement need execute this command
  // mysqli_query($connection,$sqlstament)
  $result=mysqli_query($virtual_con,$sql);
  return $result;
}

//to jump to the next page
function gotoInterface($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}

?>
