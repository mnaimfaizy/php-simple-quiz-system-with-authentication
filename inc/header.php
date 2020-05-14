  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Quiz</b> System</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Quiz</b> System</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['name']; ?> - <?php echo $_SESSION['position']; ?>
                  <br />
                  <?php echo $_SESSION['group_name']; ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Total Calls:
                      <?php $getTotalCalls = $database->query("SELECT COUNT(*) as total FROM calls WHERE engineer='".$_SESSION['user_id']."'");
                        $calls = $database->fetch_array($getTotalCalls); ?>
                        <span class="badge"><?php echo $calls['total']; ?></span>
                    </a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Today's Calls:
                      <?php $getTotalCalls = $database->query("SELECT COUNT(*) as total FROM calls WHERE engineer='".$_SESSION['user_id']."' AND date='".date('d/m/Y', time())."' ORDER BY call_id");
                        $calls = $database->fetch_array($getTotalCalls); ?>
                        <span class="badge"><?php echo $calls['total']; ?></span>
                    </a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <div class="pull-left">
                  <a href="changepassword.php" class="btn btn-default btn-flat">Change Password</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>