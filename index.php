<?php

use App\Controllers\Error;
use App\Exceptions\BaseException;
use App\Exceptions\ControllerNotFoundException;
use App\Exceptions\DbException;
use App\Exceptions\ErrorException;
use App\Exceptions\MailerException;
use App\Logger;
use App\Mailer;

require __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);

unset($parts[0]);

if (count($parts) >= 2) {
    $action = array_pop($parts);
    $arr = [];
    foreach ($parts as $part) {
        $arr[] = ucfirst($part);
    }
    $name = implode('\\', $arr);
} else {
    $name = (!empty($parts[1])) ? ucfirst($parts[1]) : 'Index';
}

$classController = '\App\Controllers\\' . $name;
$pathToClassController = __DIR__ . '/' . str_replace('\\', '/', $classController) . '.php';
try {
    if (!is_readable($pathToClassController)) {
        throw new ControllerNotFoundException ($classController . ' - Such Controller Not Found');
    }
    $controller = new $classController;
    if (isset($action)) {
        $controller->action = $action;
    }
    $controller();
} catch (DbException | ErrorException | BaseException | ControllerNotFoundException | MailerException $e) {
    if ($e instanceof DbException) {
        (Mailer::instance())->send($e->getMessage());
    }
    (new Logger())->error($e);
    $controller = new Error();
    $controller->message = $e->getMessage();
    $controller();
}
