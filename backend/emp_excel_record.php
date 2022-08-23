<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $sql ="select *from employee natural join salary order by emp_id desc";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Employee ID</th>
     <th>Employee Name</th>
     <th>Designation</th>
     <th>Address</th> 
     <th>Phone No</th>
     <th>Bank AC Num</th>
     <th>Gender</th>
     <th>Join date</th>
     <th>Salary</th>
     
    
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $output .= '
        <tr>
          <td>'.$row['emp_id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['designation'].'</td>
          <td>'.$row['address'].'</td>
          <td>'.$row['emp_phone'].'</td>
          <td>'.$row['bank'].'</td>
          <td>'.$row['gender'].'</td>
          <td>'.$row['join_date'].'</td>
          <td>'.$row['salary'].'</td>
        </tr>
        
        
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=Employee_Data.xls');
     echo $output;
   }
}


?>