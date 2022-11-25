<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $sql ="SELECT *from machine_list";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Machine&nbsp;ID</th>
            <th>Machine&nbsp;Name</th>
            <th>Machine&nbsp;Catagory</th>
            <th>Per&nbsp;Unit&nbsp;Cost</th>
            <th>Quantity</th>
            <th>Total&nbsp;Price</th>
            <th>Buying&nbsp;Date</th>
     
    
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $output .= '
        <tr>
          <td>'.$row['machine_id'].'</td>
          <td>'.$row['machine_name'].'</td>
          <td>'.$row['machine_catagory'].'</td>
          <td>'.$row['quantity'].'</td>
          <td>'.$row['unit_price'].'</td>
          <td>'.$row['buying_price'].'</td>
          <td>'.$row['buying_date'].'</td>
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