<?php
session_start();
include 'connect.php';
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
if(!isset($_POST['search']))
{ $search1 = $_GET['search1'];
  
}
else
{
  $search1 = $_POST['search'];
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
    <link rel="stylesheet" href="../css/historybonus_deduct.css" rel='stylesheet'>
    <link rel="icon" href="../logo/Bando.png" type="image/x-icon">
    <title>History</title>
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
      <span class="text">Bonus/Deduct Salary</span>
      
    </div>
    <div class = "sec-1">
     <div class ="card">
     <table class="styled-table">
    <?php
    if(isset($_POST['search']))
         {
           $search = $_POST['search'];
           include 'connect.php';
           mysqli_select_db($connect,'erp');
           $limit = 5;
           
           if(isset($_GET['page']))
           {
            $page = $_GET['page'];
           }
           else
           {
            $page =1;
           }
           
           $offset = ($page-1) * $limit;
           $query1 = "SELECT *from bonus_deduct where emp_id='$search'";
           $result = mysqli_query($connect,$query1);
          }
          else
          {
           include 'connect.php';
           mysqli_select_db($connect,'erp');
           $limit = 5;
           
           if(isset($_GET['page']))
           {
            $page = $_GET['page'];
           }
           else
           {
            $page =1;
           }
           
           $offset = ($page-1) * $limit;
           $query1 = "SELECT *from bonus_deduct where emp_id='$search1'";
           $result = mysqli_query($connect,$query1);
          }
           ?>
      <thead>
        <tr>
          <th class="head" colspan="6">
<?php echo'<span>Total Entries found '.mysqli_num_rows($result).' & Showing Page Number '.$page.'</span>';?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr>
          <form action="../hrm/historybdSearch.php" method="POST">
          <th colspan="2" class="head1">
           <input id="form_lastname" type="number"  name="search" class="form-control" placeholder="Enter employee id *"  required="required" >
          </th>
          <th colspan="3"class="head1">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          <form  method="POST" action="../backend/bonus_deduct_excelsearch.php">
          <th colspan="1" class="head1" >
          <input type="hidden" name="id" value="<?php if(!isset($_POST['search'])){echo $search1;} else{echo $search;}?>">
          <button class="btn btn-success" type="submit" name ="submit"><i class="fa-solid fa-file-excel"></i>&nbsp;Export Excel</button>
          </th>
          </form>
        
         
          
        </tr>           
      </thead>
    <thead>
        <tr>
            
            <th>Employee ID&nbsp;</th>
            <th>Employee Name&nbsp;&nbsp;</th>
            <th>Designation&nbsp;&nbsp;</th>
            <th>Amount&nbsp;&nbsp;</th>
            <th>Remarks&nbsp;&nbsp;</th>
            <th>Date</th>
           
        </tr>
    </thead>
    <tbody>
          <!-- php code for generating the employee list in the table-->
          <?php
          if(isset($_POST['search']))
          {
            $search = $_POST['search'];
           mysqli_select_db($connect,'erp');
           $query  = "SELECT *from bonus_deduct where emp_id='$search' LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           $rows = mysqli_num_rows($run);
           if($rows ==0)
           {?>
            <script>confirm("NB: No data found!")</script>
            <?php
           }
           else
           {
           while($fetch = mysqli_fetch_array($run))
           {
           ?>
        <tr>
            
            <td><?php echo $fetch['emp_id']?></td>
            <td><?php echo $fetch['name']?></td>
            <td><?php echo $fetch['designation']?></td>
            <td><?php echo $fetch['amount']?> &#2547;</td>
            <td><?php echo $fetch['remark']?></td>
            <td><?php echo $fetch['date']?></td>
               
        </tr><?php
           }}}
           else
           {
            mysqli_select_db($connect,'erp');
            $query  = "SELECT *from bonus_deduct where emp_id='$search1' LIMIT {$offset},{$limit}";
            $run = mysqli_query($connect,$query);
            $rows = mysqli_num_rows($run);
            if($rows ==0)
            {?>
             <script>confirm("NB: No data found!")</script>
             <?php
            }
            else
            {
            while($fetch = mysqli_fetch_array($run))
            {
            ?>
         <tr>
             
             <td><?php echo $fetch['emp_id']?></td>
             <td><?php echo $fetch['name']?></td>
             <td><?php echo $fetch['designation']?></td>
             <td><?php echo $fetch['amount']?> &#2547;</td>
             <td><?php echo $fetch['remark']?></td>
             <td><?php echo $fetch['date']?></td>
                
         </tr><?php
            }}
           }
           ?> 
    </tbody>
        
</table>
<?php
if(isset($_POST['search']))
{
$query1 = "select * from bonus_deduct where emp_id ='$search'";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../hrm/historybdSearch.php?page='.($page-1).'&search1='.$search.'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    echo'<li><a href="../hrm/historybdSearch.php?page='.$i.'&search1='.$search.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../hrm/historybdSearch.php?page='.($page+1).'&search1='.$search.'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
}
else
{
  $query1 = "select * from bonus_deduct where emp_id ='$search1'";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../hrm/historybdSearch.php?page='.($page-1).'&search1='.$search1.'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    echo'<li><a href="../hrm/historybdSearch.php?page='.$i.'&search1='.$search1.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../hrm/historybdSearch.php?page='.($page+1).'&search1='.$search1.'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
}
?>

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

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?> <!-- notification javascript code -->
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