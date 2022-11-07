<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $year =$_POST['year'];
    $total_days = $_POST['total'];
    $date_temp =$_POST['date'];
    $date =date("m",strtotime($date_temp));
    $holiday=$_POST['holiday'];
        $query ="SELECT *from holiday where month='$date' and year='$year'";
        $run = mysqli_query($connect,$query);
        if(mysqli_num_rows($run)==0)
        {
            $working_days= $total_days-$holiday;
            $insert = "INSERT into holiday(month,year,total_holiday,total_day,working_day) values('$date','$year','$holiday','$total_days','$working_days')";
            mysqli_query($connect,$insert);
        }
        else
        {
            $fetch =mysqli_fetch_assoc($run);
            $total_days= $fetch['total_day'];
            $temp_working=$total_days-$holiday;
            $update ="UPDATE holiday SET total_holiday='$holiday', working_day='$temp_working' where month='$date'";
            mysqli_query($connect,$update);
        }
        $_SESSION['status']="Holiday Added Successfully";
                $_SESSION['status_code']="success";
                $_SESSION['cause'] = "";
                header("location:../hrm/attendance.php");
}



?>