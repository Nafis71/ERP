<?php
session_start();
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
$search = $_GET['search'];
include 'connect.php';
mysqli_select_db($connect,'erp');
$sql = "SELECT *from export_order where product_id ='$search' OR order_no ='$search'";
$run =mysqli_query($connect,$sql);
if(mysqli_num_rows($run) == 0)
{
  header('location:../backend/redirect_searcherror.php?indicate=11');
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
    <link rel="stylesheet" href="../css/add_order.css" rel='stylesheet'>
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Add Export Order</title>
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
      <span class="text">Export Order list</span>
      
    </div>
    <div class = "sec-1">
     <div class ="card">
        <div class="form">
     <div class="row-col-lg-12">
          
          
              
                <div class = "container">
                                 <form action="../backend/add_export_order.php" method="post">                  
                                 <h3>Add&nbsp;order</h3>
                                 <hr>
                <div class="controls">
    
                    <div class="row">
                    <div class="col-md-2">
                            <div class="form-group">
                                <label for="form_need1">Select Product<span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="product" class="form-control" required="required">
                                    <option value="">--Select Catagory--</option>
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
                                    <option value="">--Select one--</option>
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
                                    <option value="">--Select one--</option>
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
                                <input id="form_lastname" type="text" name="unit" class="form-control" placeholder="Enter total order unit"  required="required" >
                                                                </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="form_lastname">Delivery Date<span style="color:#ff0000">*</span></label>
                                <input class = "datepicker"id="form_lastname" type="date" name="date" required="required" >
                                                                </div>
                        </div>
                        
                             <div class="col-md-3">
                             <button name ="submit" type="submit" class="btn btn-success
                                ">Submit</button>
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
  <div class = "sec-2">
    
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
           $query1 = "SELECT *from export_order Where product_id ='$search' OR order_no ='$search'";
           $result = mysqli_query($connect,$query1);
        ?>
      <thead>
        <tr>
          <th class="head" colspan="15">
<?php echo'<span>Total Entries found '.mysqli_num_rows($result).' & Showing Page Number '.$page.'</span>';?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr>
          <form action="../production/add_order_search.php" method="GET">
          <th colspan="5" class="head1">               
           <input id="form_lastname" type="number" name="search" class="form-control" placeholder="Enter product id/ Order no" required="required" >
          </th>
          <th colspan="4"class="head1">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          <form  method="POST" action="../backend/machinery_purchase_excel.php">
          <th colspan="4" class="head2" >
          <button class="btn btn-success" type="submit" name ="submit"><i class="fa-solid fa-file-excel"></i>&nbsp;Export Excel</button>&nbsp; 
          </form>
          </th>
          <th colspan ="2" class="head2">
          <form action="../backend/add_export_order_delete.php" method="POST">
          <button class="btn btn-danger" type="submit" name ="submit"><i class="fa fa-solid fa-trash-can"></i>&nbsp;Delete</button>
          </th>         
        </tr>     
      </thead>
    <thead>
        <tr>
        <th>#</th>
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
            <th>Remaining&nbsp;Days</th>
            <th>Delivery&nbsp;Status</th>
            <th>Edit&nbsp;Info</th>
        </tr>
    </thead>
    <tbody>
          
          <?php
          mysqli_select_db($connect,'erp');
           $query  = "SELECT *from export_order Where product_id ='$search' OR order_no ='$search' ORDER BY order_no desc LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           $total_cost=0;
           while($fetch = mysqli_fetch_array($run))
           {
           
           ?>
        <tr>
        <td><input type="checkbox" name=check[] value="<?php  echo $fetch['order_no']; ?>"></td>
            <td><?php echo $fetch['order_no']?></td>  
            <td><?php echo $fetch['product_id']?></td>
            <td><?php echo $fetch['product_name']?></td>
            <td><?php echo $fetch['company_name']?></td>
            <td><?php echo $fetch['delivery_to']?></td>
            <td><?php echo $fetch['total_unit']?></td>
            <td><?php echo $fetch['per_unit_cost']?> &#2547;</td>
            <td><?php echo $fetch['total_cost'] ?> &#2547;</td>
            <td style="color:green">Pre-Payment</td>
            <td style="color:green">Paid</td>
            <td><?php echo $fetch['delivery_time']?></td>
            <?php
            mysqli_select_db($connect,'erp');
            $productId = $fetch['product_id'];
            $companyName = $fetch['company_name'];
            $query2  = "SELECT datediff(delivery_time,NOW()) as dateDifference from export_order where product_id = '$productId' and company_name ='$companyName'";
            $run2 = mysqli_query($connect,$query2);
            $fetch2 = mysqli_fetch_array($run2);
           ?>
           <td><?php echo $fetch2['dateDifference']?></td>
           <?php
           if($fetch['status']==0)
           {
             ?> <td style="Color:grey">Not Delivered Yet</td>
             <?php
           }
           else
           {
            ?> <td style="Color:Green">Delivered</td>
            <?php
           }
           ?>
           <?php echo '<td> <a class = "btn btn-secondary" href="../production/export_order_edit.php?id='.$fetch['order_no'].'">';?><i class="fa-solid fa-pen"></i>&nbsp;Edit</a></td>
        </tr>

           <?php
           }
           ?> 
           <thead>
           <th>#</th>
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
            <th>Remaining&nbsp;Days</th>
            <th>Delivery&nbsp;Status</th>
            <th>Edit&nbsp;Info</th>
            </thead>
           
    </tbody>
</table>
</form>
<?php
$query1 = "SELECT *from export_order Where product_id ='$search' OR order_no ='$search'";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../production/add_order_search.php?page='.($page-1).'&search='.$search.'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="../production/add_order_search.php?page='.$i.'&search='.$search.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../production/add_order_search.php?page='.($page+1).'&search='.$search.'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
?>
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