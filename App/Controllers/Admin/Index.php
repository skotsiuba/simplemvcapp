<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Exceptions\DbException;
use App\Models\Article;

/**
 * Class Index
 * @package App\Controllers\Admin
 */
class Index extends Controller
{
    /**
     * @return void
     * @throws DbException
     */
    protected function handle()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../../templates/admin/index.php');
    }
}
