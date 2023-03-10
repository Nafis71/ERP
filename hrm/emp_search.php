<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['id']))
{
   header('location:../index.php');
}
$id = $_SESSION['id'];
$search =$_GET['search'];
mysqli_select_db($connect,'erp');
$sql = "select *from employee natural join salary where emp_id ='$search'";
$run =mysqli_query($connect,$sql);
if(mysqli_num_rows($run) == 0)
{
  header('location:../backend/redirect_searcherror.php?indicate=1');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41129fd756.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/emp_record.css" rel='stylesheet'>
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
  
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
          <li><a href="../production/add_order.php">Add Export Orders</a></li>
          <li><a href="../production/machine_repair.php">Machine Repair</a></li>
          <li><a href="../production/add_machine.php">Machinery Purchase</a></li>
          <li><a href="../production/raw_materials.php">Material Purchase</a></li>
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
  

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Employee Records</span>
      
    </div>
    <div class = "sec-1">
     <div class ="card">
     <table class="styled-table">
    <?php
    $search = $_GET['search'];
           include 'connect.php';
           mysqli_select_db($connect,'erp');
           $limit = 10;
           if(isset($_GET['page']))
           {
            $page = $_GET['page'];
           }
           else
           {
            $page =1;
           }
           $offset = ($page-1) * $limit;
           $query1 = "select *from employee where emp_id ='$search'";
           $result = mysqli_query($connect,$query1);
           ?>
      <thead>
        <tr>
          <th class="head" colspan="13">
<?php echo'<span>Total Entries found '.mysqli_num_rows($result).' & Showing Page Number '.$page.'</span>';?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr>
          <form action="../hrm/emp_search.php" method= "GET">
          <th colspan="2" class="head1">
           <input id="form_lastname" type="text" name="search" class="form-control" placeholder="Enter employee name/id *" required="required" >
          </th>
          <th colspan="7"class="head1">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          
          <th colspan="2" class="head1" >
          <a class="btn btn-light" href="../hrm/emp_record.php#sec-2"><i class="fa-solid fa-plus"></i>Add Employee</a>
          </th>
          <th colspan ="2" class="head1">
          <form action="../backend/delete.php" method="POST">
           <button class="btn btn-danger" type="submit" name ="submit"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete Selected</button>
          </th>
          
          
        </tr>
        
         
           
         
      </thead>
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID&nbsp;</th>
            <th>Employee Name&nbsp;&nbsp;</th>
            <th>Designation&nbsp;&nbsp;</th>
            <th>Address&nbsp;</th>
            <th>&nbsp;Phone No&nbsp;</th>
            <th>&nbsp;Bank AC Num&nbsp;</th>
            <th>Gender&nbsp;&nbsp;</th>
            <th>Join date&nbsp;&nbsp;</th>
            <th>Salary&nbsp;&nbsp;</th>
            <th>Present Status&nbsp;</th>
            <th>&nbsp;On leave</th>
            <th>Action&nbsp;</th>
           
        </tr>
    </thead>
    <tbody>
          <?php
           mysqli_select_db($connect,'erp');
           $query  = "select *from employee natural join salary where emp_id ='$search'  LIMIT {$offset},{$limit}";
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
            <?php 
            $date = $fetch['join_date'];
            $month = date('F', strtotime($date));
            $day = date('d',strtotime($date));
            $year =date('Y',strtotime($date));
            ?>
            <td><?php echo $day,',', $month ,',', $year ?></td></td>
            <td><?php echo $fetch['salary']?> &#2547;</td>
            <?php
             if($fetch['present_status'] == 0)
             {
            echo '<td>A</td>';
             }
             else
            echo '<td>P</td>';
            ?>
            <?php
             if($fetch['on_leave'] == 0)
             {
             echo '<td>No</td>';
            }else 
            echo '<td>Yes</td>'; 
            ?>
            
            <?php echo '<td> <a class = "btn btn-secondary"  href="../hrm/emp_edit.php?id='.$fetch['emp_id'].'">';?><i class="fa-solid fa-user-pen"></i>&nbsp;Edit</a></td>
            
        </tr><?php
           }
           ?> 
    </tbody>
</table>
</form>
<?php
$query1 = "select * from employee where emp_id ='$search'";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../hrm/emp_search.php?page='.($page-1).'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="../hrm/emp_search.php?page='.$i.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../hrm/emp_search.php?page='.($page+1).'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
?>

     </div>
    <hr>

</div>
<footer>
<div class="bg-light py-4">
      <div class="container text-center">
        <?php $date = date("Y");
        $year =date('Y',strtotime($date));?>
        <p class="text-muted mb-0 py-2">© <?php echo $year ?> Bando Eco Apparels Ltd All Rights Reserved.</p>
      </div>
    </div>
</footer>
  </section>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?>
        <script>
            swal({
  title: "<?php echo $_SESSION['status'];?>",
  text: "",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "OK",
}); </script>
<?php
}
unset($_SESSION['status']);
?>   

  <script>
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
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