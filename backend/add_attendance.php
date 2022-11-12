<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
function differenceInHours($startdate,$enddate){
	$starttimestamp = strtotime($startdate);
	$endtimestamp = strtotime($enddate);
	$difference = abs($endtimestamp - $starttimestamp)/3600;
	return $difference;
}
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $date_temp =$_POST['date'];
    $date = date("m",strtotime($date_temp));
    $intime=$_POST['intime'];
    $outtime=$_POST['outtime'];
    $working_hour = differenceInHours($intime,$outtime);
                $check ="SELECT * FROM employee where emp_id='$id'";
                $check_run = mysqli_query($connect,$check);
                if(mysqli_num_rows($check_run)!=0)
                {
                $query = "SELECT *from employee where emp_id ='$id'";
                $run= mysqli_query($connect,$query);
                $fetch_info = mysqli_fetch_array($run);
                $name = $fetch_info['name'];
                $designation = $fetch_info['designation'];
                $insert = "INSERT into attendance(emp_id,name,designation,attendance_date,in_time,out_time,working_hour,present_status) values('$id','$name','$designation','$date_temp','$intime','$outtime','$working_hour','1')";
                mysqli_query($connect,$insert);
                if($date==1)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='1'";
                    $attendance_check_run = mysqli_query($connect,$attendance_check);
                    if(mysqli_num_rows($attendance_check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,month,count) values('$id','1','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                    
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['count'];
                     $attendance++;
                     $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==2)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='2'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','2','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==3)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='3'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','3','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['count'];
                     $attendance++;
                     $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==4)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='4'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','4','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==5)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='5'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','5','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==6)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='6'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','6','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['count'];
                     $attendance++;
                     $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==7)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='7'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','7','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==8)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='8'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','8','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==9)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='9'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','9','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==10)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='10'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','10','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==11)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='11'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','11','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                    $attendance = $fetch_attendance['count'];
                    $attendance++;
                    $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                    mysqli_query($connect,$update);
                   }
                }
                if($date==12)
                {
                  $attendance_check ="SELECT * FROM month where emp_id='$id' and month ='12'";
                  $attendance_check_run = mysqli_query($connect,$attendance_check);
                  if(mysqli_num_rows($attendance_check_run)==0)
                 { 
                  $insert = "INSERT into month(emp_id,month,count) values('$id','12','1')";
                  mysqli_query($connect,$insert);
                 }
                   else
                   {
                    $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['count'];
                     $attendance++;
                     $update = "UPDATE month set count='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                $_SESSION['status']="Employee Attendance Added Successfully";
                $_SESSION['status_code']="success";
                $_SESSION['cause'] = "";
                header("location:../hrm/attendance.php");
                }
           
                    
               
            }
           
   

?>