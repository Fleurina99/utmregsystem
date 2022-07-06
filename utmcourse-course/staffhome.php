<?php
	require_once('config.php');
	require_once('config/all.php');
	@session_start();
	$usersession=$_SESSION['usersession'];
	$uname=getusernamestaff($usersession,$virtual_con);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>UTMCourse</title>

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
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar">
		 <div id="logo"><?php echo "Welcome back ". $uname; ?></div>
		 <!-- Begin Menu -->
    <div id="menu" class="menu-v">
      <ul>
        <li><a href="staffhome.php" class="active">Home</a></li>
        <li><a href="staffprofile.php">Profile</a></li>
        <li><a href="studentlist.php">List Of Students</a></li>
        <li><a href="amendmentapp.php">Amendment Approval</a></li>
		<li><a href="staffviewcourse.php" class="active">View Course</a></li>
				<li><a href="addnewcourse.php">Add New Course</a></li>
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
	<h1 class="title">Home</h1>
	<div class="line"></div>
	<div class="intro">Welcome To UTM</div>


		<!-- Begin Post -->
	<div class="post">
		<img src="img/utm.png" alt="" />
		<!-- Begin Info -->
		<div class="info">
			<p>Testing</p>
		</div>

		<p>
			Welcome To Universiti Teknologi Malaysia (UTM) UTMCourse website. This website
			is still underdevelopment. We are hoping to improve our system for the better.
			Every feedbacks is appreciated.
		</p>
	</div>
<!-- End Wrapper -->

<script type="text/javascript" src="js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
