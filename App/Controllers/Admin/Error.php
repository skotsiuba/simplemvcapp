<?php

namespace App\Controllers\Admin;

use App\Controller;

/**
 * Class Error
 * @package App\Controllers\Admin
 */
class Error extends Controller
{
    /**
     * @return void
     */
    protected function handle()
    {
        $this->view->message = $this->data['message'];
        $this->view->display(__DIR__ . '/../../../templates/admin/error.php');
    }
}
