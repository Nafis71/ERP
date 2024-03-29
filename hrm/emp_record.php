<?php
session_start();
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
include 'connect.php';
mysqli_select_db($connect,'erp');
$select = "SELECT *from login where emp_id = '$id'";
$run =mysqli_query($connect,$select);
$fetch=mysqli_fetch_array($run);
$level = $fetch['level'];
if($level ==3 || $level == 2)
{
  header('location:../backend/redirect_searcherror.php?indicate=14');
}
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
    <link rel="stylesheet" href="../css/emp_record.css" rel='stylesheet'>
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Employee Record</title>
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
        <?php if ($level==1 || $level == 4)
          {?>
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">HRM Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
          <?php }?>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">HRM Panel</a></li>
          <li><a href="../hrm/emp_record.php">Employee Records</a></li>
          <li><a href="../hrm/emp_leave.php">Employee Leave</a></li>
          <li><a href="../hrm/attendance.php">Attendance</a></li>
          <li><a href="../hrm/manage_salary.php">Bonus/Deduct Salary</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
        <?php if ($level==2 || $level == 4)
          {?>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Finance Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
          <?php }?>
        </div>
        <ul class="sub-menu">
        <li><a class="link_name" href="#">Finance Panel</a></li>
          <li><a href="../finance/salary_expense.php">Salary Expense</a></li>
          <li><a href="../finance/material_expense.php">Material Expense</a></li>
          <li><a href="../finance/machinery_expenses.php">Machinery Expense</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
        <?php if ($level==3 || $level == 4)
          {?>
          <a href="#">
          <i class='bx bx-package' ></i>
            <span class="link_name">Production Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
          <?php }?>
        </div>
        <ul class="sub-menu">
        <li><a class="link_name" href="#">Production Panel</a></li>
          <li><a href="add_order.php">Add Export Orders</a></li>
          <li><a href="machine_repair.php">Machine Repair</a></li>
          <li><a href="add_machine.php">Machinery Purchase</a></li>
          <li><a href="raw_materials.php">Material Purchase</a></li>
        </ul>
      </li>
      <li>
        <?php if($level == 4 )
        {?>
        <a href="../user.php">
        <i class="fa-solid fa-user-plus"></i>
          <span  class="link_name">Add ERP Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../user.php">Add ERP Account</a></li>
        </ul>
        <?php  } ?>
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
      <span class="text">Employee Records</span>
      
    </div>
    <div class = "sec-1">
     
     <table class="styled-table">
    <?php
           include 'connect.php';
           mysqli_select_db($connect,'erp');
           $limit = 13;
           
           if(isset($_GET['page']))
           {
            $page = $_GET['page'];
           }
           else
           {
            $page =1;
           }
           $offset = ($page-1) * $limit;
           $query1 = "select * from employee";
           $result = mysqli_query($connect,$query1);
           ?>
      <thead>
        <tr>
          <th class="head" colspan="12">
<?php echo'<span>Total Entries found '.mysqli_num_rows($result).' & Showing Page Number '.$page.'</span>';?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr>
          <form action="../hrm/emp_search.php" method="GET">
          <th colspan="3" class="head1">
           <input id="form_lastname" type="number" name="search" class="form-control" placeholder="Enter employee id *" required="required" >
          </th>
          <th colspan="4"class="head1">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          <form  method="POST" action="../backend/emp_excel_record.php">
          <th colspan="3" class="head1" >
          <button class="btn btn-warning" type="submit" name ="submit"><i class="fa-solid fa-file-excel"></i>&nbsp;Export Excel</button>
          
          </form>
          
          &nbsp;&nbsp;&nbsp;<a class="btn btn-light" href="../hrm/emp_record.php#sec-2"><i class="fa-solid fa-plus"></i>Add Employee</a>
          </th>
          <th colspan ="2" class="head1">
          <form action="../backend/delete.php" method="POST">
          <button class="btn btn-danger" type="submit" name ="submit"  ><i class="fa fa-solid fa-trash-can"></i>&nbsp;Delete</button>
          </th>
          
          
        </tr>
        
         
           
         
      </thead>
    <thead>
        <tr>
            <th>#</th>
            <th>Employee&nbsp;ID</th>
            <th>Employee Name&nbsp;&nbsp;</th>
            <th>Designation&nbsp;&nbsp;</th>
            <th>Address&nbsp;</th>
            <th>&nbsp;Phone No&nbsp;</th>
            <th>&nbsp;Bank AC Num&nbsp;</th>
            <th>Gender&nbsp;&nbsp;</th>
            <th>Join date&nbsp;&nbsp;</th>
            <th>Salary&nbsp;&nbsp;</th>
            <th>&nbsp;On leave</th>
            <th>Action&nbsp;</th>
           
        </tr>
    </thead>
    <tbody>
          <!-- php code for generating the employee list in the table-->
          <?php
          mysqli_select_db($connect,'erp');
           $query  = "select *from employee natural join salary ORDER BY emp_id desc LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           while($fetch = mysqli_fetch_array($run))
           {
           ?>
        <tr>
            <td><input type="checkbox" name=check[] value="<?php  echo $fetch['emp_id']; ?>"> </td>
            <td><?php echo $fetch['emp_id']?></td>
            <td><?php echo $fetch['name']?></td>
            <td><?php echo $fetch['designation']?></td>
            <td><?php echo $fetch['address']?></td>
            <td>0<?php echo $fetch['emp_phone']?></td>
            <td><?php echo $fetch['bank']?></td>
            <td><?php echo $fetch['gender']?></td>
            <!-- php code for extracting month date and year individually from mysql-->
            <?php 
            $date = $fetch['join_date'];
            $month = date('F', strtotime($date));
            $day = date('d',strtotime($date));
            $year =date('Y',strtotime($date));
            ?>
            <td><?php echo $day,',', $month ,',', $year ?></td></td>
            <td><?php echo $fetch['salary']?> &#2547;</td>
            <?php
             if($fetch['on_leave'] == 0)
             {
             echo '<td>No</td>';
            }else 
            echo '<td>Yes</td>'; 
            ?>
            <?php echo '<td> <a class = "btn btn-secondary" href="../hrm/emp_edit.php?id='.$fetch['emp_id'].'">';?><i class="fa-solid fa-user-pen"></i>&nbsp;Edit</a></td>          
        </tr><?php
           }
           ?> 
    </tbody>
</table>
</form>
<?php
$query1 = "select * from employee";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../hrm/emp_record.php?page='.($page-1).'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="../hrm/emp_record.php?page='.$i.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../hrm/emp_record.php?page='.($page+1).'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
?>

     
    </div>
     
    <hr>
<div id="sec-2" class ="sec-2">  <!-- This is the add employee section -->

<div class=" text-center mt-5 ">              
            
            </div>
    
        
        <div class="row ">
          
          <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
           
                <div class = "container">
                                 <form action="../backend/add_emp.php" method="post">
    
                
                                 <h3>Add Employee</h3>
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
                                <label for="form_lastname">Name <span style="color:#ff0000">*</span></label>
                                <input id="form_lastname" type="text" name="name" class="form-control" placeholder="Please enter employee name *" required="required" >
                                                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_address">Address <span style="color:#ff0000">*</span></label>
                                <input id="form_address" type="text" name="address" class="form-control" placeholder="Please enter address *" required="required" >
                                                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_phone">Phone Number <span style="color:#ff0000">*</span></label>
                                <input id="form_phone"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="phone" maxlength = "11" name="phone" class="form-control" placeholder="Please enter your lastname *" required="required">
                                                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" required>
                            <label class="form-check-label" for="flexRadioDefault1" >Male <span style="color:#ff0000">*</span></label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2"value="Female"required>
                            <label class="form-check-label" for="flexRadioDefault2" >
                              Female <span style="color:#ff0000">*</span>
                            </label>
                          </div>    
                             </div>
                        </div>
                           
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="form_need">Please specify designation <span style="color:#ff0000">*</span></label>
                                <select id="form_need" name="designation" class="form-control" required="required" >
                                <option value="" selected disabled>--Select a designation--</option>
                                <!-- php code for generating the designation list-->
                                <?php
                            $query2 = "select *from designation";
                            $run2 = mysqli_query($connect,$query2);
                            while($fetch2 = mysqli_fetch_assoc($run2))
                            {
                            ?>
                                    <option value ="<?php echo $fetch2['name'] ?>"><?php echo $fetch2['name']?></option>
                                    <?php
                            }
                            ?>
                                </select>   
                            </div>
                          </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_bank">Bank Account <span style="color:#ff0000">*</span></label>
                                <input id="form_bank" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " type="number" maxlength="9" name="bank" class="form-control" placeholder="Please enter the account Number *" required="required" data-error="Valid email is required.">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need1">Please specify salary <span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="salary" class="form-control" required="required">
                                    <option value="" selected disabled>--Select Salary--</option>
                                    <!-- php code for generating the salary list-->
                                    <?php
                                     $query3 ="select *from salary_list ";
                                     $run3 = mysqli_query($connect,$query3);    
                                     while($fetch4 = mysqli_fetch_assoc($run3))
                                     {
                                    ?>
                                    <option value = " <?php echo $fetch4['amount'] ?> "> <?php echo $fetch4['designation'] ?> -> <?php echo $fetch4['amount']?> &#2547;</option>
                                  
                                    <?php 
                                    }
                                    ?>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Remarks</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Write a remark here (OPTIONAL)" rows="4"  ></textarea>
                                </div>
    
                            </div>
    
    
                        <div class="col-md-12">
                            
                            <button name ="submit" type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                " value="INSERT" ><i class="fas fa-cloud-upload-alt"></i>&nbsp;Submit</button>
                        
                       </div>
              
                      </div>
    
    
                    </div>
                  </form>
               </div>
             </div>

            </div>
         </div>
        </div>
        <footer>
<div class="bg-light py-4">
      <div class="container text-center">        <!--this is the footer -->
        <?php $date = date("Y");
        $year =date('Y',strtotime($date));?>
        <p class="text-muted mb-0 py-2">© <?php echo $year ?> Bando Eco Apparels Ltd All Rights Reserved.</p>
      </div>
    </div>
</footer>

  </section> <!--homesection ends here-->


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