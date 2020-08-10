<?php
include_once "../base.php";
$acc = $_POST['acc'];
if (!empty($User->find(['acc' => $acc]))) {
  echo 1;
} else {
  echo 0;
}
