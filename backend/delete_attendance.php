<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    if($_POST['check'] == NULL)
    {
        $_SESSION['status']="Please Select an Employee First";
        $_SESSION['status_code']="info";
        $_SESSION['cause'] = "";
        header("location:../hrm/attendance.php");
    }
    $id = $_POST['check'];
    $extract = implode(',' , $id);
    $query ="DELETE from attendance where emp_id IN($extract)";
    mysqli_query($connect,$query);
    $query ="DELETE from month where emp_id IN($extract)";
    mysqli_query($connect,$query);
    $_SESSION['status']="Employee Attendance Info Removed Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../hrm/attendance.php");
}
else
{
   
}



?>