<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$month =$_POST['month'];
$year = $_POST['year'];
if(isset($_POST['submit']))
{
   $sql ="SELECT *from salary_expense where month='$month' and year='$year' order by emp_id desc";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">

     <tr>
     <th>Employee&nbsp;ID</th>
     <th>Employee&nbsp;Name</th>
     <th>Employee&nbsp;Designation</th>
     <th>Basic&nbsp;Salary</th>
     <th>Transport&nbsp;Allowance</th>
     <th>Medical&nbsp;Allowance</th>
     <th>Rent&nbsp;Allowance</th>
     <th>Total&nbsp;Attendance</th>
     <th>Month&nbsp;Working&nbsp;Hour</th>
     <th>Total&nbsp;Working&nbsp;Hour</th>
     <th>Gross&nbsp;Salary</th>
     <th>YearofMonth</th>
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $output .= '
        <tr>
          <td>'.$row['emp_id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['designation'].'</td>
          <td>'.$row['basic_salary'].'</td>
          <td>'.$row['transport'].'</td>
          <td>'.$row['medical'].'</td>
          <td>'.$row['rent'].'</td>
          <td>'.$row['total_attendance'].'</td>
          <td>'.$row['month_working_hour'].'</td>
          <td>'.$row['total_working_hour'].'</td>
          <td>'.$row['gross_salary'].'</td>
          <td>'.$row['year'].'-'.$row['month'].'</td>
          
        </tr>
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=Salary Expense Data.xls');
     echo $output;
   }
}


?>