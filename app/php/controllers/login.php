<?php

namespace controller\login;

function get() {

  require_once BASE_PHP_PATH . "/views/login.php";
}


function post() {
  echo 'post methodを受け取りました。';
}