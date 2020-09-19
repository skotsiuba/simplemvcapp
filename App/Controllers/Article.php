<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\ErrorException;
use App\Models\Article as ArticleModel;

/**
 * Class Article
 * @package App\Controllers
 */
class Article extends Controller
{
    /**
     * @return void
     */
    public function handle()
    {
        $id = $this->data['action'];
        if (is_string($id) && !is_numeric($id)) {
            throw new ErrorException('Such id: \'' . $id . '\' is not 
            correct.');
        }
        if (false === $this->view->article = ArticleModel::findById($id)) {
            throw new ErrorException('Error 404 - Article with such id \'' .
                $id . '\' not found');
        }
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}
