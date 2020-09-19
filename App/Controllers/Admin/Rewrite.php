<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Exceptions\DbException;
use App\Models\Article;

/**
 * Class Rewrite
 * @package App\Controllers\Admin
 */
class Rewrite extends Controller
{
    /**
     * @return void
     * @throws DbException
     * @throws App\Exceptions\MultiException
     */
    protected function handle()
    {
        $article = Article::findById($_POST['id']);
        $article->fill($_POST);
        $article->save();
        $this->redirect('/admin');
    }
}
