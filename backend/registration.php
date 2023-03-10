<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id =$_POST['id'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    $sql = "SELECT *from login where emp_id ='$id' and password = '$password'";
    $run = mysqli_query($connect,$sql);
    if(mysqli_num_rows($run) ==0)
    {
        $insert = "INSERT INTO login VALUES ('$id','$password','$level')";
        mysqli_query($connect,$insert);
        $_SESSION['status']="User Added";
        $_SESSION['status_code']="success";
        $_SESSION['cause'] = "";
        header("location:../user.php");
    }
    else
    {
        $_SESSION['status']="Already Exists";
        $_SESSION['status_code']="error";
        $_SESSION['cause'] = "";
        header("location:../user.php");
    }
}



?>