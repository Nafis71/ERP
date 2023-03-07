<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $sql ="SELECT *from raw_material_purchase ORDER BY serial_no desc";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
            <th>Serial&nbsp;Number</th>
            <th>Material&nbsp;ID</th>
            <th>Material&nbsp;Name</th>
            <th>Total&nbsp;Unit</th>
            <th>Per&nbsp;Unit&nbsp;Cost</th>
            <th>Total&nbsp;Price</th>
            <th>Payment&nbsp;Status</th>
            <th>Purchase&nbsp;Date</th>
     
    
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $output .= '
        <tr>
          <td>'.$row['serial_no'].'</td>
          <td>'.$row['material_id'].'</td>
          <td>'.$row['material_name'].'</td>
          <td>'.$row['quantity'].'</td>
          <td>'.$row['unit_cost'].'</td>
          <td>'.$row['total_cost'].'</td>
          <td>Paid</td>
          <td>'.$row['purchase_date'].'</td>
        </tr>
        
        
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=Material Purchase Info.xls');
     echo $output;
   }
}


?>