<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$sql ="SELECT *from salary where festival_bonus = 0";
$run =mysqli_query($connect,$sql);
if(mysqli_num_rows($run)!=0)
{
    $_SESSION['status']="No employees are currently enjoying this bonus";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "";
    header("location:../manage_salary.php");   
}
else
{
    $sql ="SELECT *from salary";
    $run =mysqli_query($connect,$sql);
    while($fetch =mysqli_fetch_assoc($run))
    {
    if($fetch['festival_bonus']!=0)
    {
        $salary = $fetch['salary'];
        $id = $fetch['emp_id'];
        $festivebonus = $fetch['festival_bonus'];
        $newsalary = $salary - $festivebonus;
        $sql2 ="UPDATE salary set salary='$newsalary' , festival_bonus='0' where emp_id='$id'";
        mysqli_query($connect,$sql2);
        
    }
    }
    
   
        $sql ="SELECT *from salary where festival_bonus = 0";
        $run =mysqli_query($connect,$sql);
        if(mysqli_num_rows($run) > 0)
        {
            $_SESSION['status']="Festival Bonus Cleared Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../manage_salary.php");
        }
        
    
    
}


?>