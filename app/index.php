<?php

require_once "config.php";


require_once BASE_PHP_PATH . "libs/helper.php";
require_once BASE_PHP_PATH . "libs/auth.php";
require_once BASE_PHP_PATH . "libs/router.php";

require_once BASE_PHP_PATH . "models/abstract.model.php";
require_once BASE_PHP_PATH . "models/user.model.php";

require_once BASE_PHP_PATH . "libs/message.php";

require_once BASE_PHP_PATH . "db/datasource.php";
require_once BASE_PHP_PATH . "db/user.query.php";

use function lib\route;

session_start();

try {


  require_once BASE_PHP_PATH . "partials/header.php";
  
  $rpath = str_replace("/sup/app/", '', $_SERVER['REQUEST_URI']);
  
  $method = strtolower($_SERVER['REQUEST_METHOD']);
  
  route($rpath, $method);

  require_once BASE_PHP_PATH . "partials/footer.php";

} catch (Throwable $e) {

  die('<h1 class="text-secondary">重大な障害が発生しております。</h1>');
}


