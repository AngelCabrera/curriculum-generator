<?php

require_once('vendor/autoload.php');

use Aura\Router\RouterContainer;

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/curriculum-generator/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'getIndexAction'
]);

$map->get('getAddJob', '/curriculum-generator/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);

$map->post('postAddJob', '/curriculum-generator/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'postAddJobAction'
]);

$map->get('getAddProject', '/curriculum-generator/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);

$map->post('postAddProject', '/curriculum-generator/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'postAddProjectAction'
]);

$map->get('getAddResume', '/curriculum-generator/resume/add', [
    'controller' => 'App\Controllers\ResumeController',
    'action' => 'getAddResumeAction'
]);

$map->post('postAddResume', '/curriculum-generator/resume/add', [
    'controller' => 'App\Controllers\ResumeController',
    'action' => 'postAddResumeAction'
]);

$map->get('getAddSkill', '/curriculum-generator/skills/add', [
    'controller' => 'App\Controllers\SkillsController',
    'action' => 'getAddSkillsAction'
]);

$map->post('postAddSkill', '/curriculum-generator/skills/add', [
    'controller' => 'App\Controllers\SkillsController',
    'action' => 'postAddSkillsAction'
]);

$map->get('getAddLanguage', '/curriculum-generator/languages/add', [
    'controller' => 'App\Controllers\LanguagesController',
    'action' => 'getAddLanguagesAction'
]);

$map->post('postAddLanguage', '/curriculum-generator/languages/add', [
    'controller' => 'App\Controllers\LanguagesController',
    'action' => 'postAddLanguagesAction'
]);

$map->get('getAdmin', '/curriculum-generator/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getAdminAction'
]);
