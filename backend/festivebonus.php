<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$sql ="SELECT *from salary natural join employee";
$run = mysqli_query($connect,$sql);
while($fetch = mysqli_fetch_assoc($run))
{
$currentsalary = $fetch['salary'];
$currentbonus = $fetch['bonus'];
$bonus = $currentsalary * (20/100);
$newsalary = $currentsalary + $bonus;
$totalbonus = $currentbonus + $bonus;
$id = $fetch['emp_id'];
$name = $fetch['name'];
$designation = $fetch['designation'];
$remark ="Festival Bonus added";
if($fetch['festival_bonus']!=0)
{
    //nothing will be updated for the employee
}
else
{
    $sql="UPDATE salary set salary ='$newsalary',bonus='$totalbonus', festival_bonus='$bonus' where emp_id='$id'";
    mysqli_query($connect,$sql);
    
    $sql ="INSERT into bonus_deduct values('$id','$name','$designation','$bonus','$remark',NOW())";
    mysqli_query($connect,$sql);

}
}
    $_SESSION['status']="Festival Bonus added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:../hrm/manage_salary.php");

?>