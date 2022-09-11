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
        header("location:../hrm/emp_record.php");
    }
    $id = $_POST['check'];
    $extract = implode(',' , $id);
    $query ="DELETE from employee where emp_id IN($extract)";
    mysqli_query($connect,$query);
    $query ="DELETE from salary where emp_id IN($extract)";
    mysqli_query($connect,$query);
    $_SESSION['status']="Employee Info Removed Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../hrm/emp_record.php");
}
else
{
   
}



?>