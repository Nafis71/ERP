<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
$search =$_GET['search'];
$get_date =$_GET['date'];
$year =date("Y",strtotime($get_date));
$month =date("m",strtotime($get_date));
if(isset($_GET['month']) && isset($_GET['year']))
{
    $year = $_GET['year'];
    $month = $_GET['month'];
}
mysqli_select_db($connect,'erp');
$sql = "SELECT *from machine_repair where machine_id ='$search' and MONTH(date) ='$month' and YEAR(date) ='$year'";
$run =mysqli_query($connect,$sql);
if(mysqli_num_rows($run) == 0)
{
  header('location:../backend/redirect_searcherror.php?indicate=9');
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
    <link rel="stylesheet" href="../css/machine_repair.css" rel='stylesheet'>
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
          <li><a href="raw_materials.php">Machinery Purchase</a></li>
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
      <span class="text">Machine Repair & Maintenance</span>
      
    </div>
    <div class = "sec-1">
     <div class ="card">
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
           $query1 = "SELECT *from machine_repair where machine_id ='$search' and MONTH(date) ='$month' and YEAR(date) ='$year'";
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
          <form action="machine_repair_search.php" method="GET">
          <th colspan="3" class="head1">               
           <input id="form_lastname" type="number" name="search" class="form-control" placeholder="Enter Machine id *" required="required" >
          </th>
          <th colspan="2"class="head1">
          <input class="datepicker" type="month" name="month" min="2010-01" required="required">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          <form  method="POST" action="../backend/salary_expense_excel_record.php">
          <th colspan="1" class="head2" >
          <button class="btn btn-success" type="submit" name ="submit"><i class="fa-solid fa-file-excel"></i>&nbsp;Export Excel</button>&nbsp; 
          </form>
          <button class="btn btn-light" id="mybtn"><i class="fa-solid fa-plus"></i>&nbsp;Add</button>
          </th>
          <th colspan ="1" class="head2">
          <form action="../backend/delete_attendance.php" method="POST">
          <button class="btn btn-danger" type="submit" name ="submit"><i class="fa fa-solid fa-trash-can"></i>&nbsp;Delete</button>
          </th>         
        </tr>     
      </thead>
    <thead>
        <tr>
            <th>#</th>
            <th>Machine&nbsp;ID</th>
            <th>Machine&nbsp;Name</th>
            <th>Machine&nbsp;Function</th>
            <th>Working&nbsp;Status</th>
            <th>Repair&nbsp;Cost</th>
            <th>Issue&nbsp;date</th>
        </tr>
    </thead>
    <tbody>
          
          <?php
          mysqli_select_db($connect,'erp');
           $query  = "SELECT *from machine_repair where machine_id ='$search' and MONTH(date) ='$month' and YEAR(date) ='$year' LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           
           while($fetch = mysqli_fetch_array($run))
           {
           
           ?>
        <tr>
        <td><input type="checkbox" name=check[] value="<?php  echo $fetch['machine_id']; ?>"> </td>
            <td><?php echo $fetch['machine_id']?></td>
            <td><?php echo $fetch['machine_name']?></td>
            <td><?php echo $fetch['machine_function']?></td>
            <?php
                 if($fetch['working_status']==0)
                 {
                    echo'<td>Need Repairs</td>';
                 }
                 else
                 {
                    echo'<td>Repaired</td>';
                 }
            ?>
            <td><?php echo $fetch['cost']?> &#2547;</td>
            <td><?php echo $fetch['date']?></td>
        </tr>

           <?php
           }
           ?> 
           <thead>
           <th>#</th>
           <th>Machine&nbsp;ID</th>
            <th>Machine&nbsp;Name</th>
            <th>Machine&nbsp;Function</th>
            <th>Working&nbsp;Status</th>
            <th>Repair&nbsp;Cost</th>
            <th>Issue&nbsp;date</th></thead>
           
    </tbody>
</table>
</form>
<?php
$query1 = "SELECT *from machine_repair where machine_id ='$search' and MONTH(date) ='$month' and YEAR(date) ='$year'";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../production/machine_repair_search.php?page='.($page-1).'&search='.$search.'&month='.$month.'&year='.$year.'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="../production/machine_repair_search.php?page='.$i.'&search='.$search.'&month='.$month.'&year='.$year.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../production/machine_repair_search.php?page='.($page+1).'&search='.$search.'&month='.$month.'&year='.$year.'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
?>
     </div>
    </div>
      

  </section> <!--homesection ends here-->
  <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header"> 
    <h3>Machine Info</h3>
    <span class="close"><button type="button" class="btn btn-danger" id="close"><i class="fas fa-times"></i></button></span>
  </div>
  <div class="modal-body">
  
  <div class="row ">
  <form action="../backend/add_machine_repair.php" method="POST">
          <div class="col-lg-7 mx-auto">
             <div class="row">
             <h3>Add&nbsp;Broken&nbsp;Machine&nbsp;info</h3>
             <hr>
             <br>
             <div class="row">
             <div class="col-md-6">
             <div class="form-group">
                                <label for="form_id">Enter Machine ID<span style="color:#ff0000">*</span></label>
                                <input id="form_id" type="text" name="id" class="form-control" placeholder="Machine ID"required="required" >
                                
                            </div> 
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="form_id">Repair Cost<span style="color:#ff0000">*</span></label>
                        <input id="form_id" type="text" name="cost" class="form-control" placeholder="Repair Cost" required="required" >
                                
                        </div>       
                        </div>
    
                            </div>
                        </div>
                      <br>
                        <hr>
                        <div class="col-md-12">
                        
                            <button name ="submit" type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                "  >Submit</button>
                                
                       </div>
                       </form>
                       
                    </div>
             </div>
</div>
          </div>
  </div>
  <!-- javascript codes are here -->
</section>

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