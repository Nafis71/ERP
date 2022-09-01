<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $designation = $_POST['designation'];
    $bank = $_POST['bank'];
    $salary = $_POST['salary'];


    $query ="SELECT emp_id from employee where emp_id = '$id'";
    $run = mysqli_query($connect,$query);
    $rows = mysqli_num_rows($run);
    if($rows==0)
    {
        $query ="SELECT emp_id from employee where bank = '$bank'";
        $run = mysqli_query($connect,$query);
        $rows = mysqli_num_rows($run);
        if($rows==0)
        {
            $query ="SELECT emp_id from employee where emp_phone = '$phone'";
            $run = mysqli_query($connect,$query);
            $rows = mysqli_num_rows($run);
            if($rows==0)
            {
            $query = "INSERT into employee(emp_id, name, designation,address,emp_phone,bank,gender,Join_date) values ('$id','$name','$designation','$address','$phone','$bank','$gender',NOW())";
            mysqli_query($connect,$query);
            $query2 = "INSERT into salary (emp_id, salary) values ('$id','$salary')";
            mysqli_query($connect,$query2);
            $_SESSION['status']="Employee Info Added Successfully";
            $_SESSION['status_code']="success";
            $_SESSION['cause'] = "";
            header("location:../emp_record.php");
            }
            else
            {
            $_SESSION['status']="Duplicate Phone Number";
            $_SESSION['status_code']="error";
            $_SESSION['cause'] = "";
            header("location:../emp_record.php");
            }
        }
        else
        {
            $_SESSION['status']="Duplicate Bank Account Number";
            $_SESSION['status_code']="error";
            $_SESSION['cause'] = "";
            header("location:../emp_record.php");
        }


    }
    else
    {
        $_SESSION['status']="Employee ID already exists";
        $_SESSION['status_code']="error";
        $_SESSION['cause'] = "";
        header("location:../emp_record.php");
    }
}





?>