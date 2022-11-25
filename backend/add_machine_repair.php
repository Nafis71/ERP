<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id =$_POST['id'];
    $cost = $_POST['cost'];
    $sql= "SELECT machine_id from machine_repair where machine_id ='$id'";
    $run= mysqli_query($connect,$sql);
    if(mysqli_num_rows($run)==0)
    {
    $sql= "SELECT distinct machine_name,machine_catagory from machine_list where machine_id ='$id'";
    $run= mysqli_query($connect,$sql);
    if(mysqli_num_rows($run)!=0)
    {
        $fetch = mysqli_fetch_assoc($run);
        $name = $fetch['machine_name'];
        $catagory = $fetch['machine_catagory'];
        $sql = "insert into machine_repair(machine_id,machine_name,machine_function,working_status,cost,date) values('$id','$name','$catagory','0','$cost',NOW())";
        mysqli_query($connect,$sql);
        $_SESSION['status']="Added Successfully";
        $_SESSION['status_code']="success";
        $_SESSION['cause'] = "";
        header("location:../production/machine_repair.php");
    }
    else{
        $_SESSION['status']="Machine info not found";
        $_SESSION['status_code']="error";
        $_SESSION['cause'] = "Please check machine id";
        header("location:../production/machine_repair.php");
    }
   
}
else
{
    $_SESSION['status']="Machine info Already exists";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "Please check machine id";
    header("location:../production/machine_repair.php");
}
}
?>