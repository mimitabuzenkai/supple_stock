<?php

namespace controller\login;

use db\UserQuery;
use lib\Auth;
use lib\Msg;

function get()
{

  require_once BASE_PHP_PATH . "/views/login.php";
}

function post()
{
  $name = get_param('name', '');
  $pwd = get_param('pwd', '');

  Msg::push(Msg::DEBUG, 'デバックメッセージ');

  if (Auth::login($name, $pwd)) {
    Msg::push(Msg::INFO, '認証成功');
    redirect(GO_HOME);
  } else {
    Msg::push(Msg::ERROR, '認証失敗');
    redirect(GO_LOGIN);
  }
}
