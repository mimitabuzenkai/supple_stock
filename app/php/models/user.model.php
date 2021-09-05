<?php

namespace model;

use lib\Msg;

class UserModel extends AbstractModel
{
  public int $id;
  public string $name;
  public string $pwd;

  protected static $SESSION_NAME = '_user';

  public function isValidName()
  {
    return static::validateName($this->name);
  }

  public static function validateName($val)
  {
    $res = true;

    // 名前が入力されているか？
    if (empty($val)) {
      Msg::push(Msg::ERROR, '名前を入力してください。');
      $res = false;
    } else {

      // 文字列の長さをチェックする。
      if (mb_strlen($val) > 15) {
        Msg::push(Msg::ERROR, '名前は１５桁以下で入力してください。');
        $res = false;
      }
    }

    return $res;
  }

  public function isValidPwd()
  {
    return static::validatePwd($this->pwd);
  }

  public static function validatePwd($val)
  {
    $res = true;

    // パスワードが入力されているか？
    if (empty($val)) {
      Msg::push(Msg::ERROR, 'パスワードを入力してください。');
      $res = false;

    } else {

      // パスワードの長さは４桁以上か？
      if (strlen($val) < 4 || strlen($val) > 8) {
        Msg::push(Msg::ERROR, 'パスワードは４桁以上で入力してください。');
        $res = false;
      }

      if (strlen($val) > 8) {
        Msg::push(Msg::ERROR, 'パスワードは８桁以下で入力してください。');
        $res = false;
      }
      // パスワードは半角英数字か？
      if (!is_alnum($val)) {
        Msg::push(Msg::ERROR, 'パスワードは半角英数で入力してください。');
        $res = false;
      }
    }

    return $res;
  }
}
