<?php
session_start();
include "connect.php";
mysqli_select_db($connect,'erp');

$product = $_POST['product'];
$companyName = $_POST['company'];
$country = $_POST['country'];
$unit = $_POST['unit'];
$date = $_POST['date'];
$sqlProductId = "SELECT product_id, production_cost FROM product_info WHERE product_name ='$product'";
$runSqlProductId = mysqli_query($connect,$sqlProductId);
$fetchSqlProductId = mysqli_fetch_array($runSqlProductId);
$productId = $fetchSqlProductId['product_id'];
$productionCost = $fetchSqlProductId['production_cost'];
$totalCost = $productionCost * $unit;
$sqlCheck = "SELECT *from company_list where company_name = '$companyName' and company_origin ='$country'";
$sqlCheckRun = mysqli_query($connect,$sqlCheck);
if(mysqli_num_rows($sqlCheckRun)!=0)
{
    $sqlWrite = "Insert into export_order (product_id, product_name,company_name,delivery_to,total_unit,per_unit_cost,total_cost,delivery_time,status) values('$productId','$product','$companyName','$country','$unit','$productionCost','$totalCost','$date','0')";
    mysqli_query($connect,$sqlWrite);
    $_SESSION['status']="Order Info Added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/add_order.php");
}
else
{
    $_SESSION['status']="Country Location Didn't Match!";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "Please Select Right Country Location For $companyName";
    header("location:../production/add_order.php");
}




?>