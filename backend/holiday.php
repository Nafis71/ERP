<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $year =$_POST['year'];
    $total_days = $_POST['total'];
    $date =$_POST['date'];
    $holiday=$_POST['holiday'];
        $query ="SELECT *from holiday where month='$date' and year='$year'";
        $run = mysqli_query($connect,$query);
        if(mysqli_num_rows($run)==0)
        {
            $working_days= $total_days-$holiday;
            $working_hour= $working_days*8;
            $insert = "INSERT into holiday(month,year,total_holiday,total_day,working_day,working_hour) values('$date','$year','$holiday','$total_days','$working_days','$working_hour')";
            mysqli_query($connect,$insert);
            $_SESSION['status']="Holiday Added Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../hrm/attendance.php");
        }
        else
        {
            $fetch =mysqli_fetch_assoc($run);
            $total_days= $fetch['total_day'];
            $temp_working=$total_days-$holiday;
            $working_hour= $temp_working*8;
            $update ="UPDATE holiday SET total_holiday='$holiday', working_day='$temp_working',working_hour='$working_hour' where month='$date'";
            mysqli_query($connect,$update);
            $_SESSION['status']="Holiday Added Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../hrm/attendance.php");

        }
       
}



?>