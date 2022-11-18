<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $month =date("m",strtotime($date));
    $year =date("Y",strtotime($date));
    $function = $_POST['catagory'];
    $unitcost = $_POST['unitcost'];
    $quantity = $_POST['quantity'];
    $cost = $unitcost*$quantity;
    $query ="INSERT into machine_list(machine_id,machine_name,machine_catagory,quantity,unit_price,buying_price,buying_date)values('$id','$name','$function','$quantity','$unitcost','$cost','$date')";
    mysqli_query($connect,$query);
    $check_query ="Select machine_id from machine_buying_expense where machine_id ='$id' and month = '$month' and year = '$year'";
    $check_run = mysqli_query($connect,$check_query);
    if(mysqli_num_rows($check_run)==0)
    {
        $query2 ="INSERT into machine_buying_expense values('$id','$month','$year','$cost')";
        mysqli_query($connect,$query2);
    }
    else
    {
        $fetch = mysqli_fetch_array($check_run);
        $newcost = $cost+ $fetch['cost'];
        $query2 ="UPDATE machine_buying_expense SET cost='$newcost' WHERE machine_id = '$id' and year = '$year'";
        mysqli_query($connect,$query2);
    }
   
    $_SESSION['status']="Machine Info Added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/add_machine.php");

}



?>