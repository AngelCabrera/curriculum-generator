<?php

namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController
{
    public function getAddJobAction()
    {
        return $this->renderHTML('addJob.twig');
    }

    public function postAddJobAction($request)
    {
        $data = $request->getParsedBody();
        $stringValidator = v::stringType()
            ->notEmpty()
            ->length(5, null);
        $numValidator = v::numeric()->length(0, 3);

        if (
            $stringValidator->validate($data['title'])
            && $stringValidator->validate($data['description'])
            && $numValidator->validate($data['months'])
        ) {
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
        } else
            echo 'Imposible guardar, verifica que los datos cumplan con los requerimientos';

        return $this->renderHTML('addJob.twig');
    }
}
