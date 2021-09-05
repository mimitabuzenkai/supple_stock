<footer class="footer">

  <div class="footer__wrapper">
    <div class="footer__title">
      <p>Copyright © 2020 Apple Inc. All rights reserved.</p>
    </div>
    <div class="footer__subtitle">
      <p>seigo</p>
    </div>
  </div>
</footer>
<?php
use lib\Auth;
use lib\Msg;

if (Auth::isLogin()) {
  echo 'ログイン中です。';
} else {
  echo 'ログインしていません。';
}
Msg::flush();

?>

</body>

</html>
