<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

/**
 * Class Index
 * @package App\Controllers
 */
class Index extends Controller
{
    /**
     * @return void
     */
    protected function handle()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }
}
