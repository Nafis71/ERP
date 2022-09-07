<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $id = $_POST['id'];
   $sql ="SELECT *from salary natural join employee where emp_id='$id'";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Employee ID</th>
     <th>Employee Name</th>
     <th>Designation</th>
     <th>Salary</th>
     <th>Total Bonus Amount</th>
     <th>Total Deducted Amount</th>
     <th>Festival Bonus</th>
     
    
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $output .= '
        <tr>
          <td>'.$row['emp_id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['designation'].'</td>
          <td>'.$row['salary'].'</td>
          <td>'.$row['bonus'].'</td>
          <td>'.$row['deduction'].'</td>
          <td>'.$row['festival_bonus'].'</td>
        </tr>
        
        
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=SearchedEmployee_Salary_Data.xls');
     echo $output;
   }
}


?>