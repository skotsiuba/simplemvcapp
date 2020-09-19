<?php

use App\Models\Article;

return [
    function (Article $article) {
        return $article->id;
    },
    function (Article $article) {
        return $article->title;
    },
    function (Article $article) {
        return $article->content;
    },
    function (Article $article) {
        if (!empty($article->author)) {
            return $article->author->name;
        } else {
            return 'Without author';
        }
    }
];
