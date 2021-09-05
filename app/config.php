<?php

// $uri = $_SERVER['REQUEST_URI'];
define('BASE_CONTEXT_PATH', $_SERVER['REQUEST_URI']);
echo BASE_CONTEXT_PATH;
// define('BASE_CONTEXT_PATH', $_SERVER['REQUEST_URI']);
// echo BASE_CONTEXT_PATH;
define('BASE_PHP_PATH', __DIR__ . "/php/");

define('GO_HOME', 'home');
define('GO_LOGIN', 'login');

define('DEBUG', true);