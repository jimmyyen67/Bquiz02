<?php
include_once "../base.php";
$email = $_POST['email'];
$user = $User->find(['email' => $email]);
if (!empty($user)) {
  // 有找到該email帳號
  echo "您的密碼為：" . $user['pwd'];
} else {
  // 沒找到該email
  echo "查無此帳號";
}
