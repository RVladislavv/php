<?php
include_once('functions.php');
createLogs();

$str = $_GET['id'];
$path = "./logs/$str";

$res = file($path);

foreach ($res as $log) {
    $tmp = explode(' ', $log);
    if ($tmp[3] === ' ' || $tmp[3] === "\n") {
        print_r("<strong>$log</strong><br>");

    } else {
        print_r($log . "<br>");
    }

}

?>

<hr>
<a href="index.php">Move to main page</a>
