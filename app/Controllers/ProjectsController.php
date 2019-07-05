<?php

namespace App\Controllers;

use App\Models\Project;
use App\Models\ProjectTechnology;
use Respect\Validation\Validator as v;
use Aura\Router\Exception;

class ProjectsController extends BaseController
{
    public function getAddProjectAction()
    {
        return $this->renderHTML('addProject.twig');
    }

    public function postAddProjectAction($request)
    {
        $data = $request->getParsedBody();

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        try {
            $project->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $technologies = [];
        for ($i = 1; $i < 4; $i++) {
            $name = "technology" . $i;
            if ($data[$name] != null)
                $technologies[$i - 1] = $data[$name];
        }

        $project_id = Project::where('title', $data['title'])->first()->id;

        foreach ($technologies as $technology) {
            $projectTecnology = new ProjectTechnology();
            $projectTecnology->title = strtoupper($technology);
            $projectTecnology->project_id = (int)$project_id;
            $projectTecnology->save();
            echo "Proyecto guardado con éxito";
        }

        return $this->renderHTML('addProject.twig');
    }
}
