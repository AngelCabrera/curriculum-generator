<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\Language;

class IndexController extends BaseController
{
    public function getIndexAction()
    {
        $jobs = Job::all();
        $projects = Project::latest()->get();
        $resume = Resume::latest()->first()->content;
        $frontends = Skill::where('category', 1)->get();
        $backends = Skill::where('category', 2)->get();
        $frameworks = Skill::where('category', 3)->get();
        $languages = Language::all();

        return $this->renderHTML('index.twig', [
            'jobs' => $jobs,
            'projects' => $projects,
            'resume' => $resume,
            'frontends' => $frontends,
            'backends' => $backends,
            'frameworks' => $frameworks,
            'languages' => $languages
        ]);
    }
    public function getError404Action()
    {
        return $this->renderHTML('error.twig');
    }
}
