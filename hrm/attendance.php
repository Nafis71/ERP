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
    <link rel="stylesheet" href="../css/attendance.css" rel='stylesheet'>
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
        <a href="dashboard.php">
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
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
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
      <span class="text">Employee Attendance List</span>
      
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
           $query1 = "SELECT *from attendance";
           $result = mysqli_query($connect,$query1);
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
          <form action="../hrm/emp_leave_search.php" method="GET">
          <th colspan="3" class="head1">
           <input id="form_lastname" type="number" name="search" class="form-control" placeholder="Enter employee id *" required="required" >
          </th>
          <th colspan="1"class="head1">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          <form  method="POST" action="../backend/emp_attendance_excel_record.php">
          <th colspan="1" class="head2" >
          <button class="btn btn-success" type="submit" name ="submit"><i class="fa-solid fa-file-excel"></i>&nbsp;Export Excel</button>
          
          </form>
          
          <button class="btn btn-light"  id="mybtn" ><i class="fa-solid fa-plus"></i>&nbsp;Add</button>
          <button class="btn btn-light"  id="mybtn2" ><i class="fa-solid fa-gifts"></i>&nbsp;Holiday</button>
          </th>
          <th colspan ="1" class="head2">
          <form action="../backend/delete_attendance.php" method="POST">
          <button class="btn btn-danger" type="submit" name ="submit"  ><i class="fa fa-solid fa-trash-can"></i>&nbsp;Delete</button>
          </th>
          
          
        </tr>
        
         
           
         
      </thead>
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Employee Designation</th>
            <th>Attendance Date</th>
            <th>Present Status</th>
          
           
        </tr>
    </thead>
    <tbody>
          
          <?php
          mysqli_select_db($connect,'erp');
           $query  = "select *from attendance ORDER BY attendance_date asc LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           while($fetch = mysqli_fetch_array($run))
           {
           ?>
        <tr>
            <td><input type="checkbox" name=check[] value="<?php  echo $fetch['emp_id']; ?>"> </td>
            <td><?php echo $fetch['emp_id']?></td>
            <td><?php echo $fetch['name']?></td>
            <td><?php echo $fetch['designation']?></td>
            <?php 
            $date = $fetch['attendance_date'];
            $month = date('F', strtotime($date));
            $day = date('d',strtotime($date));
            $year =date('Y',strtotime($date));
            ?>
            <td><?php echo $day,',', $month ,',', $year ?></td></td>
            <?php
             if($fetch['present_status'] == 0)
             {
            echo '<td>A</td>';
             }
             else
            echo '<td>P</td>';
            ?>          
        </tr><?php
           }
           ?> 
    </tbody>
</table>
</form>
<?php
$query1 = "SELECT *from attendance";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="../hrm/attendance.php?page='.($page-1).'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="../hrm/attendance.php?page='.$i.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="../hrm/attendance.php?page='.($page+1).'" class="btn btn-primary">Next</a></li>';
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
    <h2>Attendance</h2>
    <span class="close"><button type="button" class="btn btn-danger" id="close"><i class="fas fa-times"></i></button></span>
  </div>
  <div class="modal-body">
  <form action="../backend/add_attendance.php" method="post">
  <div class=" text-center mt-5 ">              
            
            </div>
    
        
        <div class="row ">
          
          <div class="col-lg-7 mx-auto">
            
           <div class ="card1">

           
                <div class = "container">
                                 <form action="../backend/emp_leave.php" method="post">
    
                
                                 <h3>Add&nbsp;Attendance</h3>
                <div class="controls">
    
                    <div class="row">

                            <div class="form-group">
                                <label for="form_id">Employee ID <span style="color:#ff0000">*</span></label>
                                <input id="form_id" type="text" name="id" class="form-control" placeholder="Please enter unique employee ID *" multiple size="50" required="required" >
                                
                            </div>                      
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_bank">Attendance&nbsp;Date<span style="color:#ff0000">*</span></label>
                                <input class="datepicker" type="date" name="date"required="required">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_bank">In&nbsp;Time<span style="color:#ff0000">*</span></label>
                                <input class="datepicker" type="time" name="date"required="required">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_bank">Out&nbsp;Time<span style="color:#ff0000">*</span></label>
                                <input class="datepicker" type="time" name="date"required="required">
                                
                            </div>
                        </div>
                        </div>
                        <hr>
                        
                    </div>
                    
                    NB:  "Please put comma after every employee id and end with a comma."<br>
                         " You can enter single or multiple employee IDs "
                    <br>
                    <hr>
                    <div class="col-md-12">
                            
                            <button name ="submit" type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                " value="INSERT" >Submit</button>
                        
                       </div>
                    <hr>
    
                    </div>
                  
                 </div>

              </div>           
            </div>
            </form>
</div>
</div>
  </div>
            
            <div id="myModal2" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header"> 
    <h2>Holiday</h2>
    <span class="close"><button type="button" class="btn btn-danger" id="close2"><i class="fas fa-times"></i></button></span>
  </div>
  <div class="modal-body">
  
  <div class="row ">
  <form action="../backend/holiday.php" method="POST">
          <div class="col-lg-7 mx-auto">
             <div class="row">
             <h3>Add&nbsp;Holiday</h3>
             <hr>
             <br>
             <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need1">Select Month <span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="date" class="form-control" required="required">
                                    <option value="" selected disabled>--Month--</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need1">Select Year <span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="year" class="form-control" required="required">
                                    <option value="" selected disabled>--Year--</option>
                                    <option value="<?php echo date("Y")?>"><?php echo date("Y")?></option>
                                    
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="form_id">Enter Total Days<span style="color:#ff0000">*</span></label>
                                <input id="form_id" type="text" name="total" class="form-control" placeholder="Enter total days *"required="required" >
                                
                            </div>       
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="form_id">Enter Total Holidays<span style="color:#ff0000">*</span></label>
                                <input id="form_id" type="text" name="holiday" class="form-control" placeholder="Enter Date *" multiple size="50" required="required" >
                                
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