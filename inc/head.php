<?php define('DEBUG', true);
error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'on' : 'off'); ?>
<?php date_default_timezone_set('Asia/Kabul'); ?>
<?php require_once("inc/initialize.php"); ?>
<?php if(!$session->is_logged_in() || !isset($_COOKIE['login'])) { redirect_to("login.php"); }
  //echo $session->is_logged_in();
  //echo $_COOKIE['login'];
?>
<?php $page_name = get_page_name();
    // To fetch the group name of the user
    $query = "SELECT `group` FROM users WHERE id=".$_SESSION['user_id']." LIMIT 1";
    $res = $database->query($query);
    $groups = $database->fetch_array($res);
    $_SESSION['group_name'] = $groups['group'];
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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.min.css" rel="stylesheet" />

    <?php if($page_name == 'quiz.php') { ?>
      <link href="assets/css/quiz-css.css" rel="stylesheet" />
      <script>
        function playAudio() {
          myAudio = document.getElementById('player');
            myAudio.currentTime = 58;
            myAudio.play();
            //console.log("inside Function");
          //console.log("Outside of function");
        }
      </script>
    <?php } ?>

    <!-- Jquery UI -->
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet" />
</head>