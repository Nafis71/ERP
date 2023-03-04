<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$name  = $_POST['name'];
$id  = $_POST['id'];
$per_unit_cost  = $_POST['unitcost'];
$quantity  = $_POST['unit'];
$date = $_POST['date'];
$month =date("m",strtotime($date));
$year =date("Y",strtotime($date));
$total_cost = $per_unit_cost * $quantity;
$insert ="INSERT into raw_material_purchase (material_id, material_name, quantity,unit_cost,total_cost,purchase_date) VALUES('$id','$name','$quantity','$per_unit_cost','$total_cost','$date')";
mysqli_query($connect,$insert);
$sql = "SELECT * FROM material_purchase_expense WHERE material_id = '$id' AND month = '$month' AND year = '$year'";
$run = mysqli_query($connect,$sql);
if(mysqli_num_rows($run)==0)
{
    $insert = "INSERT into material_purchase_expense (material_id,month,year,cost)Values('$id','$month','$year','$total_cost')";
    mysqli_query($connect,$insert);
    $_SESSION['status']="Purchase Info Added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/raw_materials.php");
}
else
{
    $update ="Update material_purchase_expense set cost = '$total_cost' where material_id ='$id' and month = '$month' and year = '$year'";
    mysqli_query($connect,$update);
    $_SESSION['status']="Purchase Info Added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/raw_materials.php");
}
?>