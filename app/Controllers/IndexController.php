<?php

namespace App\Controllers;

use App\Models\Job;

class IndexController extends BaseController
{
    public function getIndexAction()
    {
        $jobs = Job::all();
        echo 'Yes';
        return $this->renderHTML('index.twig');
    }
    public function getError404Action()
    {
        require '../resources/views/error404.php';
    }
}
