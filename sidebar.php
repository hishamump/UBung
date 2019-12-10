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
        <a class="dropdown-item" href="aList.php">List</a>
        <a class="dropdown-item" href="aAdd.php">Add New</a>
    </div>
    </li>
	
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Reports</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/despatchers.php">Despatchers</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/customers,.php">Customers</a>

        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/orders.php">Orders</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/reports/registered,.php">Restaurants/Cafe...</a>        
    </div>
    </li>
	
	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Orders</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="/<?php echo ROOT ?>/orders/orderMain.php">Main</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/orders/update.php">Update</a>
        
    </div>
    </li>
	
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Login Screens:</h6>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/login.html">Login</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/register.html">Register</a>
        <a class="dropdown-item" href="/<?php echo ROOT ?>/forgot-password.html">Forgot Password</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Other Pages:</h6>
        <a class="dropdown-item" href="404.html">404 Page</a>
        <a class="dropdown-item" href="blank.html">Blank Page</a>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="charts.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="tables.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
</ul>