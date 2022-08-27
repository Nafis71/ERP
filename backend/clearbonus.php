<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$sql ="select *from salary";
$run =mysqli_query($connect,$sql);
$fetch =mysqli_fetch_assoc($run);
if($fetch['festival_bonus']!=0)
{
    $salary = $fetch['salary'];
    $festivebonus = $fetch['festival_bonus'];
    $newsalary = $salary - $festivebonus;
    $sql2 ="update salary set salary='$newsalary' , festival_bonus='0'";
    mysqli_query($connect,$sql2);
    $_SESSION['status']="Festival Bonus Cleared Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../manage_salary.php");
}
else
{
    $_SESSION['status']="No records found on festive bonus";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "";
    header("location:../manage_salary.php");
}



?>