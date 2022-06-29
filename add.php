<?php

	include_once('functions.php');
    createLogs();
	/*
		your code here
		check request method
		read POST-data
		validate data
		call addArticle
	*/
    /*
    Form or message here
    <hr>
    <a href="index.php">Move to main page</a>
    <p>выше начальный код</p>
    <p>ниже код формы добавления данных</p>
     */
?>

<?php

$isSend = false;
$err = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if($title === '' || $content === ''){
        $err = 'Заполните все поля!';
    }
    else if(mb_strlen($title, 'UTF8') < 2){
        $err = 'Заголовок не короче 2 символов!';
    }
    else{
        addArticle($title, $content);
        $isSend = true;
    }
}
else{
    $title = '';
    $content = '';
}

?>
<div class="form">
    <?php if($isSend): ?>
        <p>Your app is done!</p>
    <?php else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?=$title?>"><br>
            Content:<br>
            <input type="text" name="content" value="<?=$content?>"><br><br>
            <button>Send</button>
            <p><?=$err?></p>
        </form>
    <? endif; ?>
</div>

Form or message here
<hr>
<a href="index.php">Move to main page</a>