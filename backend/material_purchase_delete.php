<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
    $year=date("Y"); $month=date("m");
    $id = $_GET['id'];
    $sql = "SELECT total_cost, material_id from raw_material_purchase where serial_no= '$id'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_array($run);
    $cost = $fetch['total_cost'];
    $idm = $fetch['material_id'];
    $query ="DELETE from raw_material_purchase where serial_no ='$id'";
    mysqli_query($connect,$query);
    $sql = "SELECT cost from material_purchase_expense where  material_id ='$idm' and month='$month' and year ='$year'";
    $run2 = mysqli_query($connect,$sql);
    $fetch2 = mysqli_fetch_array($run2);
    $oldCost = $fetch2['cost'];
    $newCost = $oldCost - $cost;
    if($newCost <=0)
    {
        $query ="DELETE from material_purchase_expense where material_id ='$idm' and month = '$month' and year = '$year'";
        mysqli_query($connect,$query);
        $_SESSION['status']="Purchase Info Removed Successfully";
        $_SESSION['status_code']="success";
        $_SESSION['cause'] = "";
        header("location:../production/raw_materials.php");
    }
    else
    {
        $update ="Update material_purchase_expense set cost ='$newCost' Where material_id ='$idm' and month = '$month' and year = '$year'";
        mysqli_query($connect,$update);
        $_SESSION['status']="Purchase Info Removed Successfully";
        $_SESSION['status_code']="success";
        $_SESSION['cause'] = "";
        header("location:../production/raw_materials.php");
    }
?>