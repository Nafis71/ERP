<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $check = "SELECT emp_id from employee where emp_id='$id'";
    $check_run = mysqli_query($connect,$check);
    if(mysqli_num_rows($check_run)!=0)
    {
    $reason = $_POST['reason'];
    $start_date = $_POST['date'];
    $end_date = $_POST['date2'];
    $status = $_POST['status'];
    $remarks = $_POST['message'];
    $query_name = "SELECT name from employee where emp_id ='$id'";
    $run_query_name = mysqli_query($connect,$query_name);
    $fetch_name = mysqli_fetch_assoc($run_query_name);
    $name= $fetch_name['name'];
    $query ="INSERT into emp_leave (emp_id,name,start_date,end_date,leave_type,remarks,approve_status) values ('$id','$name','$start_date','$end_date','$reason','$remarks','$status')";
    mysqli_query($connect,$query);
    $_SESSION['status']="Leave INFO Added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../hrm/emp_leave.php");
    }
    else
    {
    $_SESSION['status']="Employee Not found";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "";
    header("location:../hrm/emp_leave.php");
    }
}


?>