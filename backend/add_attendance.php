<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $arr_id=$_POST['id'];
    $date_temp =$_POST['date'];
    $date = date("m",$date_temp);
    $arr[0]=0;
    $j=0;
        for($i =0;$i<strlen($arr_id);$i++)
        {
           
            if($arr_id[$i]==',')
            {
                $id=implode($arr);
                $j=0;
                $check ="SELECT * FROM employee where emp_id='$id'";
                $check_run = mysqli_query($connect,$check);
                if(mysqli_num_rows($check_run)!=0)
                {
                $query = "SELECT *from employee where emp_id ='$id'";
                $run= mysqli_query($connect,$query);
                $fetch_info = mysqli_fetch_array($run);
                $name = $fetch_info['name'];
                $designation = $fetch_info['designation'];
                $insert = "INSERT into attendance(emp_id,name,designation,present_status) values('$id','$name','$designation','1')";
                mysqli_query($connect,$insert);
                if($date==1)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,january) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['january'];
                     $attendance++;
                     $update = "UPDATE month set januray='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==2)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,february) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['february'];
                     $attendance++;
                     $update = "UPDATE month set february='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==3)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,march) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['march'];
                     $attendance++;
                     $update = "UPDATE month set march='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==4)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,april) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['april'];
                     $attendance++;
                     $update = "UPDATE month set april='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==5)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,may) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['may'];
                     $attendance++;
                     $update = "UPDATE month set may='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==6)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,june) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['june'];
                     $attendance++;
                     $update = "UPDATE month set june='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==7)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,july) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['july'];
                     $attendance++;
                     $update = "UPDATE month set july='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==8)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,august) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['august'];
                     $attendance++;
                     $update = "UPDATE month set august='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==9)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,september) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['september'];
                     $attendance++;
                     $update = "UPDATE month set september='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==10)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,october) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['october'];
                     $attendance++;
                     $update = "UPDATE month set october='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==11)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,november) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['november'];
                     $attendance++;
                     $update = "UPDATE month set november='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                if($date==12)
                {
                    $attendance_check ="SELECT * FROM month where emp_id='$id'";
                    $attendance_check_run = mysqli_query($connect,$check);
                    if(mysqli_num_rows($check_run)==0)
                   { 
                    $insert = "INSERT into month(emp_id,december) values('$id','1')";
                    mysqli_query($connect,$insert);
                   }
                   else
                   {
                     $fetch_attendance=mysqli_fetch_assoc($attendance_check_run);
                     $attendance = $fetch_attendance['december'];
                     $attendance++;
                     $update = "UPDATE month set december='$attendance' where emp_id='$id'";
                     mysqli_query($connect,$update);
                   }
                }
                $_SESSION['status']="Employee Attendance Added Successfully";
                $_SESSION['status_code']="success";
                $_SESSION['cause'] = "";
                header("location:../hrm/attendance.php");
                }
            }
            else
            {
                
                    $arr[$j]=$arr_id[$i];
                    $j++;
                    
               
            }
           
        }
   
}

?>