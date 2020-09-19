<?php
/**
 * @var \Generator $models
 * @var callable[] $functions
 */
?>
<table border="1" cellspacing="0">
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Author</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
    <?php foreach ($models as $article) : ?>
        <tr>
            <?php foreach ($functions as $function) : ?>
                <td><?php echo $function($article); ?></td>
            <?php endforeach; ?>

            <td>
                <a href="/admin/edit/<?php echo $article->id; ?>">
                    <button>Edit article</button>
                </a>
            </td>
            <td>
                <a href="/admin/delete/<?php echo $article->id; ?>">
                    <button>Delete article</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>