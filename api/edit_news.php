<?php
include_once "../base.php";


if (!empty($_POST['id'])) {
  foreach ($_POST['id'] as $k => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
      $News->del($id);
    } else {
      $data = $News->find($id);
      $data['sh'] = (!empty($_POST['sh']) && in_array($id, $_POST['sh'])) ? "1" : "0";
      $News->save($data);
    }
  }
}
to("../admin.php?do=news");
