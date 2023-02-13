<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $sql ="SELECT *from export_order order by order_no desc";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Order&nbsp;Number</th>
        <th>Product&nbsp;ID</th>
            <th>Product&nbsp;Name</th>
            <th>Company&nbsp;Name</th>
            <th>Delivery&nbsp;To</th>
            <th>Total&nbsp;Unit</th>
            <th>Per&nbsp;Unit&nbsp;Cost</th>
            <th>Total&nbsp;Price</th>
            <th>Payment&nbsp;Type</th>
            <th>Payment&nbsp;Status</th>
            <th>Delivery&nbsp;Date</th>
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $pre_payment ="Pre-Payment";
        $payment_status = "Paid";
        $output .= '
        <tr>
          <td>'.$row['order_no'].'</td>
          <td>'.$row['product_id'].'</td>
          <td>'.$row['product_name'].'</td>
          <td>'.$row['company_name'].'</td>
          <td>'.$row['delivery_to'].'</td>
          <td>'.$row['total_unit'].'</td>
          <td>'.$row['per_unit_cost'].'</td>
          <td>'.$row['total_cost'].'</td>
          <td>'.$pre_payment.'</td>
          <td>'.$payment_status.'</td>
          <td>'.$row['delivery_time'].'</td>
          
        </tr>
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=ExportList.xls');
     echo $output;
   }
}


?>