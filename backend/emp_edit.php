<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $name  = $_POST['name'];
    $address = $_POST['address'];
    $phone  = $_POST['phone'];
    $designation  = $_POST['designation'];
    $bank  = $_POST['bank'];
    $salary  = $_POST['salary'];
    $sql ="UPDATE employee set name ='$name', address ='$address', emp_phone ='$phone', designation ='$designation', bank ='$bank' where emp_id ='$id'";
    mysqli_query($connect,$sql);
    $sql2 = "UPDATE salary set salary ='$salary' where emp_id ='$id'";
    mysqli_query($connect,$sql2);
    $_SESSION['status']="Employee Info Updated Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../emp_record.php");
}
?>
