<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
<a href="/">
    <button>Return to the Main page</button>
</a>
<h1><?php echo $article->title; ?></h1>
<p><?php echo $article->content; ?></p>
<?php if (!empty($article->author)) : ?>
    <p><b>Author: <?php echo $article->author->name; ?></b></p>
<?php endif; ?>
</body>
</html>