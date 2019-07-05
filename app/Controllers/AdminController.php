<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Language;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Resume;

class AdminController extends BaseController
{
    public function getAdminAction()
    {
        $resume = Resume::latest()->first();
        $jobs = Job::all();
        $projects = Project::all();
        $frontend = Skill::where('category', 1)->get();
        $backend = Skill::where('category', 2)->get();
        $frameworks = Skill::where('category', 3)->get();
        $languages = Language::all();

        return $this->renderHTML('admin.twig', [
            'resume' => $resume,
            'jobs' => $jobs,
            'projects' => $projects,
            'frontends' => $frontend,
            'backends' => $backend,
            'frameworks' => $frameworks,
            'languages' => $languages
        ]);
    }
}
