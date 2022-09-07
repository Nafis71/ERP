<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id =$_POST['id'];
    $bonus = $_POST['bonus'];
    $remark = $_POST['reason'];
    $sql ="SELECT *from salary where emp_id ='$id'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_assoc($run);
    $currentsalary = $fetch['salary'];
    $totalbonus= $currentsalary * ($bonus/100) ;
    $newsalary = $currentsalary + $totalbonus;
    $previousbonus = $fetch['bonus'];
    $newbonus = $totalbonus + $previousbonus;
    if($bonus!= 20)
    {
    $sql ="UPDATE salary set salary='$newsalary', bonus='$newbonus' where emp_id ='$id'";
    mysqli_query($connect,$sql);
    }
    else
    {
        if($fetch['festival_bonus']!=0)
        {
            $_SESSION['status']="Selected Employee already enjoying this bonus";
            $_SESSION['status_code']="info";
            $_SESSION['cause'] = "";
            header("location:../hrm/manage_salary.php");
        }
        $sql ="UPDATE salary set salary='$newsalary', bonus='$newbonus', festival_bonus='$totalbonus' where emp_id ='$id'";
        mysqli_query($connect,$sql);   
    }
    $sql ="SELECT *from employee where emp_id ='$id'";
    $run = mysqli_query($connect,$sql);
    $fetch = mysqli_fetch_assoc($run);
    $name = $fetch['name'];
    $designation =$fetch['designation'];
    $sql ="INSERT into bonus_deduct(emp_id,name,designation,amount,remark,date) values('$id','$name','$designation','$totalbonus','$remark',NOW())";
    mysqli_query($connect,$sql);
    $_SESSION['status']="Bonus Added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../hrm/manage_salary.php");

}

?>