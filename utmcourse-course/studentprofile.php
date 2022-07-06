<?php
	require_once('config.php');
	require_once('config/all.php');
	@session_start();
	$usersession=$_SESSION['usersession'];
	$uname=getusername($usersession,$virtual_con);
	$sql="SELECT * FROM `students` WHERE (`Name`='".$uname."')";
$result=mysqli_query($virtual_con,$sql);
$row=mysqli_fetch_assoc($result);

if (isset($_GET['userid'])) {
	$userid=$_GET['userid'];

}
else if (isset($_POST['userid']))  {

  $sqlupdate="UPDATE `students` SET `Password` = '".$_POST['Password']."',`Email` = '".$_POST['Email']."' WHERE `Matric_ID` ='".$_POST['Matric_ID']."'";
$result=mysqli_query($virtual_con,$sqlupdate);
$to="studentprofile.php";
if ($result>0){
//delete  Success
$msg="Update is successful";
}else{
//delete failure
$msg="Update is not successful";
}
goto2($to,$msg);



}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Student Profile</title>

<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Amaranth:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="js/jquery.slickforms.js"></script>
<script type="text/javascript" src="js/edit.js"></script>
</head>
<body onload="checkEdits()">
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar">
		 <div id="logo"><?php echo "Welcome back ". $uname; ?></div>
		 <!-- Begin Menu -->
    <div id="menu" class="menu-v">
			<ul>
			<li><a href="studenthome.php" >Home</a></li>
				<li><a href="studentprofile.php" class="active">Profile</a></li>
			  <li><a href="studentviewcourse.php">View Course</a></li>
				<li><a href="reg.php">Course Registration</a></li>
				<li><a href="prereg2.php" >Course Pre-Registration</a></li>
				<li><a href="studentform.php">Amendment Form</a></li>
				<li><a href="submitcourse.php">Course Submission</a></li>
				<li><a href="coursestatus.php">Course Status</a></li>
				<li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <!-- End Menu -->

    <div class="sidebox">
    <div class="search">
      <h3>Search</h3>
      <form class="searchform" method="get">
          <input type="text" id="s" name="s" value="type and hit enter" onfocus="this.value=''" onblur="this.value='type and hit enter'"/>
      </form>
      <div class="clear"></div>
    </div>
  </div>

	</div>
	<!-- End Sidebar -->

	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Profile</h1>
	<div class="line"></div>
	<div class="col-md-7 mx-auto text-center">
              <h1 class="heading gsap-reveal-hero">Edit Your Profile</h1>


              <form name="updateuser" action="studentprofile.php" onsubmit="return checkfield1()" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                      	<label for="UserID" class=" gsap-reveal-hero">Matric No</label>
                           <input readonly name="Matric_ID" type="text" value="<?php echo $row['Matric_ID']; ?>" />
              		     </div>
                       <div class="form-group">
              			<label for="password" class=" gsap-reveal-hero">Password*</label>
                          <input name="Password" id="password" type="text" value="<?php echo $row['Password'];?>" />
                      </div>
                      <div class="form-group">
                   <label for="Email" class=" gsap-reveal-hero">Email*</label>
                         <input type="email" name="Email" id="email" type="text" value="<?php echo $row['Email'];?>" />
                     </div>
                  
               <button type="submit" class="btn btn-default button button1" >Update</button>
              </form>



            </div>

	<div class="line"></div>
	
		<!-- Begin Post -->
	

<div class="clear"></div>
<script type="text/javascript" src="js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
