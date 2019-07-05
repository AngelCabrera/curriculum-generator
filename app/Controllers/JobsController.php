<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\JobAchievement;
use Respect\Validation\Validator as v;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class JobsController extends BaseController
{
    public function getAddJobAction()
    {
        return $this->renderHTML('addJob.twig');
    }

    public function postAddJobAction(ServerRequest $request)
    {
        $data = $request->getParsedBody();
        
        $files = $request->getUploadedFiles();
        $fullPath = '';
        $logo = $files['logo'];
        if($logo->getError() == UPLOAD_ERR_OK) {
            $filename = $logo->getClientFilename();
            $fullPath = "uploads/$filename";

            $logo->moveTo($fullPath);
        }
        
        
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
            $job->url = $fullPath;

            try {
                $job->save();
                
            } catch (Exception $e) {
                echo 'Error: ', $e->getMessage(), "\n";
            }
        } else
            echo 'Imposible guardar, verifica que los datos cumplan con los requerimientos';

        $achievements = [];
        for ($i = 1; $i < 4; $i++) {
            $name = "achievement" . $i;
            if ($data[$name] != null)
                $achievements[$i - 1] = $data[$name];
        }

        $job_id = Job::where('title', $data['title'])->first()->id;

        foreach ($achievements as $achievement) {
            $achieve = new JobAchievement;
            $achieve->description = $achievement;
            $achieve->job_id = $job_id;
            try {
                $achieve->save();
                
            } catch (Exception $e) {
                echo 'Error: ', $e->getMessage(), "\n";
            }
        }
        echo 'Añadido con éxito a la base de datos';
        return $this->renderHTML('addJob.twig');
    }
    
    public function deleteJobAction(ServerRequest $request){
        $params = $request->getQueryParams();
        $id = $params['id'];
        $job = Job::findOrFail($id);
        $job->delete();
        return new RedirectResponse('/curriculum-generator/admin');
    }
}