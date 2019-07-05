<?php

require_once('vendor/autoload.php');

use Aura\Router\RouterContainer;

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/curriculum-generator/', [
     'App\Controllers\IndexController',
     'getIndexAction'
]);

$map->get('getAddJob', '/curriculum-generator/jobs/add', [
     'App\Controllers\JobsController',
     'getAddJobAction'
]);

$map->post('postAddJob', '/curriculum-generator/jobs/add', [
     'App\Controllers\JobsController',
     'postAddJobAction'
]);

$map->get('deleteJob', '/curriculum-generator/jobs/delete', [
     'App\Controllers\JobsController',
     'deleteJobAction'
]);

$map->get('getAddProject', '/curriculum-generator/projects/add', [
     'App\Controllers\ProjectsController',
     'getAddProjectAction'
]);

$map->post('postAddProject', '/curriculum-generator/projects/add', [
     'App\Controllers\ProjectsController',
     'postAddProjectAction'
]);

$map->get('getAddResume', '/curriculum-generator/resume/add', [
     'App\Controllers\ResumeController',
     'getAddResumeAction'
]);

$map->post('postAddResume', '/curriculum-generator/resume/add', [
     'App\Controllers\ResumeController',
     'postAddResumeAction'
]);

$map->get('getAddSkill', '/curriculum-generator/skills/add', [
     'App\Controllers\SkillsController',
     'getAddSkillsAction'
]);

$map->post('postAddSkill', '/curriculum-generator/skills/add', [
     'App\Controllers\SkillsController',
     'postAddSkillsAction'
]);

$map->get('getAddLanguage', '/curriculum-generator/languages/add', [
     'App\Controllers\LanguagesController',
     'getAddLanguagesAction'
]);

$map->post('postAddLanguage', '/curriculum-generator/languages/add', [
     'App\Controllers\LanguagesController',
     'postAddLanguagesAction'
]);

$map->get('getAdmin', '/curriculum-generator/admin', [
     'App\Controllers\AdminController',
     'getAdminAction'
]);

$map->get('contactForm', '/curriculum-generator/contact', [
     'App\Controllers\ContacController',
     'getContactAction'
]);

$map->post('contactSend', '/curriculum-generator/contact/send', [
     'App\Controllers\ContacController',
     'postContactAction'
]);