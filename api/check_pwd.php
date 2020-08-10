<?php
include_once "../base.php";
$acc = $_POST['acc'];
$pwd = $_POST['pwd'];
if (!empty($User->find(['acc' => $acc, 'pwd' => $pwd]))) {
  $_SESSION['login'] = $acc;
  echo 1;
} else {
  echo 0;
}
