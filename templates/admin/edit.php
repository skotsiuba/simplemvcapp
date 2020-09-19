<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
           maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit the article</title>
</head>
<body>
<h1>Edit the article</h1>
<form method="post">
    <p>Title</p>
    <input type='hidden' name="id" value="<?php echo $article->id; ?>">
    <input type="text" size="60" maxlength="250" name="title"
           value="<?php echo $article->title; ?>">
    <p>Content</p>
    <textarea name="content" id="" cols="60"
              rows="10"><?php echo $article->content; ?></textarea>
    <?php if (!empty($article->author)) : ?>
        <p><b>Author: <?php echo $article->author->name; ?></b></p>
    <?php endif; ?>
    <br><br>
    <button formaction="/admin/rewrite" type="submit">
        Rewrite the article
    </button>
    <button formaction="/admin/add" type="submit">
        Save as new article
    </button>
    <button formaction="/admin/cancel" type="submit">
        Cancel
    </button>
</form>
</body>
</html>