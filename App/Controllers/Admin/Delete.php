<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Exceptions\DbException;
use App\Models\Article;

/**
 * Class Delete
 * @package App\Controllers\Admin
 */
class Delete extends Controller
{
    /**
     * @return void
     * @throws DbException
     */
    protected function handle()
    {
        $id = $this->data['action'];
        $article = Article::findById($id);
        $article->delete();
        $this->redirect('/admin');
    }
}
