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
				<li><a href="reg.php">Course Registration</a></li>
				<li><a href="prereg2.php" >Course Pre-Registration</a></li>
				<li><a href="studentform.php" class="active">Amendment Form</a></li>
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
	<!--<h1 class="title">List of Students</h1>
	<div class="line"></div>
	<div class="intro"></div> -->

			<form action="submitform.php" method="POST">
			<table  border="2" style="border-collapse:collapse;">
			<tr>
			<td id="FormWord">Name <td colspan="2"><input class="Rectangleform" type="text" placeholder="Enter Name" name="Name" required> </td>
			</tr>
			<tr>
			<td id="FormWord">Matric No<td colspan="2"><input class="Rectangleform" type="text" placeholder="Enter Matric No" name="Matric_ID" required></td>
			</tr>
			<tr>
			<td id="FormWord">Faculty<td colspan="2" ><select  class="Rectangleform" name="Faculty">
				  <option ></option>
				  <option value="HL">School of Computing</option>
				  <option value="UM">School of Civil Engineering</option>
				  <option value="UG">School of Electrical Engineering </option>
				  <option value="HS">School of Mechanical Engineering</option>
				  <option value="HWUM">School Chemical and Energy Engineering</option>
				  <option value="HWUM">School of Biosciences & Medical Engineering</option>
				  <option value="HWUM">School of Education</option>
				  <option value="HWUM">School of HR Development &Psychology</option>
				</select>
			</td>
			</tr>

			<tr>
			<td colspan="3" id="FormWord"><b>Inserted Course</b></td>
			</tr>

			<tr>	
			<?php
			$mysqli = NEW MySQLi('localhost','root', '', 'usersdb');
			$resultSET = $mysqli ->query("SELECT Course_ID, Course_Name FROM coursedesc");
			?>
			<td id="FormWord">Course<td colspan="2" ><select  class="Rectangleform" name="Course_IDinsert">
			<?php
			while($rows = $resultSET->fetch_assoc())
			{
			 $Course_ID = $rows['Course_ID'];
			 $Course_Name = $rows['Course_Name']; 
			 echo "<option value=''></option>";
			 echo "<option value='$Course_ID'> $Course_Name</option>";
			}
			?>
			</select>
			</td>
			</tr>

			<tr>
			<td id="FormWord">Section <input class="rectangleform" type="number" min="0" max="55" placeholder="Enter Section" name="sectioninsert" ></td>
			<td id="FormWord">Status <select  class="rectangleform" name="statusinsert">
				  <option ></option>
				  <option value="HL">HL</option>
				  <option value="UM">UM</option>
				  <option value="UG">UG</option>
				  <option value="HS">HS</option>
				  <option value="HWUM">HWUM</option>
				</select>
			</td>
			<td id="FormWord">Credit <input class="rectangleform" type="number" min="0" max="5" placeholder="Enter Credit" name="creditinsert" > </td>
			</tr>
			<tr>
			<td colspan="3" id="FormWord"><b>Deleted Course</b></td>	
			</tr>

			<tr>	
			<?php
			$mysqli = NEW MySQLi('localhost','root', '', 'usersdb');
			$resultSET = $mysqli ->query("SELECT Course_ID, Course_Name FROM coursedesc");
			?>
			<td id="FormWord">Course<td colspan="2" ><select  class="Rectangleform" name="Course_IDdelete">
			<?php
			while($rows = $resultSET->fetch_assoc())
			{
			 $Course_ID = $rows['Course_ID'];
			 $Course_Name = $rows['Course_Name']; 
			 echo "<option value=''></option>";
			 echo "<option value='$Course_ID'> $Course_Name</option>";
			}
			?>
			</select>
			</td>
			</tr>

			<tr>
			<td id="FormWord">Section<input class="rectangleform" type="number" min="0" max="55" placeholder="Enter Section" name="sectiondelete" ></td>
			<td id="FormWord">Status <select  class="rectangleform" name="statusdelete">
				  <option ></option>
				  <option value="HL">HL</option>
				  <option value="UM">UM</option>
				  <option value="UG">UG</option>
				  <option value="HS">HS</option>
				  <option value="HWUM">HWUM</option>
				</select>
			</td>
			<td id="FormWord">Credit <input class="rectangleform" type="number" min="0" max="5" placeholder="Enter Credit" name="creditdelete" ></td>
			</tr>
			<tr>	
			<td colspan="3" id="FormWord"><b>Total Credit Hours</b></td>
			</tr>
			<tr>
			<td colspan="2" id="FormWord">Deleted Credit Hours <td><input class="rectangleform" type="number" min="0" max="20" placeholder="Enter Credit Hours" name="delcrehrs" required></td>
			</tr>
			<tr>		
			<td colspan="2" id="FormWord">Inserted Credit Hours <td><input class="rectangleform" type="number" min="0" max="20" placeholder="Enter Credit Hours" name="inscrehrs" required> </td>
			</tr>
			<tr>
			<td colspan="2" id="FormWord">Total Credit Registered before Amendment <td><input class="rectangleform" type="number" min="0" max="30" placeholder="Enter Total Credit Hours" name="totalbefore" required></td>
			</tr>
			<tr>
			<td colspan="2" id="FormWord">Total Credit Registered after Amendment <td><input class="rectangleform" type="number" min="0" max="30" placeholder="Enter Total Credit Hours" name="totalafter" required></td>
			</tr>
			<tr>
			<td colspan="2" id="FormWord">Current CGPA <td><input class="rectangleform" type="text" placeholder="Enter CGPA" name="currcgpa" required></td>
			</tr>

			<tr>
			<?php
			$mysqli = NEW MySQLi('localhost','root', '', 'usersdb');
			$resultSET = $mysqli ->query("SELECT lect_id, lect_name FROM lect");
			?>

			<td id="FormWord">Academic Advisor<td colspan="2" ><select  class="Rectangleform" name="staffid">
			<?php
			while($rows = $resultSET->fetch_assoc())
			{
			 $lect_id = $rows['lect_id'];
			 $lect_name = $rows['lect_name']; 
			 echo "<option value=''></option>";
			 echo "<option value='$lect_id'> $lect_name</option>";
			}
			?>
			</select>
			</td>
			</tr>


			<tr>
			<td colspan="3" id=""><button type="submit">SUBMIT </button></td>
			</tr>
			</form>
	

			

		<!-- Begin Post -->
	<div class="post">
		
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
