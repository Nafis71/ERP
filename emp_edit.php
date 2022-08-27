<?php
session_start();
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
    <link rel="stylesheet" href="css/emp_record.css" rel='stylesheet'>
    <title>Employee Edit</title>
</head>
<body>
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
          <li><a class="link_name" href="#">Dashboard</a></li>
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
          <li><a href="#">Employee Records</a></li>
          <li><a href="#">Holiday list</a></li>
          <li><a href="#">Joining Letter</a></li>
          <li><a href="#">Manage Salary</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
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
      <div class="name-job">
        <div class="profile_name">Tonmoy</div>
        <div class="job">Web Desginer</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Employee Records</span>
    </div>
    <div sec-2>
    <div class="row ">
          
          <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                <?php
                        $id = $_GET['id'];
                        include 'connect.php';
                        mysqli_select_db($connect,'erp');
                        $sql = "select *from employee natural join salary where emp_id ='$id'";
                        $result = mysqli_query($connect,$sql);
                        $data = mysqli_fetch_array($result);

                 ?>
                <div class = "container">
                                 <form action="backend/emp_edit.php" method="post">                  
                                 <h3>Edit Employee Info</h3>
                <div class="controls">
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_id">Employee ID <span style="color:#ff0000">*</span></label>
                                <input id="form_id" type="number" name="id" class="form-control" placeholder="Please enter unique employee ID *" value="<?php echo $id ?>" required="required" readonly >
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Name <span style="color:#ff0000">*</span></label>
                                <input id="form_lastname" type="text" name="name" class="form-control" placeholder="Please enter employee name *" value="<?php echo $data['name'] ?>" required="required" >
                                                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_address">Address <span style="color:#ff0000">*</span></label>
                                <input id="form_address" type="text" name="address" class="form-control" placeholder="Please enter address *" value="<?php echo $data['address'] ?>" required="required" >
                                                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_phone">Phone Number <span style="color:#ff0000">*</span></label>
                                <input id="form_phone"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="phone" maxlength = "11" name="phone" class="form-control" placeholder="Please enter the phone number *" value="0<?php echo $data['emp_phone'] ?>" required="required">
                                                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-check">
                                <?php
                                if($data['gender'] == 'Male')
                                {
                                    $check = "checked";
                                }
                                else
                                {
                                    $check = "unchecked";
                                }
                                if($data['gender'] == 'Female')
                                {
                                    $check1 = "checked";
                                }
                                else
                                {
                                    $check1 = "unchecked";
                                }
                               ?>
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" required <?php echo $check ?> >
                            <label class="form-check-label" for="flexRadioDefault1" >Male <span style="color:#ff0000">*</span></label>
                            
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2"value="Female"required <?php echo $check1 ?>>
                            <label class="form-check-label" for="flexRadioDefault2" >
                              Female <span style="color:#ff0000">*</span>
                            </label>
                          </div>    
                             </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="form_need">Employee's designation <span style="color:#ff0000">*</span></label>
                                <select id="form_need" name="designation" class="form-control" required="required" >
                                <option value="<?php echo $data['designation'] ?>">--<?php echo $data['designation'] ?>--</option>
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
                                <input id="form_bank" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " type="number" maxlength="9" name="bank" class="form-control" placeholder="Please enter the account Number *" value="<?php echo $data['bank'] ?>" required="required">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need1">Employee's salary <span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="salary" class="form-control" required="required">
                                    <option value="<?php echo $data['salary'] ?>">--<?php echo $data['salary'] ?> &#2547; --</option>
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
                                <label for="form_message">Remarks </label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Write a remark here (OPTIONAL)" rows="4"  ></textarea>
                                </div>
    
                            </div>
    
    
                        <div class="col-md-12">
                            
                            <button name ="submit" type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                " value="INSERT" >Submit</button>
                        
                       </div>
              
                      </div>
    
    
                    </div>
                  </form>
               </div>
             </div>

            </div>
         </div>

        </div>
</div>

    </div>
  </section>
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