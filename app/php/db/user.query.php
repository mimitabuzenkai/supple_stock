<?php

namespace db;

use db\DataSource;
use model\UserModel;

class UserQuery
{

  public static function fetchById($name)
  {

    $db = new DataSource();
    $sql = 'select * from users where name = :name;';
    $result = $db->selectOne($sql, [
      ':name' => $name
    ], DataSource::CLS, UserModel::class);

    return $result;
  }

  public static function insert($user)
  {

    $db = new DataSource();
    $sql = 'insert into users (name, pwd) values (:name, :pwd)';

    $user->pwd = password_hash($user->pwd, PASSWORD_DEFAULT);

    return $db->execute($sql, [
      ':name' => $user->name,
      ':pwd' => $user->pwd
    ]);
  }
}
