<?php

require_once('config/all.php');
@session_start();
$usersession=$_SESSION['usersession'];
$unid=getuserID($usersession,$virtual_con);
$vid=$_GET['courseid'];

//$sqlupdate="UPDATE `Student_Course` SET `Course1` = '".$vid."' WHERE `Matric_ID` ='".$unid."'";
$sql2="select * from Student_Course where Matric_ID='".$unid."'";

//$result=mysqli_query($virtual_con,$sqlupdate);
$result2=mysqli_query($virtual_con,$sql2);
$row=mysqli_fetch_assoc($result2);
$msg2=$row['Course1'];
$msg3=$row['Course2'];
$msg4=$row['Course3'];
$msg5=$row['Course4'];
$msg6=$row['Course5'];
$msg7=$row['Course6'];
$msg8=$row['Course7'];
$msg9=$row['Course8'];
$msg10=$row['Course9'];
$msg11=$row['Course10'];
$msg12=NULL;
$to="submitcourse.php";
if ($msg2==$vid){
  //addcourse Success

    $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
    $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
    $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);

        $coursecredit=$rowcheckcapacity['Credit_Hour'];
      $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course1` = '".$msg3."',`Course2` = '".$msg4."',`Course3` = '".$msg5."',`Course4` = '".$msg6."',`Course5` = '".$msg7."',`Course6` = '".$msg8."',`Course7` = '".$msg8."',`Course8` = '".$msg9."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
       $firstcourse=mysqli_query($virtual_con,$sqlupdate);
      $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
      $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

    $msg="Course was successfully deleted";
    


}
else{
  if($msg3==$vid)
  {
    $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
    $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
    $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);

        $coursecredit=$rowcheckcapacity['Credit_Hour'];
      $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course2` = '".$msg4."',`Course3` = '".$msg5."',`Course4` = '".$msg6."',`Course5` = '".$msg7."',`Course6` = '".$msg8."',`Course7` = '".$msg8."',`Course8` = '".$msg9."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
       $firstcourse=mysqli_query($virtual_con,$sqlupdate);
      $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
      $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

    $msg="Course was successfully deleted";



  }
  else{
    if($msg4==$vid)
    {
        $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
        $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
        $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
    
            $coursecredit=$rowcheckcapacity['Credit_Hour'];
          $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course3` = '".$msg5."',`Course4` = '".$msg6."',`Course5` = '".$msg7."',`Course6` = '".$msg8."',`Course7` = '".$msg8."',`Course8` = '".$msg9."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
           $firstcourse=mysqli_query($virtual_con,$sqlupdate);
          $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
          $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
    
        $msg="Course was successfully deleted";


    }
    else {
      if($msg5==$vid)
      {
        $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
        $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
        $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
    
            $coursecredit=$rowcheckcapacity['Credit_Hour'];
          $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course4` = '".$msg6."',`Course5` = '".$msg7."',`Course6` = '".$msg8."',`Course7` = '".$msg8."',`Course8` = '".$msg9."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
           $firstcourse=mysqli_query($virtual_con,$sqlupdate);
          $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
          $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
    
        $msg="Course was successfully deleted";

      }
      else {
        if($msg6==$vid)
        {
            $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
            $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
            $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
        
                $coursecredit=$rowcheckcapacity['Credit_Hour'];
              $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course5` = '".$msg7."',`Course6` = '".$msg8."',`Course7` = '".$msg8."',`Course8` = '".$msg9."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
               $firstcourse=mysqli_query($virtual_con,$sqlupdate);
              $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
              $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
        
            $msg="Course was successfully deleted";
        }
        else {
          if($msg7==$vid)
          {
            $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
            $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
            $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
        
                $coursecredit=$rowcheckcapacity['Credit_Hour'];
              $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course7` = '".$msg8."',`Course8` = '".$msg9."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
               $firstcourse=mysqli_query($virtual_con,$sqlupdate);
              $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
              $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
        
            $msg="Course was successfully deleted";
          }
          else {
            if($msg8==$vid)
            {
                $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
                $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
                $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
            
                    $coursecredit=$rowcheckcapacity['Credit_Hour'];
                  $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course8` = '".$msg9."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
                   $firstcourse=mysqli_query($virtual_con,$sqlupdate);
                  $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
                  $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
            
                $msg="Course was successfully deleted";
            }
            else {
              if($msg9==$vid)
              {
                $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
            $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
            $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
        
                $coursecredit=$rowcheckcapacity['Credit_Hour'];
              $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course9` = '".$msg10."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
               $firstcourse=mysqli_query($virtual_con,$sqlupdate);
              $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
              $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
        
            $msg="Course was successfully deleted";
              }
              else {
                if($msg10==$vid)
                {
                    $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
            $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
            $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
        
                $coursecredit=$rowcheckcapacity['Credit_Hour'];
              $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course10` = '".$msg11."' WHERE `Matric_ID` ='".$unid."'";
               $firstcourse=mysqli_query($virtual_con,$sqlupdate);
              $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
              $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
        
            $msg="Course was successfully deleted";
                }
                else {
                  if($msg11==$vid)
                  {
                    $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
                    $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
                    $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
                
                        $coursecredit=$rowcheckcapacity['Credit_Hour'];
                      $sqlupdate="UPDATE `Student_Course` SET `Total_Credit` =`Total_Credit`- '".$coursecredit."',`Course10` = '".$msg12."' WHERE `Matric_ID` ='".$unid."'";
                       $firstcourse=mysqli_query($virtual_con,$sqlupdate);
                      $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`-1 WHERE `Course_Code` ='".$vid."'";
                      $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);
                
                    $msg="Course was successfully deleted";
                  }
                  else {
                    // code...
                    $msg="Cannot add anymore course.";
                  }
                }
              }
            }
          }
        }
      }
    }
  //$msg="Delete is not successful";
  }
  //$msg="Delete is not successful";

}
goto2($to,$msg);
 ?>
