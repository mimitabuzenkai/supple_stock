<?php

require_once "config.php";


require_once BASE_PHP_PATH . "libs/helper.php";
require_once BASE_PHP_PATH . "libs/auth.php";

require_once BASE_PHP_PATH . "models/abstract.model.php";
require_once BASE_PHP_PATH . "models/user.model.php";

require_once BASE_PHP_PATH . "libs/message.php";

require_once BASE_PHP_PATH . "db/datasource.php";
require_once BASE_PHP_PATH . "db/user.query.php";

session_start();


require_once BASE_PHP_PATH . "partials/header.php";
require_once BASE_PHP_PATH . "partials/footer.php";

$rpath = str_replace("/sup/app/", '', $_SERVER['REQUEST_URI']);

$method = strtolower($_SERVER['REQUEST_METHOD']);

route($rpath, $method);

function route($rpath, $method)
{
  
  if ($rpath === '') {
    $rpath = 'home';
  }
  
  $targetFile = BASE_PHP_PATH . "controllers/{$rpath}.php";
  
  if (!file_exists($targetFile)) {
    require_once BASE_PHP_PATH . "views/404.php";
    return;
  }
  
  require_once $targetFile;
  
  $fn = "\\controller\\{$rpath}\\{$method}";
  
  $fn();
}


?>