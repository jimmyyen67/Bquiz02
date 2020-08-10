<?php
include_once "../base.php";
$acc = $_POST['acc'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$data = $User->find(['acc' => $acc]);
if (empty($data)) {
  $data['acc'] = $acc;
  $data['pwd'] = $pwd;
  $data['email'] = $email;
  $User->save($data);
  echo 1;
} else {
  echo 0;
}
