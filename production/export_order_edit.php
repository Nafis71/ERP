<?php
session_start();
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
$order_no = $_GET['id'];
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
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Edit Export Order</title>
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
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
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
          <li><a href="#">Box Icons</a></li>
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
      <span class="text">Export Order List Updation</span>
      
    </div>
    <div class = "sec-1">
     <div class ="card">
        <div class="form">
     <div class="row-col-lg-12">
              
                <div class = "container">
                        <form action="../backend/edit_export_order.php" method="post">                  
                         <h3>Edit&nbsp;order</h3>
                            <hr>
                <div class="controls">
    
                    <div class="row">
                    <div class="col-md-2">
                            <div class="form-group">
                             <?php
                                include 'connect.php';
                                mysqli_select_db($connect,'erp');
                                $sql = "SELECT *FROM export_order where order_no = '$order_no'";
                                $run = mysqli_query($connect,$sql);
                                $fetch2 = mysqli_fetch_array($run);
                             ?>
                             <input type="hidden" name="orderno" value="<?php echo $order_no ?>">
                                <label for="form_need1">Select Product<span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="product" class="form-control" required="required">
                                    <option value="<?php echo $fetch2['product_name'] ?>"><?php echo $fetch2['product_name'] ?></option>
                                    <?php $sql = "SELECT product_name FROM product_info";
                                          $run = mysqli_query($connect,$sql);
                                          while($fetch = mysqli_fetch_array($run))
                                          { ?>
                                            <option value="<?php echo $fetch['product_name']?>"><?php echo $fetch['product_name']?></option>
                                            <?php
                                          }
                                    ?>
                                </select>
                                
                            </div>
                           
                             </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="companyname">Select Company<span style="color:#ff0000">*</span></label>
                                <select id="companyname"  name="company" class="form-control" required="required">
                                    <option value="<?php echo $fetch2['company_name'] ?>"><?php echo $fetch2['company_name'] ?></option>
                                    <?php $sql = "SELECT DISTINCT company_name FROM company_list";
                                          $run = mysqli_query($connect,$sql);
                                          while($fetch = mysqli_fetch_array($run))
                                          { ?>
                                            <option value="<?php echo $fetch['company_name']?>"><?php echo $fetch['company_name']?></option>
                                            <?php
                                          }
                                    ?>
                                </select>
                                
                            </div>
                           
                             </div>
                             <div class="col-md-2">
                            <div class="form-group">
                                <label for="country">Select Country<span style="color:#ff0000">*</span></label>
                                <select id="country"  name="country" class="form-control" required="required">
                                    <option value="<?php echo $fetch2['delivery_to'] ?>"><?php echo $fetch2['delivery_to'] ?></option>
                                    <?php $sql = "SELECT DISTINCT company_origin FROM company_list";
                                          $run = mysqli_query($connect,$sql);
                                          while($fetch = mysqli_fetch_array($run))
                                          { ?>
                                            <option value="<?php echo $fetch['company_origin']?>"><?php echo $fetch['company_origin']?></option>
                                            <?php
                                          }
                                    ?>
                                </select>
                                
                            </div>
                           
                             </div>
                             <div class="col-md-2">
                            <div class="form-group">
                                <label for="form_lastname">Order Unit<span style="color:#ff0000">*</span></label>
                                <input id="form_lastname" type="text" name="unit" class="form-control" placeholder="Enter total order unit"  required="required" value="<?php echo $fetch2['total_unit'] ?>" >
                                                                </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="form_lastname">Delivery Date<span style="color:#ff0000">*</span></label>
                                <input class = "datepicker"id="form_lastname" type="date" name="date" required="required" value="<?php echo $fetch2['delivery_time'] ?>" >
                                                                </div>
                        </div>
                        
                             <div class="col-md-3">
                             <button name ="submit" type="submit" class="btn btn-success
                                ">Update</button>
                        </div>           
                        </div>
                    </div>
                    <hr>
                        <div class="col-md-4">
                          <label style="color:#ff0000">Please check again all the info before proceeding!</label>
                       </div>
                    </div>
                  </form>
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