<?php
	require_once('config.php');
	require_once('config/all.php');
	@session_start();
	$usersession=$_SESSION['usersession'];
	$uname=getusernamelect($usersession,$virtual_con);
	$uid=getuserIDlect($usersession, $virtual_con);
	$sql="SELECT * FROM `students` WHERE (`Lecturer_ID`='".$uid."')";
$result=mysqli_query($virtual_con,$sql);
$row=mysqli_fetch_assoc($result);


?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>List of Students</title>

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
        <li><a href="lecturerhome.php" class="active">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="list.php">List Of Students (Academic Advisee)</a></li>
        <li><a href="courseapp.php">Course Approval</a></li>
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
		<h1 class="title">List of Students (Academic Advisee)</h1>
		<div class="line"></div>
		<div class="intro">

		</div>
		<!-- Begin Post -->
		<div class="post">
			
			<!-- Begin Info -->
			<div class="info">
			<table class="table">
       <thead class="thead-dark">
         <tr >

           <th scope="col">Name</th>
           <th scope="col">Matric_ID</th>
           <th scope="col">Email</th>
           <th scope="col">Program</th>
            <th scope="col">Faculty</th>
           <th scope="col">Current Semester</th>
		   <th scope="col">Current CGPA</th>
		   

         </tr>
       </thead>
     <tbody>
       <?php while($row=mysqli_fetch_assoc($result)){?>
       <tr>

       <td><?php echo $row['Name']; ?></td>
       <td><?php echo $row['Matric_ID']; ?></td>
       <td><?php echo $row['Email']; ?></td>
	   <td><?php echo $row['Program']; ?></td>
       <td><?php echo $row['Faculty']; ?></td>
	   <td><?php echo $row['Current_Semester']; ?></td>
	   <td><?php echo $row['Curr_Cgpa']; ?></td>
     </tr>
     <?php } ?>
     </tbody>
     </table>
			</div>
			<div class="clear"></div>
			<!-- End Info -->

		</div>
	</div>
</div>
<!-- End Wrapper -->

<div class="clear"></div>
<script type="text/javascript" src="js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
