<?php
define('DEBUG', true);
error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'on' : 'off'); ?>
<?php date_default_timezone_set('Asia/Kabul'); ?>
<?php require_once("inc/initialize.php"); ?>

<?php if(isset($_GET['question'], $_GET['answer'])) {
    // File path
    $file_path= SITE_ROOT.DS.'transcript'.DS.$_GET['id_number'].'_details.txt';
    // Open the file to get existing content
    //$current = file_get_contents($file_path);
    $fp = fopen($file_path, 'a');
    if(!$fp){
        echo 'file is not opend';
    }
    // Append a new person to the file
    //$data_to_write = " \r\n";
    $data_to_write = $_GET['question']." => ".$_GET['answer']." \r\n";
    // Write the contents back to the file
    fwrite($fp, $data_to_write);
    fclose($fp);

} else {
    echo 'error!';
}