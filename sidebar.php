<ul class="sidebar navbar-nav">
    <li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Announcements</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="/<?php echo ROOT ?>/announcements/">Announcements</a>
        <?php if (IsInRole(ADMIN)) { ?>
            <a class="dropdown-item" href="/<?php echo ROOT ?>/announcements/add.php">Add</a>
            <a class="dropdown-item" href="/<?php echo ROOT ?>/announcements/manage.php">Manage</a>
        <?php }?>
    </div>
    </li>
    <?php if (IsInRole(ADMIN) or IsInRole(DESPATCHER) ) { ?>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Reports</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <?php if (IsInRole(ADMIN)) { ?>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/despatchers.php">Despatchers</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/customers,.php">Customers</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/orders.php">Orders</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/registered,.php">Restaurants/Cafe...</a>
        <?php }?>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/despatcherEarn.php">Despatcher Earnings</a>
    </div>
    </li>
    <?php }?>
	<?php if (IsInRole('Despatcher')) { ?>
	 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Despatchers</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="/<?php echo ROOT ?>/despatcher/despatcherMain.php">View Profile</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/despatcher/feedbackReport.php">Feedback</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/despatcher/viewBooking.php">Order List</a>
		<a class="dropdown-item" href="/<?php echo ROOT ?>/reports/despatcherEarn.php">View Report</a>
		<a class="dropdown-item" href="/<?php echo ROOT ?>/despatcher/addService.php">Add Service</a>
		<a class="dropdown-item" href="/<?php echo ROOT ?>/despatcher/services.php">Services</a>
           
    </div>
    </li>
	<?php }?>
	<?php if (IsInRole('Customer')) { ?>
	 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Customers</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="/<?php echo ROOT ?>/customer/showProfile.php">View Profile</a>
         <a class="dropdown-item" href="/<?php echo ROOT ?>/customer/servicetype.php">View Despatchers Available</a>  
		 <a class="dropdown-item" href="/<?php echo ROOT ?>/customer/viewBooking.php">View Booking</a>  
          <a class="dropdown-item" href="/<?php echo ROOT ?>/customer/feedbackForm.php">Give Feedback</a>  
		  
    </div>
    </li>
	<?php }?>
	
		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Orders</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="/<?php echo ROOT ?>/orders/orderMain.php">Main</a>
		<a class="dropdown-item" href="/<?php echo ROOT ?>/orders/viewDespatcher.php">View Despatcher</a>
		<a class="dropdown-item" href="/<?php echo ROOT ?>/orders/viewVouchers.php">View Vouchers</a>
    </div>
    </li>
	<?php if (IsInRole('Customer')) { ?>
		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Restaurant</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="/<?php echo ROOT ?>/Restaurant/NEW Restaurant/menuFood.php">Main</a>

    </div>
    </li>
	<?php }?>

    <li class="nav-item dropdown" style="display:none">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="display:none">
        <h6 class="dropdown-header">Login Screens:</h6>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/login.php">Login</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/register.php">Register</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/forgot-password.html">Forgot Password</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Other Pages:</h6>
        <a class="dropdown-item" href="404.html">404 Page</a>
        <a class="dropdown-item" href="blank.html">Blank Page</a>
    </div>
    </li>
</ul>