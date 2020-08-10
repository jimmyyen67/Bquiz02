<?php
include_once "../base.php";
$delist = $_POST['checked'];
foreach ($delist as $k => $id) {
  $User->del($id);
}
