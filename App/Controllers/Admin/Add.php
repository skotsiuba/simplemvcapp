<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Exceptions\DbException;
use App\Exceptions\MultiException;
use App\Models\Article;

/**
 * Class Add
 * @package App\Controllers\Admin
 */
class Add extends Controller
{
    /**
     * @return void
     * @throws DbException
     * @throws MultiException
     */
    protected function handle()
    {
        $article = new Article();
        $article->fill($_POST);
        $article->save();
        $this->redirect('/admin');
    }
}
