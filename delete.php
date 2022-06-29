<?php

	include_once('functions.php');		

	/*
		your code here
		get id from url
		check id
		call removeArticle
	*/

    $id = $_GET['id'];
    removeArticle($id);
?>
Your article has been deleted.
<hr>
<a href="index.php">Move to main page</a>