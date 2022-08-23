<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id = $_POST['check'];
    $extract = implode(',' , $id);
    $query ="delete from employee where emp_id IN($extract)";
    mysqli_query($connect,$query);
    $_SESSION['status']="Employee Info Removed Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../emp_record.php");
}
else
{
    echo 'error';
}



?>