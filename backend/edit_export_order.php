<?php
session_start();
include "connect.php";
mysqli_select_db($connect,'erp');

$product = $_POST['product'];
$companyName = $_POST['company'];
$country = $_POST['country'];
$unit = $_POST['unit'];
$date = $_POST['date'];
$orderno = $_POST['orderno'];
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
    
        $sqlWrite = "UPDATE export_order set product_id = '$productId', product_name = '$product', company_name ='$companyName', delivery_to ='$country', total_unit='$unit', per_unit_cost ='$productionCost', total_cost ='$totalCost', delivery_time ='$date' Where order_no ='$orderno'";
        mysqli_query($connect,$sqlWrite);
        $_SESSION['status']="Order Info Updated Successfully";
        $_SESSION['status_code']="success";
        $_SESSION['cause'] = "";
        header("location:../production/add_order.php");
   
    
}
else
{
    $_SESSION['status']="Country Location Didn't Match!";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "Please Select Right Country Location For $companyName";
    header("location:../production/export_order_edit.php?id=$orderno");
}




?>