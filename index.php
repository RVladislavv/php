<?php

	include_once('functions.php');
	$articles = getArticles();
    createLogs();
?>
<a href="add.php">Add article</a>
<br><br>
<a href="./logs.php">Watch logs</a>
<hr>
<div class="articles">
	<? foreach($articles as $id => $article): ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<a href="article.php?id=<?=$id?>">Read more</a>
		</div>
	<? endforeach; ?>
</div>
	