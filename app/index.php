index

<?php

require_once "config.php";

require_once BASE_PHP_PATH . "partials/header.php";

if ($_SERVER['REQUEST_URI'] === '/sup/app/login') {
  require_once BASE_PHP_PATH .  "views/login.php";
}
require_once BASE_PHP_PATH . "partials/footer.php";

$rpath = str_replace("/sup/app/", '', $_SERVER['REQUEST_URI']);
$method = strtolower($_SERVER['REQUEST_METHOD']);

route($rpath, $method);

function route($rpath)
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
}


?>