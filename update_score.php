<?php
define('DEBUG', true);
error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'on' : 'off'); ?>
<?php date_default_timezone_set('Asia/Kabul'); ?>
<?php require_once("inc/initialize.php"); ?>

<?php if(isset($_GET['score'], $_GET['id_number'])) {
    // File path
    $file_path= SITE_ROOT.DS.'report'.DS.$_GET['id_number'].'.txt';
    // Open the file to get existing content
    //$current = file_get_contents($file_path);
    $fp = fopen($file_path, 'a');
    if(!$fp){
        echo 'file is not opend';
    }
    // Append a new person to the file
    $data_to_write = " \r\n";
    $data_to_write .= " [Listening:] ".$_GET['listeningScore']." out of 100 \r\n";
    $data_to_write .= " [Grammar:] ".$_GET['grammarScore']." out of 100 \r\n";
    $data_to_write .= " [Total:] ".$_GET['score']." out of 200 \r\n";
    // Write the contents back to the file
    fwrite($fp, $data_to_write);
    fclose($fp);

} else {
    echo 'error!';
}