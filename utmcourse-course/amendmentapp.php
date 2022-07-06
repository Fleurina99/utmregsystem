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
<script type="text/javascript" src="js/edit.js"></script>
<script type="text/javascript">
	function saveEdits() {

	//get the editable element
	var editElem = document.getElementById("edit");

	//get the edited element content
	var userVersion = editElem.innerHTML;

	//save the content to local storage
	localStorage.userEdits = userVersion;

	//write a confirmation to the user
	document.getElementById("update").innerHTML="Edits saved!";

	}
	function checkEdits() {

	//find out if the user has previously saved edits
	if(localStorage.userEdits!=null)
		document.getElementById("edit").innerHTML=localStorage.userEdits;
	}
</script>
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

	  <li><a href="staffhome.php">Home</a></li>
        <li><a href="staffprofile.php">Profile</a></li>
        <li><a href="studentlist.php">List Of Students</a></li>
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
	<script>
		var editBtn = document.getElementById('editBtn');
		var editables = document.querySelectorAll('#available, #from, #until');

		if (typeof(Storage) !== "undefined") {
		  if (localStorage.getItem('available') !== null) {
		    editables[0].innerHTML = localStorage.getItem('available');
		  }
		  if (localStorage.getItem('from') !== null) {
		    editables[1].innerHTML = localStorage.getItem('from');
		  }
		  if (localStorage.getItem('until') !== null) {
		    editables[2].innerHTML = localStorage.getItem('until');
		  }
		}

		editBtn.addEventListener('click', function(e) {
		  if (!editables[0].isContentEditable) {
		    editables[0].contentEditable = 'true';
		    editables[1].contentEditable = 'true';
		    editables[2].contentEditable = 'true';
		    editBtn.innerHTML = 'Save Changes';
		    editBtn.style.backgroundColor = '#6F9';
		  } else {
		    // Disable Editing
		    editables[0].contentEditable = 'false';
		    editables[1].contentEditable = 'false';
		    editables[2].contentEditable = 'false';
		    // Change Button Text and Color
		    editBtn.innerHTML = 'Enable Editing';
		    editBtn.style.backgroundColor = '#F96';
		    // Save the data in localStorage
		    for (var i = 0; i < editables.length; i++) {
		      localStorage.setItem(editables[i].getAttribute('id'), editables[i].innerHTML);
		    }
		  }
		});

		setInterval(function() {
		  for (var i = 0; i < editables.length; i++) {
		    localStorage.setItem(editables[i].getAttribute('id'), editables[i].innerHTML);
		  }
		}, 5000);

	</script>
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Status</h1>
	<div class="line"></div>
	<div class="intro">
		<button id="editBtn" type="button">Edit Document</button>
		<br>
		Click <span style="color:red;"> Yes</span> if available and <span style="color:red;"> No</span> if not available
	</div>

		<!-- Begin Post -->
	<div class="post">
		<p id="available">Yes/No</p>

		<div class="intro">
			<br>
			Please select your time (hh:mm)
		</div>

		<div class="time"> /* nanti buat css time*/
			From:
			<br>
			<div id="edit" contenteditable="true">
				<select name="hours">
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
				</select>

				<select name="mins">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					<option value="55">55</option>
				</select>
			</div>

				<br><br>
				Until
				<br>
				<div id="edit" contenteditable="true">
					<select name="hours">
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
					</select>

					<select name="mins">
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="25">25</option>
						<option value="30">30</option>
						<option value="35">35</option>
						<option value="40">40</option>
						<option value="45">45</option>
						<option value="50">50</option>
						<option value="55">55</option>
					</select>
				</div>
				<input type="button" value="save" onclick="saveEdits()"/>
				<div id="update"> Edit the text and click to save for next time</div>
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
