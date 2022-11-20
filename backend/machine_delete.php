<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    if($_POST['check'] == NULL)
    {
        $_SESSION['status']="Please Select A Machine First!";
        $_SESSION['status_code']="info";
        $_SESSION['cause'] = "";
        header("location:../production/add_machine.php");
    }
    $id = $_POST['check'];
    $extract = implode(',' , $id);
    $query ="DELETE from machine_list where machine_id IN($extract)";
    mysqli_query($connect,$query);
    $query ="DELETE from machine_buying_expense where machine_id IN($extract)";
    mysqli_query($connect,$query);
    $_SESSION['status']="Employee Info Removed Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/add_machine.php");
}
else
{
   
}



?>