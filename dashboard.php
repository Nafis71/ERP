<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41129fd756.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Bando&nbsp;ERP</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">HRM Panel</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">HRM Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Category</a></li>
          <li style="pointer-events:none;opacity:0.6;" ><a href="emp_record.php">Employee Records</a></li>
          <li><a href="#">Add Employee</a></li>
          <li><a href="#">Delete Emp</a></li>
          <li><a href="#">Add Bonus</a></li>
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
      <span class="text">Dashboard</span>
      <div class="sec-1">

      <div class="main-container">
        <p>Monthly Sales</p>
    
		<div class="year-stats">
			<div class="month-group">
				<div class="bar h-100"></div>
				<p class="month">Jan</p>
			</div>
			<div class="month-group">
				<div class="bar h-50"></div>
				<p class="month">Feb</p>
			</div>
			<div class="month-group">
				<div class="bar h-75"></div>
				<p class="month">Mar</p>
			</div>
			<div class="month-group">
				<div class="bar h-25"></div>
				<p class="month">Apr</p>
			</div>
			<div class="month-group ">
				<div class="bar h-100"></div>
				<p class="month">May</p>
			</div>
			<div class="month-group">
				<div class="bar h-50"></div>
				<p class="month">Jun</p>
			</div>
			<div class="month-group">
				<div class="bar h-75"></div>
				<p class="month">Jul</p>
			</div>
			<div class="month-group">
				<div class="bar h-25"></div>
				<p class="month">Aug</p>
			</div>
			<div class="month-group">
				<div class="bar h-50"></div>
				<p class="month">Sep</p>
			</div>
			<div class="month-group">
				<div class="bar h-75"></div>
				<p class="month">Oct</p>
			</div>
			<div class="month-group">
				<div class="bar h-25"></div>
				<p class="month">Nov</p>
			</div>
			<div class="month-group">
				<div class="bar h-100"></div>
				<p class="month">Dec</p>
			</div>
		</div>

		<div class="stats-info">
			<div class="graph-container">
				<div class="percent">
					<svg viewBox="0 0 36 36" class="circular-chart">
						<path class="circle" stroke-dasharray="100, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831" />
						<path class="circle" stroke-dasharray="85, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831" />
						<path class="circle" stroke-dasharray="60, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831"/>
						<path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831" />
      
					</svg>
				</div>
				<p>Total: $2075</p>
			</div>

			<div class="info">
				<p>Most expensive category <br /><span>Restaurants & Dining</span></p>
				<p>Updated categories <span>2</span></p>
				<p>Bonus payments <span>$92</span></p>
			</div>
		</div>
	</div>
  </div>
  <div class="sec-2">

<div class="main-container">
  <p>Monthly Revenues</p>
 
<div class="year-stats">
<div class="month-group">
  <div class="bar h-100"></div>
  <p class="month">Jan</p>
</div>
<div class="month-group">
  <div class="bar h-50"></div>
  <p class="month">Feb</p>
</div>
<div class="month-group">
  <div class="bar h-75"></div>
  <p class="month">Mar</p>
</div>
<div class="month-group">
  <div class="bar h-25"></div>
  <p class="month">Apr</p>
</div>
<div class="month-group ">
  <div class="bar h-100"></div>
  <p class="month">May</p>
</div>
<div class="month-group">
  <div class="bar h-50"></div>
  <p class="month">Jun</p>
</div>
<div class="month-group">
  <div class="bar h-75"></div>
  <p class="month">Jul</p>
</div>
<div class="month-group">
  <div class="bar h-25"></div>
  <p class="month">Aug</p>
</div>
<div class="month-group">
  <div class="bar h-50"></div>
  <p class="month">Sep</p>
</div>
<div class="month-group">
  <div class="bar h-75"></div>
  <p class="month">Oct</p>
</div>
<div class="month-group">
  <div class="bar h-25"></div>
  <p class="month">Nov</p>
</div>
<div class="month-group">
  <div class="bar h-100"></div>
  <p class="month">Dec</p>
</div>
</div>

<div class="stats-info">
<div class="graph-container">
  <div class="percent">
    <svg viewBox="0 0 36 36" class="circular-chart">
      <path class="circle" stroke-dasharray="100, 100" d="M18 2.0845
a 15.9155 15.9155 0 0 1 0 31.831
a 15.9155 15.9155 0 0 1 0 -31.831" />
      <path class="circle" stroke-dasharray="85, 100" d="M18 2.0845
a 15.9155 15.9155 0 0 1 0 31.831
a 15.9155 15.9155 0 0 1 0 -31.831" />
      <path class="circle" stroke-dasharray="60, 100" d="M18 2.0845
a 15.9155 15.9155 0 0 1 0 31.831
a 15.9155 15.9155 0 0 1 0 -31.831"/>
      <path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
a 15.9155 15.9155 0 0 1 0 31.831
a 15.9155 15.9155 0 0 1 0 -31.831" />

    </svg>
  </div>
  <p>Total: $2075</p>
</div>

<div class="info">
  <p>Most expensive category <br /><span>Restaurants & Dining</span></p>
  <p>Updated categories <span>2</span></p>
  <p>Bonus payments <span>$92</span></p>
</div>
</div>
</div>
</div>
  
  <div class = "sec-3">
  <div class="cpanel">
<div class="icon-part">
<i class="fa fa-users" aria-hidden="true"></i><br>
<small>Total Employee</small>
<p>985</p>
</div>
<div class="card-content-part">
<a href="#">More Details </a>
</div>
</div>
<div class="cpanel cpanel-green">
<div class="icon-part">
<i class="fa-solid fa-user-check"></i><br>
<small>Employee Working</small>
<p>$ 452</p>
</div>
<div class="card-content-part">
<a href="#">More Details </a>
</div>
</div>
<div class="cpanel cpanel-orange">
<div class="icon-part">
<i class="fa-solid fa-user-large-slash"></i><br>
<small>Employee Absent</small>
<p>11 New</p>
</div>
<div class="card-content-part">
<a href="#">More Details </a>
</div>
</div>
<div class="cpanel cpanel-blue">
<div class="icon-part">
<i class="fa-solid fa-user-injured"></i><br>
<small>On leave</small>
<p>85</p>
</div>
<div class="card-content-part">
<a href="#">More Details</a>
</div>
</div>
<div class="cpanel cpanel-blue">
<div class="icon-part">
<i class="fa-solid fa-building-columns"></i><br>
<small>Total Assets</small>
<p>$ 45</p>
</div>
<div class="card-content-part">
<a href="#">More Details </a>
</div>
</div>
<div class="cpanel cpanel-red">
<div class="icon-part">
<i class="fa-solid fa-money-bill-transfer"></i><br>
<small>Total Exports</small>
<p>$ 45</p>
</div>
<div class="card-content-part">
<a href="#">More Details </a>
</div>
</div>
<div class="cpanel ">
<div class="icon-part">
<i class="fa-solid fa-money-bill-transfer"></i><br>
<small>Total Imports</small>
<p>$ 45</p>
</div>
<div class="card-content-part">
<a href="#">More Details </a>
</div>
</div>
<div class="cpanel cpanel-skyblue">
<div class="icon-part">
<i class="fa-solid fa-money-bills"></i><br>
<small>Machine Repair Cost</small>
<p>104</p>
</div>
<div class="card-content-part">
<a href="#">More Details </a>
</div>
</div>

  </div>
    </div>
  </section>
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
