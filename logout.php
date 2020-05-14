<?php
require_once("inc/initialize.php");

log_action('Logout', $_SESSION['name']." loged out.");
$session->logout();
redirect_to("login.php");

?>