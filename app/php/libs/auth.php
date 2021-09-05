<?php

namespace lib;

use Throwable;
use db\UserQuery;
use model\UserModel;

class Auth
{

  public static function login($name, $pwd)
  {
    try {

      if(!(UserModel::ValidateName($name)
      * UserModel::validatePwd($pwd))) {
        return false;
      }

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
    } catch (Throwable $e) {
      $is_success = false;

      Msg::push(Msg::DEBUG, $e->getMessage());
      Msg::push(Msg::ERROR, 'ログイン処理でエラーが発生しました。');
      redirect('404');
    }



    return $is_success;
  }

  public static function regist($user)
  {

    try {

      if(!($user->isValidName()
      * $user->isValidPwd())) {
        return false;
      }

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
    } catch (Throwable $e) {

      $is_success = false;

      Msg::push(Msg::DEBUG, $e->getMessage());
      Msg::push(Msg::ERROR, 'ユーザー登録でエラーが発生しました。');
    }




    return $is_success;
  }

  // ログインしてるか確認 true　は　ログイン
  public static function isLogin()
  {
    try {

      $user = UserModel::getSession();
    } catch (Throwable $e) {

      $user = UserModel::clearSession();

      $is_success = false;
      Msg::push(Msg::DEBUG, $e->getMessage());
      Msg::push(Msg::ERROR, 'エラーが発生しました。再度、ログインしてください。');
      return false;
    }


    if (isset($user)) {
      return true;
    } else {
      return false;
    }
  }
}
