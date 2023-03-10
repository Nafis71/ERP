<?php
session_start();
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
$getmonth = $_GET['month'];
$month = date("m", strtotime($getmonth));
$year = date("Y", strtotime($getmonth));
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
    <link rel="stylesheet" href="../css/salary_expense.css" rel='stylesheet'>
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Monthly Expenses</title>
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
          <li><a href="salary_expense.php">Salary Expense</a></li>
          <li><a href="material_expense.php">Material Expense</a></li>
          <li><a href="machinery_expenses.php">Machinery Expense</a></li>
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
          <li><a href="../production/raw_materialsadd_order.php">Add Export Orders</a></li>
          <li><a href="../production/raw_materialsmachine_repair.php">Machine Repair</a></li>
          <li><a href="../production/raw_materialsadd_machine.php">Machinery Purchase</a></li>
          <li><a href="../production/raw_materials.php">Machinery Purchase</a></li>
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
      <span class="text">Machinery Purchase Expense</span>
      
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
           
           $query1 = "SELECT *from machine_list NATURAL JOIN machine_buying_expense where month='$month' and year='$year'";
           $result = mysqli_query($connect,$query1);
        ?>
      <thead>
        <tr>
          <th class="head" colspan="7">
<?php echo'<span>Total Entries found '.mysqli_num_rows($result).' & Showing Page Number '.$page.'</span>';?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr>
          <form action="../finance/machinery_expense_search.php" method="GET">
          <th colspan="2" class="head1">               
           <input id="form_lastname" type="number" name="search" class="form-control" placeholder="Enter machine id *" required="required" >
          </th>
          <th colspan="1"class="head1">
              <input class="datepicker" type="month" name="month" min="2010-01"  value="<?php echo $year ?>-<?php echo $month ?>" required="required">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          <th colspan="2" class="head1">
          <form  method="GET" action="machinery_expense_custom.php">
          <input class="datepicker" type="month" name="month" min="2010-01" max="<?php echo $year ?>-<?php echo $month ?>" value="<?php echo $year ?>-<?php echo $month ?>" required="required">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-table"></i></button>
          </form>
          </th>
          <th colspan="2" class="head2" >
          <form  method="POST" action="../backend/machinery_purchase_expense_excel.php">
            <input type="hidden" name="month" value="<?php echo $month ?>">
            <input type="hidden" name="year" value="<?php echo $year ?>">
            <?php  $total_expense=0; ?>
          <input type="hidden" name="total_expense" value="<?php echo $total_expense;?>">
          <button class="btn btn-success" type="submit" name ="submit"><i class="fa-solid fa-file-excel"></i>&nbsp;Export Excel</button>&nbsp; 
          </form>
        </th>
           
        </tr>     
      </thead>
    <thead>
        <tr>
            <th>Machine&nbsp;ID</th>
            <th>Machine&nbsp;Name</th>
            <th>Machine&nbsp;Catagory</th>
            <th>Buying&nbsp;Quantity</th>
            <th>Unit&nbsp;price</th>
            <th>Buying&nbsp;Cost</th>
            <th>Purchase&nbsp;Date</th>  
        </tr>
    </thead>
    <tbody>
          
          <?php
          mysqli_select_db($connect,'erp');
           $query  = "SELECT *from machine_list NATURAL JOIN machine_buying_expense where month='$month' and year='$year' LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           $total_expense=0;
           while($fetch = mysqli_fetch_array($run))
           {
           
           ?>
        <tr>
            <td><?php echo $fetch['machine_id']?></td>
            <td><?php echo $fetch['machine_name']?></td>
            <td><?php echo $fetch['machine_catagory']?></td>
            <td><?php echo $fetch['quantity']?></td>
            <td><?php echo $fetch['unit_price']?> &#2547;</td>
            <td><?php echo $fetch['cost']?> &#2547;</td>
            <td><?php echo $fetch['buying_date']?></td>
           </tr>
            <?php $total_expense =  $total_expense + $fetch['cost']?>
           <?php
           }
           ?> 
           <thead><th>Machine&nbsp;ID</th>
            <th>Machine&nbsp;Name</th>
            <th>Machine&nbsp;Catagory</th>
            <th>Buying&nbsp;Quantity</th>
            <th>Unit&nbsp;price</th>
            <th>Buying&nbsp;Cost</th>
            <th>Purchase&nbsp;Date</th>  
           <thead><th colspan="7">Total Machinery Purchase Expense For This month :&nbsp;<?php echo $total_expense  ?> &#2547; </th></thead>
           
    </tbody>
</table>
</form>
<?php
$query1 = "SELECT *from machine_list NATURAL JOIN machine_buying_expense where month='$month' and year='$year'";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../finance/machinery_expense.php?page='.($page-1).'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="../finance/machinery_expense.php?page='.$i.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../finance/machinery_expense.php?page='.($page+1).'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
?>
   
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
var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn = document.getElementById("mybtn");
var btn2 = document.getElementById("mybtn2");
var close = document.getElementById("close");
var close2 = document.getElementById("close2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}
btn2.onclick = function() {
  modal2.style.display = "block";
}

close.onclick = function() {
  modal.style.display = "none";
}
close2.onclick = function() {
  modal2.style.display = "none";
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
  if (event.target == modal2) {
    modal2.style.display = "none";
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