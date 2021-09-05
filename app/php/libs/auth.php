<?php

namespace lib;

use db\UserQuery;
use model\UserModel;

class Auth
{

  public static function login($name, $pwd)
  {

    $is_success = false;

    $user = UserQuery::fetchById($name);

    if (!empty($user)) {

      if (password_verify($pwd, $user->pwd)) {

        $is_success = true;
        UserModel::setSession($user);
        
      } else {
        echo 'パスワードが間違えています！';
      }
    } else {
      echo 'ユーザーが見つかりません。';
    }

    return $is_success;
  }

  public static function regist($user)
  {

    $is_success = false;

    $exist_user = UserQuery::fetchById($user->name);

    if (!empty($exist_user)) {

      echo 'ユーザーが既に存在します！';
      return false;
    }

    $is_success = UserQuery::insert($user);

    if ($is_success) {
      UserModel::setSession($user);
    }

    return $is_success;
  }

  // ログインしてるか確認 true　は　ログイン
  public static function isLogin()
  {

    $user = UserModel::getSession();

    if (isset($user)) {
      return true;
    } else {
      return false;
    }
  }
}
