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
        header("location:../production/add_order.php");
    }
    $id = $_POST['check'];
    $extract = implode(',' , $id);
    $query ="DELETE from export_order where order_no IN($extract)";
    mysqli_query($connect,$query);
    $_SESSION['status']="Order Info Removed Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/add_order.php");
}
else
{
   
}



?>