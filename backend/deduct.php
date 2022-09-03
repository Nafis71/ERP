<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $sql ="SELECT *from salary natural join employee where emp_id='$id'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_assoc($run);
    $currentsalary = $fetch['salary'];
    $currentdeduction = $fetch['deduction'];
    $name = $fetch['name']; 
    $designation = $fetch['designation'];
    $deduct = $_POST['deduct'];
    $remark = $_POST['reason'];
    if($deduct > $currentsalary)
    {
    $_SESSION['status']="Deduction amount is greater than the salary!";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "";
    header("location:../hrm/manage_salary.php");
    }
    else
    {
        $newsalary = $currentsalary - $deduct;
        $newdeduction =$currentdeduction + $deduct;
        $update = "UPDATE salary set deduction ='$newdeduction', salary='$newsalary' where emp_id='$id'";
        mysqli_query($connect,$update);
        $insert = "INSERT into bonus_deduct values ('$id','$name','$designation','$deduct','$remark',NOW())";
        mysqli_query($connect,$insert);
        $_SESSION['status']="Salary Deducted Successfully";
        $_SESSION['status_code']="success";
        $_SESSION['cause'] = "";
        header("location:../hrm/manage_salary.php");
    }
    
    
}


?>