<?php
session_start();
include 'connect.php';
mysqli_select_db($connect,'erp');
if(isset($_POST['submit']))
{
   $sql ="SELECT *from emp_leave order by issue_date desc where emp_id";
   $run = mysqli_query($connect,$sql);
   if(mysqli_num_rows($run) > 0)
   {
     $output ='<table class="table" border="1">
     <tr>
     <th>Employee ID&nbsp;</th>
            <th>Employee Name&nbsp;</th>
            <th>Start Date&nbsp;&nbsp;</th>
            <th>End Date&nbsp;&nbsp;</th>
            <th>Issued on&nbsp;&nbsp;</th>
            <th>Leave Type&nbsp;</th>
            <th>Remarks&nbsp;</th>
            <th>Approve Status&nbsp;</th>
            
     </tr>
     
     
     ';
     while($row = mysqli_fetch_assoc($run))
     {
        $status="Open";
        if($row['approve_status']==1)
              {
                $status="Approved";
              }
              elseif($row['approve_status']==0)
              {
                $status="Not Approved";
              }
        $output .= '
        <tr>
          <td>'.$row['emp_id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['start_date'].'</td>
          <td>'.$row['end_date'].'</td>
          <td>'.$row['issue_date'].'</td>
          <td>'.$row['leave_type'].'</td>
          <td>'.$row['remarks'].'</td>
          <td>'.$status.'</td>
          
        </tr>
        
        ';
     }
     $output .= '</table>';
     header('Content-type: application/xls');
     header('Content-Disposition:attachment;filename=Salaryhistory.xls');
     echo $output;
   }
}


?>