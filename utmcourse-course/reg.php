<?php
require_once('config/all.php');
$sql='SELECT * FROM `Course`';
$result=mysqli_query($virtual_con,$sql);
$num_row=mysqli_num_rows($result);
$counter=1;
@session_start();
$usersession=$_SESSION['usersession'];
$uname=getusername($usersession,$virtual_con);
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
      <li><a href="studenthome.php" >Home</a></li>
				<li><a href="studentprofile.php">Profile</a></li>
			  <li><a href="studentviewcourse.php">View Course</a></li>
				<li><a href="reg.php" class="active">Course Registration</a></li>
				<li><a href="prereg2.php">Course Pre-Registration</a></li>
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
	<h1 class="title">Registration</h1>
	<div class="line"></div>
	<div class="intro">


	</div>


		<!-- Begin Post -->
	<div class="post">

		<!-- Begin Info -->
		<div class="info">

			<p></p>
      <table class="table">
       <thead class="thead-dark">
         <tr >

           <th scope="col">Code</th>
           <th scope="col">Section</th>
           <th scope="col">Course</th>
           <th scope="col">Credit</th>
            <th scope="col">Course Detail</th>
           <th scope="col">Add Course</th>


         </tr>
       </thead>
     <tbody>
       <?php while($row=mysqli_fetch_assoc($result)){?>
       <tr>

       <td><?php echo $row['Course_ID'];?></td>
       <td><?php echo $row['Class_ID'];?></td>
       <td><?php echo $row['Course_Name'];?></td>
       <td><?php echo $row['Credit_Hour'];?></td>
       <td><a href="coursedetail.php?courseid=<?php echo $row['Course_Code'];?>">Detail</a></td>
       <td><a href="addcourse.php?courseid=<?php echo $row['Course_Code'];?>">Add Course</a></td>
     </tr>
     <?php } ?>
     </tbody>
     </table>
		</div>
		<div class="clear"></div>
		<!-- End Info -->

	</div>
<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
