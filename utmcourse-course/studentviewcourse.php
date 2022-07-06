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
			  <li><a href="studentviewcourse.php" >View Course</a></li>
				<li><a href="reg.php">Course Registration</a></li>
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
	

	

	
	
	<table border="2" style="color:black;margin:100;font-size:20px;margin:0%;font-family:'Gill Sans MT';border-collapse:collapse;background-color: #EDDD9E;">
	<tr>	
	<th>Course ID</th>
	<th>Course Name</th>
	<th>Description</th>
	</tr>

	<?php
	$conn= mysqli_connect("localhost", "root", "", "usersdb" );
	if($conn-> connect_error){
		die("Connection failed bro:" . $conn-> connect_error);
	}

	$sql = "SELECT 	Course_ID,Course_Name, Course_Desc from coursedesc";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){
		while($row= $result->fetch_assoc()){
				echo "<tr><td >". $row["Course_ID"]."</td><td>".$row["Course_Name"]."</td><td><br></br>". $row["Course_Desc"]."<br></br></td></tr>";
				
		}
		echo "</table>";
	}
	else{
		echo "0 result bro";
	}

	$conn-> close();
	?>







	<!-- OLD CODE
	<table border="2">
	<tr>
	<td class="accordion">
			<div class="accordion-item ">
			<div class="accordion-item-header">
				Artificial Intellegence 
			</div>
			<div class="accordion-item-body">
				<div class="accordion-item-body-content">
				Web Development broadly refers to the tasks associated with developing functional websites and applications for the Internet. The web development process includes web design, web content development, client-side/server-side scripting and network security configuration, among other tasks.
				</div>
			</div>
			
			<Script>
					const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

				accordionItemHeaders.forEach(accordionItemHeader => {
				accordionItemHeader.addEventListener("click", event => {
					
					/* Uncomment in case you only want to allow for the display of only one collapsed item at a time!
					
					const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
					if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
					currentlyActiveAccordionItemHeader.classList.toggle("active");
					currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
					} */

					accordionItemHeader.classList.toggle("active");
					const accordionItemBody = accordionItemHeader.nextElementSibling;
					if(accordionItemHeader.classList.contains("active")) {
					accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
					}
					else {
					accordionItemBody.style.maxHeight = 0;
					}
					
				});
				});
			</Script>
	
-->


			

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
