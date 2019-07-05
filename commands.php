#!/usr/bin/env php
<?php
// application.php

require 'config.php';

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Commands\HelloWorldCommand;
use App\Commands\SendMessageCommand;

$application = new Application();

$application->add(new HelloWorldCommand());
$application->add(new SendMessageCommand());

$application->run();
