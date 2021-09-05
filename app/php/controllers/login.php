<?php

namespace controller\login;

use db\UserQuery;
use lib\Auth;

function get()
{

  require_once BASE_PHP_PATH . "/views/login.php";
}

function post()
{
  $name = get_param('name', '');
  $pwd = get_param('pwd', '');

  if (Auth::login($name, $pwd)) {
    echo '認証成功';
  } else {
    echo '';
  }
}
