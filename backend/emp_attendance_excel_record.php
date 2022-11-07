<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $sql ="SELECT *from attendance natural join month order by emp_id desc";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Employee ID</th>
     <th>Employee Name</th>
     <th>Employee Designation</th>
     <th>Attendance Date</th>
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