<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$id = $_GET['id'];
$query = "UPDATE emp_leave set approve_status = '0' where emp_id ='$id'";
mysqli_query($connect,$query);
header("location:../hrm/emp_leave.php");
?>