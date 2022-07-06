<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php
include('config/setting.php');
include('config/dbcon.php');
include('config/function.php');
session_start();
if (isset($_SESSION['usersession'])){
$usersession=$_SESSION['usersession'];
$rowcount=1;

}


//isset is function for u test whether variable
// exist or apache_note
// you if  ( condition) { action } else { another action}
if (isset($_GET['txtusername'])){
//  echo 'repost value exists';
$chkU=$_GET['txtusername'];
$chkP=$_GET['txtpassword'];
/*
      if (($chkU=='admin')&&($chkP=='123')){
          echo 'Success Login';
      }
      else {
        echo 'Error creditial';

      }
*/
$result=getlogin($chkU,$chkP,$virtual_con);

//check my $sql command
if (!$result){
  echo 'Could not run query' ;
}

//mysqli_fetch_assoc  retrieve the first row
$row=mysqli_fetch_assoc($result);
//count total rows
$rowcount=mysqli_num_rows($result);

//echo "Total user found =".$rowcount;
if ($rowcount==1){

  // get the user name


  $uname=	"<br>".$row['Name']."<br>";
  $to='studenthome.php';
  gotoInterface($to);


//  echo "Welcome to the ".$title." Mr. ".$uname;
  $_SESSION['usersession']=$chkU;


}
else {
  $chkU=$_GET['txtusername'];
  $chkP=$_GET['txtpassword'];
  /*
        if (($chkU=='admin')&&($chkP=='123')){
            echo 'Success Login';
        }
        else {
          echo 'Error creditial';

        }
  */
  $result=getloginlect($chkU,$chkP,$virtual_con);

  //check my $sql command
  if (!$result){
    echo 'Could not run query' ;
  }

  //mysqli_fetch_assoc  retrieve the first row
  $row=mysqli_fetch_assoc($result);
  //count total rows
  $rowcount=mysqli_num_rows($result);

  //echo "Total user found =".$rowcount;
  if ($rowcount==1){

    // get the user name


    $uname=	"<br>".$row['lect_name']."<br>";
    $to='lecturerhome.php';
    gotoInterface($to);


  //  echo "Welcome to the ".$title." Mr. ".$uname;
    $_SESSION['usersession']=$chkU;


  }
  else {
	$chkU=$_GET['txtusername'];
	$chkP=$_GET['txtpassword'];
	/*
		  if (($chkU=='admin')&&($chkP=='123')){
			  echo 'Success Login';
		  }
		  else {
			echo 'Error creditial';
  
		  }
	*/
	$result=getloginstaff($chkU,$chkP,$virtual_con);
  
	//check my $sql command
	if (!$result){
	  echo 'Could not run query' ;
	}
  
	//mysqli_fetch_assoc  retrieve the first row
	$row=mysqli_fetch_assoc($result);
	//count total rows
	$rowcount=mysqli_num_rows($result);
  
	//echo "Total user found =".$rowcount;
	if ($rowcount==1){
  
	  // get the user name
  
  
	  $uname=	"<br>".$row['name']."<br>";
	  $to='staffhome.php';
	  gotoInterface($to);
  
  
	//  echo "Welcome to the ".$title." Mr. ".$uname;
	  $_SESSION['usersession']=$chkU;
  
  
	}
	else{
		$msg11= "Your login is unsuccesful";
		$to='index.php';
		goto2 ($to,$msg11);
	}
    
  }

}
}

else{

//echo 'first time loading';

}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style id="applicationStylesheet" type="text/css">
	.mediaViewInfo {
		--web-view-name: Login;
		--web-view-id: Login;
		--web-scale-on-resize: true;
		--web-enable-deep-linking: true;
	}
	:root {
		--web-view-ids: Login;
	}
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		border: none;
	}
	#grad1 {
  height: 750px;
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(rgb(210, 45, 45),	rgb(172, 83, 83) );
}
	#Login {
		position: absolute;
		width: 1920px;
		height: 1080px;
		background-color: rgba(255,255,255,1);
		overflow: hidden;
		--web-view-name: Login;
		--web-view-id: Login;
		--web-scale-on-resize: true;
		--web-enable-deep-linking: true;
	}
	#Rectangle_5_h {
		fill: url(#Rectangle_5_h);
		stroke: rgba(112,112,112,1);
		stroke-width: 1px;
		stroke-linejoin: miter;
		stroke-linecap: butt;
		stroke-miterlimit: 4;
		shape-rendering: auto;
	}
	.Rectangle_5_h {
		position: absolute;
		overflow: visible;
		width: 1920px;
		height: 1080px;
		left: 0px;
		top: 0px;
	}
	#Rectangle_1 {
		fill: rgba(255,255,255,1);
		stroke: rgba(112,112,112,1);
		stroke-width: 1px;
		stroke-linejoin: miter;
		stroke-linecap: butt;
		stroke-miterlimit: 4;
		shape-rendering: auto;
	}
	.Rectangle_1 {
		position: absolute;
		overflow: visible;
		width: 648px;
		height: 731px;
		left: 636px;
		top: 174.5px;
	}
	#logo-removebg-preview {
		position: absolute;
		width: 175px;
		height: 175px;
		left: 873px;
		top: 205px;
		overflow: visible;
	}
	#Username {
		left: 683px;
		top: 415px;
		position: absolute;
		overflow: visible;
		width: 94px;
		white-space: nowrap;
		text-align: left;
		font-family: Segoe UI;
		font-style: normal;
		font-weight: normal;
		font-size: 20px;
		color: rgba(112,112,112,1);
	}
	#Password {
		left: 683px;
		top: 551px;
		position: absolute;
		overflow: visible;
		width: 88px;
		white-space: nowrap;
		text-align: left;
		font-family: Segoe UI;
		font-style: normal;
		font-weight: normal;
		font-size: 20px;
		color: rgba(112,112,112,1);
	}
	#Rectangle_2 {
		fill: rgba(255,255,255,1);
		stroke: rgba(112,112,112,1);
		stroke-width: 1px;
		stroke-linejoin: miter;
		stroke-linecap: butt;
		stroke-miterlimit: 4;
		shape-rendering: auto;
	}
	.Rectangle_2 {
		position: absolute;
		overflow: visible;
		width: 555px;
		height: 56px;
		left: 683px;
		top: 447px;
	}
	#Rectangle_3 {
		fill: rgba(255,255,255,1);
		stroke: rgba(112,112,112,1);
		stroke-width: 1px;
		stroke-linejoin: miter;
		stroke-linecap: butt;
		stroke-miterlimit: 4;
		shape-rendering: auto;
	}
	.Rectangle_3 {
		position: absolute;
		overflow: visible;
		width: 555px;
		height: 56px;
		left: 683px;
		top: 583px;
	}
	#Rectangle_4 {
		fill: rgba(8,146,213,1);
		stroke: rgba(112,112,112,1);
		stroke-width: 1px;
		stroke-linejoin: miter;
		stroke-linecap: butt;
		stroke-miterlimit: 4;
		shape-rendering: auto;
	}
	.Rectangle_4 {
		position: absolute;
		overflow: visible;
		width: 555px;
		height: 56px;
		left: 683px;
		top: 668px;
	}
	#Login_p {
		left: 917px;
		top: 683px;
		position: absolute;
		overflow: visible;
		width: 50px;
		white-space: nowrap;
		text-align: left;
		font-family: Segoe UI;
		font-style: normal;
		font-weight: normal;
		font-size: 20px;
		color: rgba(255,255,255,1);
	}
	#cent {
  position:absolute;
  top:50%;
  left:50%;
  margin-top:-190px; /* this is half the height of your div*/
  margin-left:-230px; /*this is half of width of your div*/
	width: 450px;
  border: 5px black;
	height:450px;
	border-radius: 25px;
background-color: white;
}
#center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.textbox{
	width: 300px;
	border: 1px solid grey;
	margin-left:70px;
	height:40px;
	border-radius: 25px;
	margin-bottom: 30px;
	font-family: Courier New;
}
#textboxlabel{
	margin-left:70px;
}
#loginbutton{
	border-radius: 25px;
	margin-left:180px;
	height:50px;
	width: 100px;
	font-size: 15px;
	background-color:rgb(0, 255, 255);
}
</style>

</head>
<body id="grad1">
  <?php if ((@$rowcount==0)||(!isset($_SESSION['usersession']))){ ?>
<div id=cent> <img id="center" src="img/logo-removebg-preview.png" alt="Trulli" width="150" height="150" >
	<form METHOD='GET' ACTION='index.php'>
		<br><br>
		<p id="textboxlabel">Username: </p>
		<input type="text" class="textbox" value="" id="txtusername" name="txtusername" ><br>
		<p id="textboxlabel">Password: </p>
		<input type="password" class="textbox" id="txtusername" name="txtpassword"><br>
		<input type="submit" id="loginbutton" value="Login" class="button button1" >

</form>

      </div>
	<!--	<form METHOD='GET' ACTION='login.php'>
		<b class=" gsap-reveal-hero">Username </b>
		<input type="text" value="" id="txtusername" name="txtusername" >
		<b class=" gsap-reveal-hero">Password </b>
		<input type="password" id="txtpassword" name="txtpassword">
		<input type="submit" value="Login" class="button button1" >
		<input type="reset" value="Clear" class="button button1">-->

<?php } ?>
</body>
</html>
