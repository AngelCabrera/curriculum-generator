<?php

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'curriculum',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

if ($_POST) {
    $data = $_POST;

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
}
require_once '../resources/views/addJob.php';
