<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;

/**
 * Class Edit
 * @package App\Controllers\Admin
 */
class Edit extends Controller
{
    /**
     * @return void
     * @throws App\Exceptions\DbException
     */
    protected function handle()
    {
        $id = $this->data['action'];
        $this->view->article = Article::findById($id);
        $this->view->display(__DIR__ . '/../../../templates/admin/edit.php');
    }
}

