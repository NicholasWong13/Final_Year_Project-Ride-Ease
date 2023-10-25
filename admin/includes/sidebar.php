<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="assets/images/images.png" alt="avatar"/></a>
        </div>
      </div>
      <div class="media-body">
        <div class="foldable">
<?php
$id=$_SESSION['id'];
$sql="SELECT UserName,Email from admin where ID=:id";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $row)
{    
$email=$row->Email;   
$uname=$row->UserName;     
}   ?>
          <h5><a href="javascript:void(0)" class="username"><?php  echo $uname ;?></a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small><?php  echo $email;?></small>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu animated flipInY">
                <li>
                  <a class="text-color" href="dashboard.php">
                    <span class="m-r-xs"><i class="fa fa-home"></i></span>
                    <span>Home</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="profile.php">
                    <span class="m-r-xs"><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="change-password.php">
                    <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                    <span>Settings</span>
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a class="text-color" href="logout.php">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="has-submenu">
          <a href="dashboard.php">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="analytics.php">
            <i class="menu-icon zmdi zmdi-desktop-windows zmdi-hc-lg"></i> 
            <span class="menu-text">Analytics</span>
          </a>
        </li>

        <li class="has-submenu">
        <a href="javascript:void(0)" class="submenu-toggle">
          <i class="menu-icon zmdi zmdi-label zmdi-hc-lg"></i>
          <span clss="menu-text">Brands</span>
          <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
        </a>
          <ul class="submenu">
				<li><a href="create-brand.php"><span class="menu-text">Create Brand</span></a></li>
				<li><a href="manage-brands.php"><span class="menu-text">Manage Brands</span></a></li>
			    </ul>
       </li>

       <li class="has-submenu">
        <a href="javascript:void(0)" class="submenu-toggle">
          <i class="menu-icon zmdi zmdi-car zmdi-hc-lg"></i>
          <span clss="menu-text">Vehicles</span>
          <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
        </a>
          <ul class="submenu">
          <li><a href="post-avehicle.php"><span class="menu-text">Post a Vehicle</span></a></li>
          <li><a href="manage-vehicles.php"><span class="menu-text">Manage Vehicles</span></a></li>
          <li><a href="vehicles-inspection.php"><span class="menu-text">Vehicles Inspection</span></a></li>
          </ul>
       </li>

       <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-pages zmdi-hc-lg"></i>
            <span class="menu-text">Booking</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="new-booking.php"><span class="menu-text">New Booking</span></a></li>
            <li><a href="approved-booking.php"><span class="menu-text">Approved Booking</span></a></li>
            <li><a href="cancelled-booking.php"><span class="menu-text">Cancelled Booking</span></a></li>
            <li><a href="manage-bookings.php"><span class="menu-text">All Booking</span></a></li>
           
          </ul>
        </li>

        <li>
          <a href="reg-users.php">
            <i class="menu-icon zmdi zmdi-account-circle zmdi-hc-lg"></i> 
            <span class="menu-text">Users</span>
            </a>
        </li>

        <li>
          <a href="testimonials.php">
            <i class="menu-icon zmdi zmdi-widgets zmdi-hc-lg"></i> 
            <span class="menu-text">Testimonials</span>
          </a>
        </li>

				<li>
          <a href="manage-conactusquery.php">
            <i class="menu-icon zmdi zmdi-comment-more zmdi-hc-lg"></i> 
            <span class="menu-text">Contact Us Query</span>
          </a>
        </li>

        <li>
          <a href="manage-locations.php">
            <i class="menu-icon zmdi zmdi-gps-dot zmdi-hc-lg"></i> 
            <span class="menu-text">Location</span>
          </a>
        </li>

        <li>
          <a href="manage-pages.php">
            <i class="menu-icon zmdi zmdi-search-in-page zmdi-hc-lg"></i> 
            <span class="menu-text">Manage Pages</span>
          </a>
        </li>

				<li>
          <a href="manage-subscribers.php">
            <i class="menu-icon zmdi zmdi-accounts-list-alt zmdi-hc-lg "></i> 
            <span class="menu-text">Subscribers</span>
          </a>
        </li>
				
        <li>
          <a href="search.php">
            <i class="menu-icon zmdi zmdi-search zmdi-hc-lg"></i>
            <span class="menu-text">Search</span>
          </a>
        </li>
        <li>
          <a href="booking-bwdates.php">
            <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
            <span class="menu-text">Report</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</aside>