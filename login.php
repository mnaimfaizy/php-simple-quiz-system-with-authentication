<?php
	require_once("inc/initialize.php");

  if($session->is_logged_in()) {
    redirect_to("index.php");
  }

	$message = false;
	// Remember to give your form's submit tag a name="submit" attribute!
	if(isset($_POST['submit'])) { // Form has been submitted.

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		// Check database to see if username/password exist
		$found_user = User::authenticate($username, $password);

    if($found_user) {
      $session->login($found_user);
      
      // Output to the log file
      log_action('Login', "{$found_user->username} loged in.");
      
        $_SESSION['login'] = 'true';
          if(isset($_POST['remember']) && $_POST['remember']==1) {
    			  setcookie("login","1",time()+365*24*60*60);
          } else {
          	setcookie("login","1",time()+365*24*60*60);
          }

      // Once the user is found redirect it to index
      redirect_to("index.php");
		} else {
			// username/password combo was not found in the database
			$message = true;
		}
	} else { // Form has not been submitted
		$username = "";
		$password = "";
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>PHP Simple Quiz System</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="assets/css/style.css" rel="stylesheet">

</head>

<body style="background-color: #FFFFFF">

<div class="login-page">
<div class="login-box">
<div class="logo">
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>">PHP-<b>Simple</b></a>
            <small>Quiz System</small>
        </div>

          <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start</div>
                    <?php if($message === true) { ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <strong>Warning!</strong> <br />
                        Username/Password is not correct!
                      </div>
                    <?php } ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>

    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/sign-in.js"></script>

</body>
</html>
