<?php

namespace App\Controllers;

use App\Models\Job;

class JobsController extends BaseController
{
    public function getAddJobAction()
    {
        require '../resources/views/addJob.php';
    }

    public function postAddJobAction($request)
    {
        $data = $request->getParsedBody();
        $job = new Job();
        $job->title = $data['title'];
        $job->description = $data['description'];
        $job->months = $data['months'];

        try {
            $job->save();
            echo 'Añadido con éxito a la base de datos';
        } catch (Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n";
        }
        require '../resources/views/addJob.php';
    }
}
