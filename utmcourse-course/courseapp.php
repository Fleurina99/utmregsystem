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
<title>Course Approval</title>

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
			<li><a href="lecturerhome.php" >Home</a></li>
        <li><a href="profile.php" class="active">Profile</a></li>
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
		<h1 class="title">Course Approval</h1>
		<div class="line"></div>
		<div class="intro">

		</div>

		<div class="post">
			<?php
				$servername = "localhost";
				$db_user = "root";
				$db_pass = "";
				$db_name = "usersdb";

				//create connection
				$conn = new mysqli($servername, $db_user, $db_pass, $db_name);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * FROM form";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {

						echo "<table border='1'>
						<th colspan='3' style='text-align:center'>FORM ID: " . $row["formID"]. "</th>".
						 "<tr>" .  "<td colspan='3'>NAME:" . $row["Name"].  "</td>" .
								"<tr>" .  "<td colspan='3'>MATRIC NO: " . $row["Matric_ID"].  "</td>" .
								"<tr>" .  "<td colspan='3'>FACULTY: " . $row["Faculty"].  "</td>" .

								"<tr>" .  "<td colspan='3' style='text-align:center; font-weight:bold;'><p>COURSE TO BE INSERTED</p></td>" . "</tr>" .
								"<tr>" .  "<td><p>COURSE INSERT: </p>" . $row["Course_IDinsert"]. "</td>" .
													"<td><p>SECTION INSERT:</p> " . $row["sectioninsert"]. "</td>" .
													"<td><p>CREDIT INSERT:</p> " . $row["creditinsert"]. "</td>" . "</tr>" .

								"<tr>" .  "<td colspan='3' style='text-align:center; font-weight:bold;'><p>COURSE TO BE DELETED</p></td> " . "</tr>" .
								"<tr>" .  "<td><p>COURSE DELETE:</p> " . $row["Course_IDdelete"]. "</td>" .
													"<td><p>SECTION DELETE:</p> " . $row["sectiondelete"]. "</td>" .
													"<td><p>CREDIT DELETE:</p> " . $row["creditdelete"]. "</td>" . "</tr>" .

								"<tr>" .  "<td colspan='3'>TOTAL CREDIT HOURS (before): " . $row["totalbefore"]. "</td>" . "</tr>" .
								"<tr>" .  "<td colspan='3'>TOTAL CREDIT HOURS (after): " . $row["totalafter"]. "</td>" . "</tr>" .
								"<tr>" .  "<td colspan='3'>CURRENT CGPA: " . $row["currcgpa"]. "</td>" . "</tr>";
								echo "<input type='submit' name='submit' value='Approve'>";
								echo "<input type='submit' name='submit' value='Reject'><br><br>";
								}
					echo "</table>";

				} else {
					echo "0 results";
				}


				/* Untuk approve form*/
				if(isset($_POST['Approve'])) {
					$sql = "UPDATE status SET status='Approved' WHERE formID=1";
					mysql_query($sql);
					echo "Registration Approved";
				}

				/* Untuk reject form*/
				if(isset($_POST['Reject'])) {
					$sql = "UPDATE status SET status='Rejected' WHERE formID=1";
					mysql_query($sql);
					echo "Registration Rejected";
				}

				$conn->close();
			?>

		</div>


	</div>
<!-- End Wrapper -->
</div>
<script type="text/javascript" src="js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
