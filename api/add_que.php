<?php
include_once "../base.php";

$data['text'] = $_POST['title'];
$Que->save($data);
$title = $Que->find(['text' => $data['text']]);
$parent = $title['id'];


foreach ($_POST['opt'] as $k => $o) {
  $data['text'] = $o;
  $data['parent'] = $parent;
  $Que->save($data);
}

to("../admin.php?do=que");
