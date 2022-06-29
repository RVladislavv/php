<?php

include_once('functions.php');
$articles = getArticles();

$id = (int)($_GET['id'] ?? '');
$post = $articles[$id] ?? null;
$hasPost = ($post !== null);



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
        editArticle($title, $content, $id);
        $isSend = true;
    }
}
else{
    $title = $post['title'];
    $content = $post['content'];
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