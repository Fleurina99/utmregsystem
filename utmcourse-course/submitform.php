<?php
	include('function.php');

	$Name= $_POST['Name'];
	$Matric_ID= $_POST['Matric_ID'];
	$Faculty= $_POST['Faculty'];
	$Course_IDinsert= $_POST['Course_IDinsert'];
	$sectioninsert= $_POST['sectioninsert'];
	$statusinsert= $_POST['statusinsert'];
	$creditinsert= $_POST['creditinsert'];
	$Course_IDdelete= $_POST['Course_IDdelete'];
	$sectiondelete= $_POST['sectiondelete'];
	$statusdelete= $_POST['statusdelete'];
	$creditdelete= $_POST['creditdelete'];
	$delcrehrs= $_POST['delcrehrs'];
	$inscrehrs= $_POST['inscrehrs'];
	$totalbefore= $_POST['totalbefore'];
	$totalafter= $_POST['totalafter'];
	$currcgpa= $_POST['currcgpa'];
	$staffid= $_POST['staffid'];

	//database connection

$conn= new mysqli('localhost','root','','usersdb');
if($conn->connect_error){
	die('Connection Failed : ' .$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into form(formID, Name, Matric_ID, Faculty, Course_IDinsert, sectioninsert,
	statusinsert, creditinsert, Course_IDdelete, sectiondelete, statusdelete, creditdelete, delcrehrs,
	inscrehrs, totalbefore, totalafter, currcgpa, staffid)
	value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssisisisiiiiiss", $formID, $Name, $Matric_ID, $Faculty, $Course_IDinsert, $sectioninsert,
	$statusinsert, $creditinsert, $Course_IDdelete, $sectiondelete, $statusdelete, $creditdelete, $delcrehrs,
	$inscrehrs, $totalbefore, $totalafter, $currcgpa, $staffid);
	$stmt->execute();
	echo "Form Submitted";
	$stmt->close();
	$conn->close();
	$to='studentform.php';
    gotoInterface($to);
}

?>

