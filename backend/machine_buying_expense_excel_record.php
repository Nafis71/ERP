<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
$month =$_POST['month'];
$year =$_POST['year'];
$totalexpense=0;
if(isset($_POST['submit']))
{
   $sql ="SELECT *from machine_buying_expense where month = '$month'  and year ='$year'";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Machine&nbsp;ID</th>
            <th>Machine&nbsp;Name</th>
            <th>Machine&nbsp;Catagory</th>
            <th>Total&nbsp;Quantity</th>
            <th>Total&nbsp;Cost</th>
            <th>YearOfMonth</th>
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $machineid = $row['machine_id'];
            $sql ="SELECT distinct machine_name, machine_catagory from machine_list where machine_id = '$machineid'";
            $runsql = mysqli_query($connect,$sql);
            $fetchsql = mysqli_fetch_array($runsql);
            $sql2 = "SELECT sum(quantity) as quantity FROM machine_list where machine_id = '$machineid' and MONTH(buying_date)='$month' and YEAR(buying_date)='$year'";
            $runsql2 =mysqli_query($connect,$sql2);
            $fetchsql2 = mysqli_fetch_array($runsql2);
        $output .= '
        <tr>
          <td>'.$row['machine_id'].'</td>
          <td>'.$fetchsql['machine_name'].'</td>
          <td>'.$fetchsql['machine_catagory'].'</td>
          <td>'.$fetchsql2['quantity'].'</td>
          <td>'.$row['cost'].'</td>
          <td>'.$year.'-'.$month.'</td>
        </tr>
        
        
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=Machinery purchase monthly record.xls');
     echo $output;
   }
}


?>