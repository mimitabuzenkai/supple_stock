<?php

namespace model;

class UserModel extends AbstractModel {
  public int $id;
  public string $pwd;
  public string $name;

  protected static $SESSION_NAME = '_user';
}