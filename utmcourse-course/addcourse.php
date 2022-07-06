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
$to="prereg2.php";
if (empty($msg2)){
  //addcourse Success

    $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
    $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
    $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
    $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
    $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
    $checkcourseid=$rowcheckcapacity['Course_ID'];
    if($currentcap>=$maxcap)
    {
      $msg="Sorry this course is full and has reached maximum students capacity";
    }
    else {
        $coursecredit=$rowcheckcapacity['Credit_Hour'];
      $sqlupdate="UPDATE `Student_Course` SET `Course1` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
       $firstcourse=mysqli_query($virtual_con,$sqlupdate);
      $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
      $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

    $msg="Course was successfully added";
    }


}
else{
  if(empty($msg3))
  {
    $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
    $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
    $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
    $checksamecourse=$rowchecksamecourse['Course_ID'];

    $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
    $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
    $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
    $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
    $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
    $checkcourseid=$rowcheckcapacity['Course_ID'];
    if($checksamecourse==$checkcourseid)
    {
      $msg="Sorry you already added this course.You cannot add the same subject again.";
    }
    else{
      if($currentcap>=$maxcap)
      {
        $msg="Sorry this course is full and has reached maximum students capacity";
      }
      else {
          $coursecredit=$rowcheckcapacity['Credit_Hour'];
        $sqlupdate2="UPDATE `Student_Course` SET `Course2` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
         $secondcourse=mysqli_query($virtual_con,$sqlupdate2);
        $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
        $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

      $msg="Course was successfully added";
      }

    }



  }
  else{
    if(empty($msg4))
    {
      $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
      $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
      $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
      $checksamecourse=$rowchecksamecourse['Course_ID'];

      $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
      $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
      $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
      $checksamecourse2=$rowchecksamecourse2['Course_ID'];

      $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
      $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
      $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
      $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
      $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
      $checkcourseid=$rowcheckcapacity['Course_ID'];
      if($checksamecourse==$checkcourseid)
      {
        $msg="Sorry you already added this course.You cannot add the same subject again.";
      }
      elseif($checksamecourse2==$checkcourseid) {
        // code...
        $msg="Sorry you already added this course.You cannot add the same subject again.";
      }
      else{
        if($currentcap>=$maxcap)
        {
          $msg="Sorry this course is full and has reached maximum students capacity";
        }
        else {
            $coursecredit=$rowcheckcapacity['Credit_Hour'];
          $sqlupdate3="UPDATE `Student_Course` SET `Course3` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
           $thirdcourse=mysqli_query($virtual_con,$sqlupdate3);
          $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
          $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

        $msg="Course was successfully added";
        }

      }



    }
    else {
      if(empty($msg5))
      {
        $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
        $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
        $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
        $checksamecourse=$rowchecksamecourse['Course_ID'];

        $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
        $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
        $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
        $checksamecourse2=$rowchecksamecourse2['Course_ID'];

        $sqlchecksamecourse3="select * from Course where Course_Code='".$msg4."'";
        $resultchecksamecourse3 = mysqli_query($virtual_con, $sqlchecksamecourse3);
        $rowchecksamecourse3=mysqli_fetch_assoc($resultchecksamecourse3);
        $checksamecourse3=$rowchecksamecourse3['Course_ID'];

        $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
        $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
        $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
        $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
        $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
        $checkcourseid=$rowcheckcapacity['Course_ID'];
        if($checksamecourse==$checkcourseid)
        {
          $msg="Sorry you already added this course.You cannot add the same subject again.";
        }
        elseif($checksamecourse2==$checkcourseid) {
          // code...
          $msg="Sorry you already added this course.You cannot add the same subject again.";
        }
        elseif($checksamecourse3==$checkcourseid) {
          // code...
          $msg="Sorry you already added this course.You cannot add the same subject again.";
        }
        else{
          if($currentcap>=$maxcap)
          {
            $msg="Sorry this course is full and has reached maximum students capacity";
          }
          else {
              $coursecredit=$rowcheckcapacity['Credit_Hour'];
            $sqlupdate4="UPDATE `Student_Course` SET `Course4` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
             $fourthcourse=mysqli_query($virtual_con,$sqlupdate4);
            $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
            $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

          $msg="Course was successfully added";
          }

        }
      }
      else {
        if(empty($msg6))
        {
          $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
          $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
          $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
          $checksamecourse=$rowchecksamecourse['Course_ID'];

          $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
          $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
          $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
          $checksamecourse2=$rowchecksamecourse2['Course_ID'];

          $sqlchecksamecourse3="select * from Course where Course_Code='".$msg4."'";
          $resultchecksamecourse3 = mysqli_query($virtual_con, $sqlchecksamecourse3);
          $rowchecksamecourse3=mysqli_fetch_assoc($resultchecksamecourse3);
          $checksamecourse3=$rowchecksamecourse3['Course_ID'];

          $sqlchecksamecourse4="select * from Course where Course_Code='".$msg5."'";
          $resultchecksamecourse4 = mysqli_query($virtual_con, $sqlchecksamecourse4);
          $rowchecksamecourse4=mysqli_fetch_assoc($resultchecksamecourse4);
          $checksamecourse4=$rowchecksamecourse4['Course_ID'];

          $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
          $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
          $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
          $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
          $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
          $checkcourseid=$rowcheckcapacity['Course_ID'];
          if($checksamecourse==$checkcourseid)
          {
            $msg="Sorry you already added this course.You cannot add the same subject again.";
          }
          elseif($checksamecourse2==$checkcourseid) {
            // code...
            $msg="Sorry you already added this course.You cannot add the same subject again.";
          }
          elseif($checksamecourse3==$checkcourseid) {
            // code...
            $msg="Sorry you already added this course.You cannot add the same subject again.";
          }
          elseif($checksamecourse4==$checkcourseid) {
            // code...
            $msg="Sorry you already added this course.You cannot add the same subject again.";
          }
          else{
            if($currentcap>=$maxcap)
            {
              $msg="Sorry this course is full and has reached maximum students capacity";
            }
            else {
                $coursecredit=$rowcheckcapacity['Credit_Hour'];
              $sqlupdate5="UPDATE `Student_Course` SET `Course5` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
               $fifthcourse=mysqli_query($virtual_con,$sqlupdate5);
              $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
              $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

            $msg="Course was successfully added";
            }

          }
        }
        else {
          if(empty($msg7))
          {
            $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
            $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
            $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
            $checksamecourse=$rowchecksamecourse['Course_ID'];

            $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
            $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
            $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
            $checksamecourse2=$rowchecksamecourse2['Course_ID'];

            $sqlchecksamecourse3="select * from Course where Course_Code='".$msg4."'";
            $resultchecksamecourse3 = mysqli_query($virtual_con, $sqlchecksamecourse3);
            $rowchecksamecourse3=mysqli_fetch_assoc($resultchecksamecourse3);
            $checksamecourse3=$rowchecksamecourse3['Course_ID'];

            $sqlchecksamecourse4="select * from Course where Course_Code='".$msg5."'";
            $resultchecksamecourse4 = mysqli_query($virtual_con, $sqlchecksamecourse4);
            $rowchecksamecourse4=mysqli_fetch_assoc($resultchecksamecourse4);
            $checksamecourse4=$rowchecksamecourse4['Course_ID'];

            $sqlchecksamecourse5="select * from Course where Course_Code='".$msg6."'";
            $resultchecksamecourse5 = mysqli_query($virtual_con, $sqlchecksamecourse5);
            $rowchecksamecourse5=mysqli_fetch_assoc($resultchecksamecourse5);
            $checksamecourse5=$rowchecksamecourse5['Course_ID'];

            $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
            $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
            $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
            $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
            $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
            $checkcourseid=$rowcheckcapacity['Course_ID'];
            if($checksamecourse==$checkcourseid)
            {
              $msg="Sorry you already added this course.You cannot add the same subject again.";
            }
            elseif($checksamecourse2==$checkcourseid) {
              // code...
              $msg="Sorry you already added this course.You cannot add the same subject again.";
            }
            elseif($checksamecourse3==$checkcourseid) {
              // code...
              $msg="Sorry you already added this course.You cannot add the same subject again.";
            }
            elseif($checksamecourse4==$checkcourseid) {
              // code...
              $msg="Sorry you already added this course.You cannot add the same subject again.";
            }
            elseif($checksamecourse5==$checkcourseid) {
              // code...
              $msg="Sorry you already added this course.You cannot add the same subject again.";
            }
            else{
              if($currentcap>=$maxcap)
              {
                $msg="Sorry this course is full and has reached maximum students capacity";
              }
              else {
                  $coursecredit=$rowcheckcapacity['Credit_Hour'];
                $sqlupdate6="UPDATE `Student_Course` SET `Course6` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
                 $sixthcourse=mysqli_query($virtual_con,$sqlupdate6);
                $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
                $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

              $msg="Course was successfully added";
              }

            }
          }
          else {
            if(empty($msg8))
            {
              $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
              $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
              $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
              $checksamecourse=$rowchecksamecourse['Course_ID'];

              $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
              $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
              $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
              $checksamecourse2=$rowchecksamecourse2['Course_ID'];

              $sqlchecksamecourse3="select * from Course where Course_Code='".$msg4."'";
              $resultchecksamecourse3 = mysqli_query($virtual_con, $sqlchecksamecourse3);
              $rowchecksamecourse3=mysqli_fetch_assoc($resultchecksamecourse3);
              $checksamecourse3=$rowchecksamecourse3['Course_ID'];

              $sqlchecksamecourse4="select * from Course where Course_Code='".$msg5."'";
              $resultchecksamecourse4 = mysqli_query($virtual_con, $sqlchecksamecourse4);
              $rowchecksamecourse4=mysqli_fetch_assoc($resultchecksamecourse4);
              $checksamecourse4=$rowchecksamecourse4['Course_ID'];

              $sqlchecksamecourse5="select * from Course where Course_Code='".$msg6."'";
              $resultchecksamecourse5 = mysqli_query($virtual_con, $sqlchecksamecourse5);
              $rowchecksamecourse5=mysqli_fetch_assoc($resultchecksamecourse5);
              $checksamecourse5=$rowchecksamecourse5['Course_ID'];

              $sqlchecksamecourse6="select * from Course where Course_Code='".$msg7."'";
              $resultchecksamecourse6 = mysqli_query($virtual_con, $sqlchecksamecourse6);
              $rowchecksamecourse6=mysqli_fetch_assoc($resultchecksamecourse6);
              $checksamecourse6=$rowchecksamecourse6['Course_ID'];

              $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
              $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
              $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
              $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
              $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
              $checkcourseid=$rowcheckcapacity['Course_ID'];
              if($checksamecourse==$checkcourseid)
              {
                $msg="Sorry you already added this course.You cannot add the same subject again.";
              }
              elseif($checksamecourse2==$checkcourseid) {
                // code...
                $msg="Sorry you already added this course.You cannot add the same subject again.";
              }
              elseif($checksamecourse3==$checkcourseid) {
                // code...
                $msg="Sorry you already added this course.You cannot add the same subject again.";
              }
              elseif($checksamecourse4==$checkcourseid) {
                // code...
                $msg="Sorry you already added this course.You cannot add the same subject again.";
              }
              elseif($checksamecourse5==$checkcourseid) {
                // code...
                $msg="Sorry you already added this course.You cannot add the same subject again.";
              }
              elseif($checksamecourse6==$checkcourseid) {
                // code...
                $msg="Sorry you already added this course.You cannot add the same subject again.";
              }
              else{
                if($currentcap>=$maxcap)
                {
                  $msg="Sorry this course is full and has reached maximum students capacity";
                }
                else {
                    $coursecredit=$rowcheckcapacity['Credit_Hour'];
                  $sqlupdate7="UPDATE `Student_Course` SET `Course7` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
                   $seventhcourse=mysqli_query($virtual_con,$sqlupdate7);
                  $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
                  $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

                $msg="Course was successfully added";
                }

              }
            }
            else {
              if(empty($msg9))
              {
                $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
                $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
                $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
                $checksamecourse=$rowchecksamecourse['Course_ID'];

                $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
                $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
                $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
                $checksamecourse2=$rowchecksamecourse2['Course_ID'];

                $sqlchecksamecourse3="select * from Course where Course_Code='".$msg4."'";
                $resultchecksamecourse3 = mysqli_query($virtual_con, $sqlchecksamecourse3);
                $rowchecksamecourse3=mysqli_fetch_assoc($resultchecksamecourse3);
                $checksamecourse3=$rowchecksamecourse3['Course_ID'];

                $sqlchecksamecourse4="select * from Course where Course_Code='".$msg5."'";
                $resultchecksamecourse4 = mysqli_query($virtual_con, $sqlchecksamecourse4);
                $rowchecksamecourse4=mysqli_fetch_assoc($resultchecksamecourse4);
                $checksamecourse4=$rowchecksamecourse4['Course_ID'];

                $sqlchecksamecourse5="select * from Course where Course_Code='".$msg6."'";
                $resultchecksamecourse5 = mysqli_query($virtual_con, $sqlchecksamecourse5);
                $rowchecksamecourse5=mysqli_fetch_assoc($resultchecksamecourse5);
                $checksamecourse5=$rowchecksamecourse5['Course_ID'];

                $sqlchecksamecourse6="select * from Course where Course_Code='".$msg7."'";
                $resultchecksamecourse6 = mysqli_query($virtual_con, $sqlchecksamecourse6);
                $rowchecksamecourse6=mysqli_fetch_assoc($resultchecksamecourse6);
                $checksamecourse6=$rowchecksamecourse6['Course_ID'];

                $sqlchecksamecourse7="select * from Course where Course_Code='".$msg8."'";
                $resultchecksamecourse7 = mysqli_query($virtual_con, $sqlchecksamecourse7);
                $rowchecksamecourse7=mysqli_fetch_assoc($resultchecksamecourse7);
                $checksamecourse7=$rowchecksamecourse7['Course_ID'];

                $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
                $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
                $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
                $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
                $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
                $checkcourseid=$rowcheckcapacity['Course_ID'];
                if($checksamecourse==$checkcourseid)
                {
                  $msg="Sorry you already added this course.You cannot add the same subject again.";
                }
                elseif($checksamecourse2==$checkcourseid) {
                  // code...
                  $msg="Sorry you already added this course.You cannot add the same subject again.";
                }
                elseif($checksamecourse3==$checkcourseid) {
                  // code...
                  $msg="Sorry you already added this course.You cannot add the same subject again.";
                }
                elseif($checksamecourse4==$checkcourseid) {
                  // code...
                  $msg="Sorry you already added this course.You cannot add the same subject again.";
                }
                elseif($checksamecourse5==$checkcourseid) {
                  // code...
                  $msg="Sorry you already added this course.You cannot add the same subject again.";
                }
                elseif($checksamecourse6==$checkcourseid) {
                  // code...
                  $msg="Sorry you already added this course.You cannot add the same subject again.";
                }
                elseif($checksamecourse7==$checkcourseid) {
                  // code...
                  $msg="Sorry you already added this course.You cannot add the same subject again.";
                }
                else{
                  if($currentcap>=$maxcap)
                  {
                    $msg="Sorry this course is full and has reached maximum students capacity";
                  }
                  else {
                      $coursecredit=$rowcheckcapacity['Credit_Hour'];
                    $sqlupdate8="UPDATE `Student_Course` SET `Course8` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
                     $eighthcourse=mysqli_query($virtual_con,$sqlupdate8);
                    $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
                    $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

                  $msg="Course was successfully added";
                  }

                }
              }
              else {
                if(empty($msg10))
                {
                  $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
                  $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
                  $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
                  $checksamecourse=$rowchecksamecourse['Course_ID'];

                  $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
                  $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
                  $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
                  $checksamecourse2=$rowchecksamecourse2['Course_ID'];

                  $sqlchecksamecourse3="select * from Course where Course_Code='".$msg4."'";
                  $resultchecksamecourse3 = mysqli_query($virtual_con, $sqlchecksamecourse3);
                  $rowchecksamecourse3=mysqli_fetch_assoc($resultchecksamecourse3);
                  $checksamecourse3=$rowchecksamecourse3['Course_ID'];

                  $sqlchecksamecourse4="select * from Course where Course_Code='".$msg5."'";
                  $resultchecksamecourse4 = mysqli_query($virtual_con, $sqlchecksamecourse4);
                  $rowchecksamecourse4=mysqli_fetch_assoc($resultchecksamecourse4);
                  $checksamecourse4=$rowchecksamecourse4['Course_ID'];

                  $sqlchecksamecourse5="select * from Course where Course_Code='".$msg6."'";
                  $resultchecksamecourse5 = mysqli_query($virtual_con, $sqlchecksamecourse5);
                  $rowchecksamecourse5=mysqli_fetch_assoc($resultchecksamecourse5);
                  $checksamecourse5=$rowchecksamecourse5['Course_ID'];

                  $sqlchecksamecourse6="select * from Course where Course_Code='".$msg7."'";
                  $resultchecksamecourse6 = mysqli_query($virtual_con, $sqlchecksamecourse6);
                  $rowchecksamecourse6=mysqli_fetch_assoc($resultchecksamecourse6);
                  $checksamecourse6=$rowchecksamecourse6['Course_ID'];

                  $sqlchecksamecourse7="select * from Course where Course_Code='".$msg8."'";
                  $resultchecksamecourse7 = mysqli_query($virtual_con, $sqlchecksamecourse7);
                  $rowchecksamecourse7=mysqli_fetch_assoc($resultchecksamecourse7);
                  $checksamecourse7=$rowchecksamecourse7['Course_ID'];

                  $sqlchecksamecourse8="select * from Course where Course_Code='".$msg9."'";
                  $resultchecksamecourse8 = mysqli_query($virtual_con, $sqlchecksamecourse8);
                  $rowchecksamecourse8=mysqli_fetch_assoc($resultchecksamecourse8);
                  $checksamecourse8=$rowchecksamecourse8['Course_ID'];

                  $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
                  $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
                  $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
                  $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
                  $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
                  $checkcourseid=$rowcheckcapacity['Course_ID'];
                  if($checksamecourse==$checkcourseid)
                  {
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  elseif($checksamecourse2==$checkcourseid) {
                    // code...
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  elseif($checksamecourse3==$checkcourseid) {
                    // code...
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  elseif($checksamecourse4==$checkcourseid) {
                    // code...
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  elseif($checksamecourse5==$checkcourseid) {
                    // code...
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  elseif($checksamecourse6==$checkcourseid) {
                    // code...
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  elseif($checksamecourse7==$checkcourseid) {
                    // code...
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  elseif($checksamecourse8==$checkcourseid) {
                    // code...
                    $msg="Sorry you already added this course.You cannot add the same subject again.";
                  }
                  else{
                    if($currentcap>=$maxcap)
                    {
                      $msg="Sorry this course is full and has reached maximum students capacity";
                    }
                    else {
                        $coursecredit=$rowcheckcapacity['Credit_Hour'];
                      $sqlupdate9="UPDATE `Student_Course` SET `Course9` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
                       $ninthcourse=mysqli_query($virtual_con,$sqlupdate9);
                      $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
                      $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

                    $msg="Course was successfully added";
                    }

                  }
                }
                else {
                  if(empty($msg11))
                  {
                    $sqlchecksamecourse="select * from Course where Course_Code='".$msg2."'";
                    $resultchecksamecourse = mysqli_query($virtual_con, $sqlchecksamecourse);
                    $rowchecksamecourse=mysqli_fetch_assoc($resultchecksamecourse);
                    $checksamecourse=$rowchecksamecourse['Course_ID'];

                    $sqlchecksamecourse2="select * from Course where Course_Code='".$msg3."'";
                    $resultchecksamecourse2 = mysqli_query($virtual_con, $sqlchecksamecourse2);
                    $rowchecksamecourse2=mysqli_fetch_assoc($resultchecksamecourse2);
                    $checksamecourse2=$rowchecksamecourse2['Course_ID'];

                    $sqlchecksamecourse3="select * from Course where Course_Code='".$msg4."'";
                    $resultchecksamecourse3 = mysqli_query($virtual_con, $sqlchecksamecourse3);
                    $rowchecksamecourse3=mysqli_fetch_assoc($resultchecksamecourse3);
                    $checksamecourse3=$rowchecksamecourse3['Course_ID'];

                    $sqlchecksamecourse4="select * from Course where Course_Code='".$msg5."'";
                    $resultchecksamecourse4 = mysqli_query($virtual_con, $sqlchecksamecourse4);
                    $rowchecksamecourse4=mysqli_fetch_assoc($resultchecksamecourse4);
                    $checksamecourse4=$rowchecksamecourse4['Course_ID'];

                    $sqlchecksamecourse5="select * from Course where Course_Code='".$msg6."'";
                    $resultchecksamecourse5 = mysqli_query($virtual_con, $sqlchecksamecourse5);
                    $rowchecksamecourse5=mysqli_fetch_assoc($resultchecksamecourse5);
                    $checksamecourse5=$rowchecksamecourse5['Course_ID'];

                    $sqlchecksamecourse6="select * from Course where Course_Code='".$msg7."'";
                    $resultchecksamecourse6 = mysqli_query($virtual_con, $sqlchecksamecourse6);
                    $rowchecksamecourse6=mysqli_fetch_assoc($resultchecksamecourse6);
                    $checksamecourse6=$rowchecksamecourse6['Course_ID'];

                    $sqlchecksamecourse7="select * from Course where Course_Code='".$msg8."'";
                    $resultchecksamecourse7 = mysqli_query($virtual_con, $sqlchecksamecourse7);
                    $rowchecksamecourse7=mysqli_fetch_assoc($resultchecksamecourse7);
                    $checksamecourse7=$rowchecksamecourse7['Course_ID'];

                    $sqlchecksamecourse8="select * from Course where Course_Code='".$msg9."'";
                    $resultchecksamecourse8 = mysqli_query($virtual_con, $sqlchecksamecourse8);
                    $rowchecksamecourse8=mysqli_fetch_assoc($resultchecksamecourse8);
                    $checksamecourse8=$rowchecksamecourse8['Course_ID'];

                    $sqlchecksamecourse9="select * from Course where Course_Code='".$msg10."'";
                    $resultchecksamecourse9 = mysqli_query($virtual_con, $sqlchecksamecourse9);
                    $rowchecksamecourse9=mysqli_fetch_assoc($resultchecksamecourse9);
                    $checksamecourse9=$rowchecksamecourse9['Course_ID'];

                    $sqlcheckcapacity="select * from Course where Course_Code='".$vid."'";
                    $resultcheckcapacity = mysqli_query($virtual_con, $sqlcheckcapacity);
                    $rowcheckcapacity=mysqli_fetch_assoc($resultcheckcapacity);
                    $maxcap=$rowcheckcapacity['Student_TotalCapacity'];
                    $currentcap=$rowcheckcapacity['Student_CurrentCapacity'];
                    $checkcourseid=$rowcheckcapacity['Course_ID'];
                    if($checksamecourse==$checkcourseid)
                    {
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse2==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse3==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse4==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse5==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse6==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse7==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse8==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    elseif($checksamecourse9==$checkcourseid) {
                      // code...
                      $msg="Sorry you already added this course.You cannot add the same subject again.";
                    }
                    else{
                      if($currentcap>=$maxcap)
                      {
                        $msg="Sorry this course is full and has reached maximum students capacity";
                      }
                      else {
                          $coursecredit=$rowcheckcapacity['Credit_Hour'];
                        $sqlupdate10="UPDATE `Student_Course` SET `Course10` = '".$vid."',`Total_Credit` =`Total_Credit`+ '".$coursecredit."' WHERE `Matric_ID` ='".$unid."'";
                         $tenthcourse=mysqli_query($virtual_con,$sqlupdate10);
                        $sqlupdatecourse="UPDATE `Course` SET `Student_CurrentCapacity` = `Student_CurrentCapacity`+1 WHERE `Course_Code` ='".$vid."'";
                        $resultcourse = mysqli_query($virtual_con, $sqlupdatecourse);

                      $msg="Course was successfully added";
                      }

                    }
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
