<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Errors</title>
</head>
<body>
<h1>Oops! Somthing went wrong...</h1>
<a href="/admin">
    <button>Return to the Admin panel</button>
</a>
<div>
    <!-- Block for MultiException's messagies -->
    <?php use App\Exceptions\MultiException;

    if ($message instanceof MultiException) : ?>
        <div>
            <h1>Some fields of form have not passed validation</h1>
            <?php foreach ($message->all() as $msg) : ?>
                <p>Cause: <b><?php echo $msg->getMessage(); ?></b></p>
                <hr>
            <?php endforeach; ?>
            <!-- End of block for MultiException's messagies -->
        </div>
        <!-- Block for the rest messages of exceptions -->
        <div>
    <?php else: ?>
        <h1>Something went wrong</h1>
        <p>Cause: <?php echo $message->getMessage(); ?></p>
        </div>
    <?php endif; ?>
    <!-- End block for the rest messages of exceptions -->
</div>
</body>
</html>