<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body>
<h1>Новости</h1>
<a href="/admin">
    <button>Go to the Admin panel</button>
</a>
<div>
    <?php foreach ($news as $article) : ?>
        <article>
            <h2><a href="/article/<?php echo $article->id; ?>">
                    <?php echo $article->title; ?></a></h2>
            <p><?php echo $article->content; ?></p>
            <?php if (!empty($article->author)) : ?>
                <p><b>Author: <?php echo $article->author->name; ?></b></p>
            <?php endif; ?>
        </article>
    <?php endforeach; ?>
</div>
</body>
</html>