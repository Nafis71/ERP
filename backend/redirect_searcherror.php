<?php
session_start();
$indicate = $_GET['indicate'];
if($indicate == 1)
{
    $_SESSION['status']="Employee Data Not Available";
    $_SESSION['status_code']="info";
    $_SESSION['cause'] = "Please Recheck ID";
    header('location:../hrm/emp_record.php');
}
else if($indicate == 2)
{
$_SESSION['status']="Employee Data Not Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "Please Recheck ID";
header("location:../hrm/manage_salary.php");
}
else if($indicate == 3)
{
$_SESSION['status']="No Data Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "No Data Available For This Employee";
header('location:../hrm/historybonus_deduct.php');
}
else if($indicate == 4)
{
$_SESSION['status']="No Data Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "No Data Available For This Employee";
header('location:../hrm/emp_leave.php');
}
else if($indicate == 5)
{
$_SESSION['status']="No Data Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "No Data Available For This Employee";
header('location:../hrm/attendance.php');
}
else if($indicate == 6)
{
$_SESSION['status']="No Data Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "No Data Available For This Employee";
header('location:../finance/salary_expense.php');
}
else if($indicate == 7)
{
$_SESSION['status']="No Records Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "No Records Available For This Month";
header('location:../finance/salary_expense.php');
}
else if($indicate == 8)
{
$_SESSION['status']="No Records Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "";
header('location:../production/add_machine.php');
}
else if($indicate == 9)
{
$_SESSION['status']="No Records Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "";
header('location:../production/machine_repair.php');
}
else if($indicate == 10)
{
$_SESSION['status']="No Records Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "";
header('location:../finance/machine_buying_expense.php');
}
else if($indicate == 11)
{
$_SESSION['status']="No Records Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "";
header('location:../production/add_order.php');
}
else if($indicate == 12)
{
$_SESSION['status']="No Records Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "";
header('location:../production/raw_materials.php');
}
else if($indicate == 13)
{
$_SESSION['status']="No Records Available";
$_SESSION['status_code']="info";
$_SESSION['cause'] = "";
header('location:../finance/machinery_expenses.php');
}


?>