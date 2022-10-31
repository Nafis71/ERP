<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$id = $_GET['id'];
$page = $_GET['page'];
if($page!=2)
{
    $query = "UPDATE emp_leave set approve_status = '1' where emp_id ='$id'";
    mysqli_query($connect,$query);
    $leave_update ="UPDATE employee set on_leave = '1' where emp_id ='$id'";
    mysqli_query($connect,$leave_update);
    header("location:../hrm/emp_leave.php");
}
else
{
    $query = "UPDATE emp_leave set approve_status = '1' where emp_id ='$id'";
    mysqli_query($connect,$query);
    $leave_update ="UPDATE employee set on_leave = '1' where emp_id ='$id'";
    mysqli_query($connect,$leave_update);
    header("location:../hrm/emp_leave_search.php?search=$id");
}

?>