<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
    $id = $_GET['serial_no'];
    $sql = "SELECT total_cost from raw_material_purchase where serial_no= '$id'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_array($run);
    $cost = $fetch['total_cost'];
    $query ="DELETE from raw_materiral_purchase where serial_no ='$id'";
    mysqli_query($connect,$query);
    $sql = "SELECT cost from material_purchase_expense";
    $query ="DELETE from month where emp_id IN($extract)";
    mysqli_query($connect,$query);
    $_SESSION['status']="Employee Attendance Info Removed Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../hrm/attendance.php");
?>