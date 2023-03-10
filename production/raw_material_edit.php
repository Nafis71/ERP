<?php
session_start();
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
$serial_no = $_GET['id'];
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
    <link rel="stylesheet" href="../css/add_order.css" rel='stylesheet'>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Edit Material Purchase Info</title>
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
          <li><a href="../hrm/emp_record.php">Employee Records</a></li>
          <li><a href="../hrm/emp_leave.php">Employee Leave</a></li>
          <li><a href="../hrm/attendance.php">Attendance</a></li>
          <li><a href="../hrm/manage_salary.php">Bonus/Deduct Salary</a></li>
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
          <li><a href="../finance/material_expense.php">Material Expense</a></li>
          <li><a href="../finance/machinery_expenses.php">Machinery Expense</a></li>
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
          <li><a href="add_order.php">Add Export Orders</a></li>
          <li><a href="machine_repair.php">Machine Repair</a></li>
          <li><a href="add_machine.php">Machinery Purchase</a></li>
          <li><a href="raw_materials.php">Material Purchase</a></li>
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
      <span class="text">Raw Material Purchase List Updation</span>
      
    </div>
    <div class = "sec-5">
    <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-12">
          <div class="form h-100">
            <h3>Purchase List Edit</h3>
            <form class="mb-5" method="POST" id="contactForm" name="contactForm" action="../backend/edit_raw_materialPurchase.php">
                              <?php
                                include 'connect.php';
                                mysqli_select_db($connect,'erp');
                                $sql = "SELECT *FROM raw_material_purchase where serial_no = '$serial_no'";
                                $run = mysqli_query($connect,$sql);
                                $fetch = mysqli_fetch_array($run);

                              ?>
              <div class="row">
                <input type="hidden" name ="serial" value ="<?php echo $serial_no ?>">
                <input type="hidden" name ="oldCost" value ="<?php echo $fetch['total_cost'] ?>">
                <input type="hidden" name ="oldDate" value ="<?php echo $fetch['purchase_date'] ?>">
              <div class="col-md-4 form-group mb-3">
                <label for="form_lastname">Material ID<span style="color:#ff0000">*</span></label>
                  <input type="number" class="form-control" name="id" id="unit"  placeholder="Enter Order Unit" value="<?php echo $fetch['material_id']?>"readonly required>
                </div>
                <div class="col-md-4 form-group mb-3">
                <label for="form_lastname">Material Name<span style="color:#ff0000">*</span></label>
                  <input type="text" class="form-control" name="name" id="unit"  placeholder="Enter Order Unit" value="<?php echo $fetch['material_name']?>" readonly required>
                </div>
                <div class="col-md-4 form-group mb-3">
                <label for="form_lastname">Total Unit<span style="color:#ff0000">*</span></label>
                  <input type="number" class="form-control" name="unit" id="unit"  placeholder="Enter Order Unit" value="<?php echo $fetch['quantity'] ?>" required>
                </div>             
              </div>
              <div class="row">
              <div class="col-md-4 form-group mb-3">
                <label for="form_lastname">Per Unit Cost<span style="color:#ff0000">*</span></label>
                  <input type="number" class="form-control" name="per_unit" id="unit"  placeholder="Enter Order Unit" value="<?php echo $fetch['unit_cost'] ?>" required>
                </div>
              <div class="col-md-2 form-group mb-5">
              <label for="form_lastname">Purchase Date<span style="color:#ff0000">*</span></label>
                 <input class = "datepicker"id="form_lastname" type="date" name="date" max = "<?php $year ?> required="required" value="<?php echo $fetch['purchase_date'] ?>" required>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" value="Update" name ="submit" class="btn btn-primary rounded-0 py-2 px-4">
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