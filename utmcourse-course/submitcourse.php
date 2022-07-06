<?php
require_once('config/all.php');

@session_start();
$usersession=$_SESSION['usersession'];
$uname=getusername($usersession,$virtual_con);
$unid=getuserID($usersession,$virtual_con);
$sql="select * from Student_Course where Matric_ID='".$unid."'";
$result2=mysqli_query($virtual_con,$sql);
$row=mysqli_fetch_assoc($result2);
$msg[1]=$row['Course1'];
$msg[2]=$row['Course2'];
$msg[3]=$row['Course3'];
$msg[4]=$row['Course4'];
$msg[5]=$row['Course5'];
$msg[6]=$row['Course6'];
$msg[7]=$row['Course7'];
$msg[8]=$row['Course8'];
$msg[9]=$row['Course9'];
$msg[10]=$row['Course10'];
$to="submitcourse.php";
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
				<li><a href="reg.php">Course Registration</a></li>
				<li><a href="prereg2.php" class="active">Course Pre-Registration</a></li>
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
	<h1 class="title">Submit Course</h1>
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

            <th scope="col">Course Code</th>
            <th scope="col">Course Name</th>
            <th scope="col">Program</th>
            <th scope="col">Credit Hour</th>
             <th scope="col">Lecturer Name</th>
            <th scope="col">Section Number</th>
            <th scope="col">Remove Course</th>


          </tr>
        </thead>
      <tbody>
      <?php for($i = 1; $i <= 10; $i++) {
    
if(!empty($msg[$i])){   
    $sql2="select * from Course where Course_Code='".$msg[$i]."'";
    $resultcourse = mysqli_query($virtual_con, $sql2);
    $rowcourse=mysqli_fetch_assoc($resultcourse);
    
    
    ?>
        <tr>

        <td><?php echo $rowcourse['Course_ID']; ?></td>
        <td><?php echo $rowcourse['Course_Name']; ?></td>
        <td><?php echo $rowcourse['Program']; ?></td>
        <td><?php echo $rowcourse['Credit_Hour']; ?></td>
        <td><?php echo $rowcourse['Lecturer_Name']; ?></td>
        <td><?php echo $rowcourse['Class_ID']; ?></td>
        <td><a href="removecourse.php?courseid=<?php echo $rowcourse['Course_Code']; ?>">Remove Course</a></td>

        <?php }} ?>
      </tbody>
      </table>
      <p>Total credit=<?php echo $row['Total_Credit']; ?> </p>
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
<?php // goto2($to,$msg);  ?>
</body>
</html>
