<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$month =date("m");
$year =date("Y");
if(isset($_POST['submit']))
{
    if($_POST['check'] == NULL)
    {
        $_SESSION['status']="Please Select an Employee First";
        $_SESSION['status_code']="info";
        $_SESSION['cause'] = "";
        header("location:../production/machine_repair.php");
    }
    $id = $_POST['check'];
    for($i=0;$i<sizeof($id);$i++)
    {
        $id2 = $id[$i];
        $sql="SELECT *from machine_repair where machine_id = '$id2'";
        $run = mysqli_query($connect,$sql);
        $fetch = mysqli_fetch_array($run);
        $name = $fetch['machine_name'];
        $catagory = $fetch['machine_function'];
        $cost = $fetch['cost'];
        $sql2 = "SELECT *from machine_repair_expense where machine_id = '$id2' and month = '$month' and year='$year'";
        $run2 = mysqli_query($connect,$sql2);
        if(mysqli_num_rows($run2)==0)
        {
        mysqli_query($connect,$sql2);
        $sql2 = "INSERT into machine_repair_expense(machine_id, machine_name, machine_catagory,cost,month,year)values('$id2','$name','$catagory','$cost','$month','$year')";
        mysqli_query($connect,$sql2);
        }
        else
        {
          $fetch2=mysqli_fetch_array($run2);
          $newcost = $cost + $fetch2['cost'];
          $update ="UPDATE machine_repair_expense SET cost= '$newcost' where machine_id = '$id2' and month = '$month' and year='$year'";
          mysqli_query($connect,$update);
        }
    }
    $extract = implode(',' , $id);
    $query ="DELETE from machine_repair where machine_id IN($extract)";
    mysqli_query($connect,$query);
    $_SESSION['status']="Employee Info Removed Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/machine_repair.php");
}




?>