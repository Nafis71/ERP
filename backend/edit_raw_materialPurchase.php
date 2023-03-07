<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$serial = $_POST['serial'];
$quantity = $_POST['unit'];
$unit_cost = $_POST['per_unit'];
$old_cost = $_POST['oldCost'];
$total_cost = $quantity * $unit_cost;
$date = $_POST['date'];
$oldDate = $_POST['oldDate'];
$month =date("m",strtotime($date));
$year =date("Y",strtotime($date));
$oldMonth = date("m",strtotime($oldDate));
$oldYear = date("Y",strtotime($oldDate));

$update = "UPDATE raw_material_purchase set quantity='$quantity', unit_cost='$unit_cost',total_cost ='$total_cost', purchase_date='$date' where serial_no = '$serial'";
mysqli_query($connect, $update);
if($old_cost>$total_cost)
{
    $newCost = $old_cost - $total_cost;
    $sql = "SELECT material_id FROM raw_material_purchase WHERE serial_no='$serial'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_array($run);
    $material_id = $fetch['material_id'];

    $sql = "SELECT cost FROM material_purchase_expense WHERE material_id='$material_id' and month='$oldMonth' and year='$year'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_array($run);
    $currentCost = $fetch['cost'];
    $updatedCost = $currentCost - $newCost;
    if($oldMonth != $month && $oldYear == $year)
    {
        $sql = "SELECT *FROM material_purchase_expense WHERE material_id='$material_id' and month='$month' and year='$year'";
        $run = mysqli_query($connect,$sql);
        if(mysqli_num_rows($run) == 0)
        {
            $insert = "INSERT into material_purchase_expense (material_id,month,year,cost)Values('$material_id','$month','$year','$total_cost')";
            mysqli_query($connect,$insert);
            $costModify = $currentCost - $total_cost;
            $update = "UPDATE material_purchase_expense set cost='$costModify' where material_id='$material_id' and month='$oldMonth' and year='$year'";
            mysqli_query($connect,$update);
            $_SESSION['status']="Purchase Info Updated Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../production/raw_materials.php");
        }
        else
        { 
            $sql = "SELECT cost FROM material_purchase_expense WHERE material_id='$material_id' and month='$month' and year='$year'";
            $run = mysqli_query($connect,$sql);
            $fetch = mysqli_fetch_array($run);
            $currentCost = $fetch['cost'];
            $costModify = $currentCost + $total_cost;
            $update = "UPDATE material_purchase_expense set cost='$costModify' where material_id='$material_id' and month='$month' and year='$year'";
            mysqli_query($connect,$update);
            $delete = "DELETE FROM material_purchase_expense WHERE material_id='$material_id' and month='$oldMonth' and year='$year'";
            mysqli_query($connect,$delete);
            $_SESSION['status']="Purchase Info Updated Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../production/raw_materials.php");
        }
       
    }
    else
    {
    $update = "UPDATE material_purchase_expense set cost='$updatedCost' where material_id='$material_id' and month='$month' and year='$year'";
    mysqli_query($connect,$update);
    $_SESSION['status']="Purchase Info Updated Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/raw_materials.php");
    }
}
else
{
    $newCost =  $total_cost - $old_cost ;
    $sql = "SELECT material_id FROM raw_material_purchase WHERE serial_no='$serial'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_array($run);
    $material_id = $fetch['material_id'];

    $sql = "SELECT cost FROM material_purchase_expense WHERE material_id='$material_id' and month='$oldMonth' and year='$year'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_array($run);
    $currentCost = $fetch['cost'];
    $updatedCost = $currentCost + $newCost;
    if($oldMonth != $month && $oldYear == $year)
    {
        $sql = "SELECT *FROM material_purchase_expense WHERE material_id='$material_id' and month='$month' and year='$year'";
        $run = mysqli_query($connect,$sql);
        if(mysqli_num_rows($run) == 0)
        {
            $insert = "INSERT into material_purchase_expense (material_id,month,year,cost)Values('$material_id','$month','$year','$total_cost')";
            mysqli_query($connect,$insert);
            $costModify = $currentCost - $total_cost;
            $update = "UPDATE material_purchase_expense set cost='$costModify' where material_id='$material_id' and month='$oldMonth' and year='$year'";
            mysqli_query($connect,$update);
            $_SESSION['status']="Purchase Info Updated Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../production/raw_materials.php");
        }
        else
        { 
            $sql = "SELECT cost FROM material_purchase_expense WHERE material_id='$material_id' and month='$month' and year='$year'";
            $run = mysqli_query($connect,$sql);
            $fetch = mysqli_fetch_array($run);
            $currentCost = $fetch['cost'];
            $costModify = $currentCost + $total_cost;
            $update = "UPDATE material_purchase_expense set cost='$costModify' where material_id='$material_id' and month='$month' and year='$year'";
            mysqli_query($connect,$update);
            $delete = "DELETE FROM material_purchase_expense WHERE material_id='$material_id' and month='$oldMonth' and year='$year'";
            mysqli_query($connect,$delete);
            $_SESSION['status']="Purchase Info Updated Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../production/raw_materials.php");
        }
       
    }
    else
    {
    $update = "UPDATE material_purchase_expense set cost='$updatedCost' where material_id='$material_id' and month='$month' and year='$year'";
    mysqli_query($connect,$update);
    $_SESSION['status']="Purchase Info Updated Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../production/raw_materials.php");
    }
}



?>