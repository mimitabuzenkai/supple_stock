<?php

namespace lib;
use Throwable;
use Error;
use lib\Msg;

function route($rpath, $method)
{
  try {

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

  } catch (Throwable $e) {

    Msg::push(Msg::DEBUG, $e->getMessage());
    Msg::push(Msg::DEBUG, '<h1 class="text-danger">サーバーに障害が発生しております。</h1>');
    // redirect('404');
    require_once BASE_PHP_PATH . "views/404.php";
  }
  
}
