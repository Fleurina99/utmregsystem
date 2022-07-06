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
	   <li><a href="staffhome.php">Home</a></li>
        <li><a href="staffprofile.php">Profile</a></li>
        <li><a href="studentlist.php" class="active">List Of Students</a></li>
        <li><a href="amendmentapp.php" class="active">Amendment Approval</a></li>
		
		<li><a href="staffviewcourse.php" >View Course</a></li>
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
	<h1 class="title">List of Students</h1>
	<div class="line"></div>
	<div class="intro">

	</div>
	<table>
		<tr>
			<th>Name</th>
			<th>IC Number</th>
			<th>Matric Number</th>
			<th>Faculty</th>
			<th>E-Mail</th>
			<th>Phone Number</th>


		<!-- Begin Post -->
	<div class="post">
		<?php
			$servername = "localhost";
			$db_user = "root";
			$db_pass = "";
			$db_name = "liststudents";

			//create connection
			$conn = new mysqli($servername, $db_user, $db_pass, $db_name);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT name, ic, matric_number, faculty, email, phonenum FROM liststudent";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["name"]. "</td><td> " . $row["ic"]. "</td><td>" . $row["matric_number"]. "</td><td>" . $row["faculty"]."</td><td>" . $row["email"]. "</td><td>". $row["phonenum"]. "</td><br>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
		<!-- Begin Info -->
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
