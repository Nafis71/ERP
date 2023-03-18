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
if($level != 4)
{
  header('location:backend/redirect_searcherror.php?indicate=14');
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
    <link rel="stylesheet" href="css/user.css" rel='stylesheet'>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Edit Material Purchase Info</title>
</head>
<body>
<!--sidebar starts here-->
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Bando&nbsp;ERP</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="dashboard.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
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
          <i class='bx bxs-chevron-down arrow'></i>
          <?php }?>
        </div>
        <ul class="sub-menu">
        <li><a class="link_name" href="#">HRM Panel</a></li>
          <li><a href="hrm/emp_record.php">Employee Records</a></li>
          <li><a href="hrm/emp_leave.php">Employee Leave</a></li>
          <li><a href="hrm/attendance.php">Attendance</a></li>
          <li><a href="hrm/manage_salary.php">Bonus/Deduct Salary</a></li>
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
          <li><a href="finance/salary_expense.php">Salary Expense</a></li>
          <li><a href="finance/material_expense.php">Material Expense</a></li>
          <li><a href="finance/machinery_expenses.php">Machinery Expense</a></li>
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
          <li><a href="production/add_order.php">Add Export Orders</a></li>
          <li><a href="production/machine_repair.php">Machine Repair</a></li>
          <li><a href="production/add_machine.php">Machinery Purchase</a></li>
          <li><a href="production/raw_materials.php">Material Purchase</a></li>
        </ul>
      </li>
      <li>
      <?php if ($level == 4)
          {?>
        <a href="user.php">
        <i class="fa-solid fa-user-plus"></i>
          <span  class="link_name">Add ERP Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="user.php">Add ERP Account</a></li>
        </ul>
        <?php }?>
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
      <div class="iocn-link">
          <a href="#">
          <i class='bx bx-cog' ></i>
            <span class="link_name">Settings</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Settings</a></li>
          <li><a href="#">Add ERP Account</a></li>
          
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
      <i class='bx bx-log-out' onclick="window.location.href='backend/logout.php'"></i>
    </div>
  </li>
</ul>
  </div>
  <!-- sidebar ends here-->

 <!--homesection or main body starts here -->

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">User Creation For Login</span>
      
    </div>
    <div class = "sec-5">
    <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-12">
          <div class="form h-100">
            <h3>User Creation</h3>
            <form class="mb-5" method="POST" id="contactForm" name="contactForm" action="backend/registration.php">
              <div class="row">    
                <div class="col-md-3 form-group mb-3">
                
                  <input type="number" class="form-control" name="id" id="id"  placeholder="Enter Employee ID " required>
                </div>
                <div class="col-md-3 form-group mb-3">
                
                <input type="number" class="form-control" name="password" id="password"  placeholder="Enter Password " required>
              </div>
                <div class="col-md-4 form-group mb-3">
                <label for="country">Select Designation<span style="color:#ff0000">*</span></label>
                  <select class="custom-select" id="country" name="level" required>
                  <option value="">Select One</option>
                    <option value="1">(HRM)</option>
                    <option value="2">(Finance Officer)</option>
                    <option value="3">(Production Head)</option>
                  </select>
                </div>   
                <div class="col-md-2 form-group">
                  <input type="submit" value="INSERT" name ="submit" class="btn btn-primary rounded-0 py-2 px-4">
                </div>
                
              </div>
              <br>
              <br>
              <hr>
              <div class="row">
                <div class="col-md-4 form-group">
                  <input type="button" value="EDIT USER" name ="submit" class="btn btn-primary rounded-0 py-2 px-4" onclick="window.location.href='../backend/logsout.php'">
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