<?php

namespace controller\logout;
use lib\Msg;
use lib\Auth;

function get() {

  if(Auth::logout()) {
    Msg::push(Msg::INFO, 'ログアウトに成功しました。');

  } else {

    Msg::push(Msg::ERROR, 'ログアウトが失敗しました。');
  }

  redirect(GO_HOME);
}