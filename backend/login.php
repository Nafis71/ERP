<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id =$_POST['id'];
    $password = md5($_POST['password']);
    $sql = "SELECT *from login where emp_id ='$id' and password = '$password'";
    $run = mysqli_query($connect,$sql);
    if(mysqli_num_rows($run) !=0)
    {
        $_SESSION['id'] = $id;
        $_SESSION['status']="Login Successful";
        $_SESSION['status_code']="success";
        $_SESSION['cause'] = "";
        header("location:../dashboard.php");
    }
    else
    {
        $_SESSION['status']="Password/UserID is invalid";
        $_SESSION['status_code']="error";
        $_SESSION['cause'] = "";
        header("location:../index.php");
    }
}



?>