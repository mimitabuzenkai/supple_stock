<?php

function get_param($key, $default_val, $is_post = true)
{
  $arry = $is_post ? $_POST : $_GET;
  return $arry[$key] ?? $default_val;
}

function redirect($path)
{
  if ($path === GO_HOME) {
    $path = '';
  } else if ($path === GO_LOGIN) {

    $path = 'login';
  }
  header("Location: /sup/app/{$path}");
  die();
}

function is_alnum($val) {

  return preg_match("/^[a-zA-Z0-9]+$/", $val);
}