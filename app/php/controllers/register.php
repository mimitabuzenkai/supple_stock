<?php

namespace controller\register;

use lib\Auth;
use model\UserModel;

function get() {

  require_once BASE_PHP_PATH . "/views/register.php";
}

function post()
{

  $user = new UserModel;
  $user->name = get_param('name', '');
  $user->pwd = get_param('pwd', '');

  if (Auth::regist($user)) {
    echo '新規登録に成功しました！';
  } else {
    echo '';
  }
}
