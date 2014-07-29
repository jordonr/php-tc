#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use Command\MainCommand;

$app = new MainCommand();
$app->start();
