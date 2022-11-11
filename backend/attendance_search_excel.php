<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$id =$_POST['id'];
$month = $_POST['month'];
if(isset($_POST['submit']))
{
   $sql ="SELECT *from attendance where emp_id ='$id' and MONTH(attendance_date)='$month' order by attendance_date desc";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Employee Designation</th>
            <th>Attendance Date</th>
            <th>In Time</th>
            <th>Out Time</th>
            <th>Working Hour</th>
            <th>Present Status</th>
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $output .= '
        <tr>
        <td>'.$row['emp_id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['designation'].'</td>
        <td>'.$row['attendance_date'].'</td>
        <td>'.$row['in_time'].'</td>
        <td>'.$row['out_time'].'</td>
        <td>'.$row['working_hour'].'</td>
        </tr>
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=Employee_Attendance_Data.xls');
     echo $output;
   }
}


?>