<?php
session_start();
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41129fd756.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/emp_leave.css" rel='stylesheet'>
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Employee Leave</title>
</head>
<body>
<!--sidebar starts here-->
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Bando ERP</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../dashboard.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../dashboard.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">HRM Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">HRM Panel</a></li>
          <li><a href="emp_record.php">Employee Records</a></li>
          <li><a href="emp_leave.php">Employee Leave</a></li>
          <li><a href="attendance.php">Attendance</a></li>
          <li><a href="manage_salary.php">Bonus/Deduct Salary</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Finance Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
        <li><a class="link_name" href="#">Finance Panel</a></li>
          <li><a href="../finance/salary_expense.php">Salary Expense</a></li>
          
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class='bx bx-package' ></i>
            <span class="link_name">Production Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Production Panel</a></li>
          <li><a href="../production/add_order.php">Add Export Orders</a></li>
          <li><a href="../production/machine_repair.php">Machine Repair</a></li>
          <li><a href="../production/add_machine.php">Machinery Purchase</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        
      </div>
      <?php
       include 'connect.php';
       mysqli_select_db($connect,'erp');
       $sql="SELECT *FROM employee where emp_id ='$id'";
       $run = mysqli_query($connect,$sql);
       $fetch = mysqli_fetch_array($run);
      ?>
      <div class="name-job">
      <div class="profile_name"><?php echo $fetch['name']; ?></div>
        <div class="job"><?php echo $fetch['designation']; ?></div>
      </div>
      <i class='bx bx-log-out' onclick="window.location.href='../backend/logout.php'"></i>
    </div>
  </li>
</ul>
  </div>
  <!-- sidebar ends here-->

 <!--homesection or main body starts here -->

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Employee Leave Information</span>
      
    </div>
    <div class = "sec-1">
     
     <table class="styled-table">
    <?php
           include 'connect.php';
           mysqli_select_db($connect,'erp');
           $limit = 12;
           
           if(isset($_GET['page']))
           {
            $page = $_GET['page'];
           }
           else
           {
            $page =1;
           }
           $offset = ($page-1) * $limit;
           $query1 = "SELECT *from emp_leave";
           $result = mysqli_query($connect,$query1);
           ?>
      <thead>
        <tr>
          <th class="head" colspan="11">
<?php echo'<span>Total Entries found '.mysqli_num_rows($result).' & Showing Page Number '.$page.'</span>';?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr>
          <form action="../hrm/emp_leave_search.php" method="GET">
          <th colspan="3" class="head1">
           <input id="form_lastname" type="number" name="search" class="form-control" placeholder="Enter employee id *" required="required" >
          </th>
          <th colspan="3"class="head1">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          <form  method="POST" action="../backend/emp_leave_excel_record.php">
          <th colspan="4" class="head2" >
          <button class="btn btn-success" type="submit" name ="submit"><i class="fa-solid fa-file-excel"></i>&nbsp;Export Excel</button>
          </form>
          &nbsp;&nbsp;&nbsp;<button class="btn btn-light"  id="mybtn" ><i class="fas fa-angle-double-up"></i>&nbsp;Add</button>
          </th>
          <th colspan ="1" class="head2">
          <form action="../backend/delete_emp_leave.php" method="POST">
          <button class="btn btn-danger" type="submit" name ="submit"  ><i class="fa fa-solid fa-trash-can"></i>&nbsp;Delete</button>
          </th>
          
          
        </tr>
        
         
           
         
      </thead>
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID&nbsp;</th>
            <th>Employee Name&nbsp;</th>
            <th>Start Date&nbsp;&nbsp;</th>
            <th>End Date&nbsp;&nbsp;</th>
            <th>Issued on&nbsp;&nbsp;</th>
            <th>Leave Days&nbsp;</th>
            <th>Leave Type&nbsp;</th>
            <th>Remarks&nbsp;</th>
            <th>Approve Status&nbsp;</th>
            <th>Action&nbsp;</th>
           
        </tr>
    </thead>
    <tbody>
          <!-- php code for generating the employee list in the table-->
          <?php
          mysqli_select_db($connect,'erp');
           $query  = "select *from emp_leave ORDER BY issue_date asc LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           while($fetch = mysqli_fetch_array($run))
           {
           ?>
        <tr>
            <td><input type="checkbox" name=check[] value="<?php  echo $fetch['emp_id']; ?>"> </td>
            <td><?php echo $fetch['emp_id']?></td>
            <td><?php echo $fetch['name']?></td>
            <td><?php echo $fetch['start_date']?></td>
            <td><?php echo $fetch['end_date']?></td>
            <td><?php echo $fetch['issue_date']?></td>
            <?php
            $empid = $fetch['emp_id'];
            $diff ="SELECT DATEDIFF(end_date,start_date) as diff FROM emp_leave where emp_id ='$empid'";
            $execute = mysqli_query($connect,$diff);
            $fetch_diff = mysqli_fetch_array($execute);
            ?>
            <td><?php echo $fetch_diff['diff']?>&nbsp;days</td>
            <td><?php echo $fetch['leave_type']?></td>
            <td><?php echo $fetch['remarks']?></td>
            <?php
              if($fetch['approve_status']==1)
              {
                echo '<td style=color:green>Approved</td>';
              }
              elseif($fetch['approve_status']==0)
              {
                echo '<td style=color:Crimson>Not Approved</td>';
              }
              else
              {
                echo '<td style=color:Black>Open</td>';
              }
            ?>
             <?php
              if($fetch['approve_status']==3)
              {?>
            <?php echo '<td> <a class = "btn btn-success" href="../backend/emp_leave_approve.php?id='.$fetch['emp_id'].'"><i class="fa-solid fa-check"></i></a>&nbsp; &nbsp;&nbsp;<a class = "btn btn-danger" href="../backend/emp_leave_notapproved.php?id='.$fetch['emp_id'].'">';?><i class="fa-solid fa-xmark"></i></a></td>    
            <?php }
            else{
              echo '<td>&nbsp;</td>';
            }
            ?>    
        </tr><?php
           }
           ?> 
    </tbody>
</table>
</form>
<?php
$query1 = "SELECT *from emp_leave";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../hrm/emp_leave.php?page='.($page-1).'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="../hrm/emp_leave.php?page='.$i.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../hrm/emp_leave.php?page='.($page+1).'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
?>
     
    </div>
      

  </section> <!--homesection ends here-->

  <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <h2>Employee leave</h2>
    <span class="close"><button type="button" class="btn btn-danger" id="close"><i class="fas fa-times"></i></button></span>
  </div>
  <div class="modal-body">
  <form action="../backend/emp_leave.php" method="post">
  <div class=" text-center mt-5 ">              
            
            </div>
    
        
        <div class="row ">
          
          <div class="col-lg-7 mx-auto">
            
           <div class ="card1">

           
                <div class = "container">
                                 <form action="../backend/emp_leave.php" method="post">
    
                
                                 <h3>Leave Information</h3>
                <div class="controls">
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_id">Employee ID <span style="color:#ff0000">*</span></label>
                                <input id="form_id" type="number" name="id" class="form-control" placeholder="Please enter unique employee ID *" required="required" >
                                
                            </div>
                        </div>
                        
                      
                           
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="form_need">Leave Reason<span style="color:#ff0000">*</span></label>
                                <select id="form_need" name="reason" class="form-control" required="required" >
                                <option value="" selected disabled>--Select a reason--</option>
                                    <option value ="AL">Annual Leave (AL)</option>
                                    <option value ="CL">Casual Leave (CL)</option>
                                    <option value ="SL">Sick Leave (SL)</option>
                                    <option value ="ML">Maternity Leave (ML)</option>
                                </select>   
                            </div>
                          </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_bank">Start date <span style="color:#ff0000">*</span></label>
                                <input class="datepicker" type="date" name="date"required="required">
                                
                            </div>
                            <div class="form-group">
                                <label for="form_bank">End date <span style="color:#ff0000">*</span></label>
                                <input class="datepicker" type="date" name="date2"required="required">
                                
                            </div>
                        </div>
                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need1">Approve Status<span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="status" class="form-control" required="required">
                                    <option value="" selected disabled>--Select--</option>
                                    
                                    <option value = "1"> Approved</option>
                                    <option value = "0"> Not Approved</option>
                                    <option value = "3"> Open</option>
                                  
                                   
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Remarks </label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Write a remark here (OPTIONAL)" rows="4"  ></textarea>
                                </div>
    
                            </div>
    
    
                        <div class="col-md-12">
                            
                            <button name ="submit" type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                " value="INSERT" >Submit</button>
                        
                       </div>
              
                      </div>
    
    
                    </div>
                  </form>
  </div>

</div>
             

            </div>
         </div>
          </div>
  </div>
  </div>
  
</div>

</div>
</form>
 

  <!-- javascript codes are here -->

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?> <!-- notification javascript code -->
        <script>
            swal({
  title: "<?php echo $_SESSION['status'];?>",             
  text: "<?php echo $_SESSION['cause']?>",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "OK",
}); </script>
<?php
}
unset($_SESSION['status']);
?>   
<!-- Modal Javascript starts here -->
<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("mybtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");
var close = document.getElementById("close");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}


close.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>
<!-- modal script ends here -->

<!--navbar javascript code-->
<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>

</html>