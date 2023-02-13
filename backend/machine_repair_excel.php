<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $sql ="SELECT *from machine_repair";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Machine&nbsp;ID</th>
     <th>Machine&nbsp;Name</th>
     <th>Machine&nbsp;Function</th>
     <th>Repair&nbsp;Cost</th>
     <th>Issue&nbsp;date</th>
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $pre_payment ="Pre-Payment";
        $payment_status = "Paid";
        $output .= '
        <tr>
          <td>'.$row['machine_id'].'</td>
          <td>'.$row['machine_name'].'</td>
          <td>'.$row['machine_function'].'</td>
          <td>'.$row['cost'].'</td>
          <td>'.$row['date'].'</td>
        </tr>
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=MachineRepairList.xls');
     echo $output;
   }
}


?>