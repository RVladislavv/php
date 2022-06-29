<?php

	// your functions may be here

	/* start --- black box */
    //возвращает массив с хранилища
	function getArticles() : array{
		return json_decode(file_get_contents('db/articles.json'), true);
	}

    //принимает тайтл и контент, возвращает булевское значение, в нашем случае всегда тру
	function addArticle(string $title, string $content) : bool{
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];

		saveArticles($articles);
		return true;
	}
    //принимает айдишник и возвращает бул знач - удалось ли удалить статью
	function removeArticle(int $id) : bool{
		$articles = getArticles();

		if(isset($articles[$id])){
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}
    //моя функция для изменения данных, в отличие от аддАртикл по идее должна найти по айди нужные данные и изменить
    function editArticle(string $title, string $content, string $id) : bool{
        $articles = getArticles();

        $articles[$id] = [
            'id' => $id,
            'title' => $title,
            'content' => $content
        ];

        saveArticles($articles);
        return true;
    }

    //сами никогда не вызываем, эта функция, которая вызывается в addArticle и removeArticle
	function saveArticles(array $articles) : bool{
		file_put_contents('db/articles.json', json_encode($articles));
		return true;
	}
	/* end --- black box */