<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $id = $_POST['id'];
   $sql ="SELECT *from bonus_deduct where emp_id = '$id' order by date desc";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Employee ID</th>
     <th>Employee Name</th>
     <th>Designation</th>
     <th>Amount</th>
     <th>Remark</th>
     <th>Date</th>
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $output .= '
        <tr>
          <td>'.$row['emp_id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['designation'].'</td>
          <td>'.$row['amount'].'</td>
          <td>'.$row['remark'].'</td>
          <td>'.$row['date'].'</td>
        </tr>
        
        
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=Search_Salaryhistory.xls');
     echo $output;
   }
}


?>