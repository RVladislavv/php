<?php
include_once('functions.php');
createLogs();
$path = './logs';
$files = scandir($path);
$logs = array_filter($files, function($f){
    return is_file("logs/$f")/* && checkImageName($f)*/;
});

?>

<div class="log">
    <? foreach($logs as $log): ?>
        <div class="log">
            <a href="showLogs.php?id=<?=$log?>"><?=$log?></a>
        </div>
        <br>
    <? endforeach; ?>
</div>

<hr>
<a href="index.php">Move to main page</a>
