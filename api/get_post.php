<?php
include_once "../base.php";
$id = $_GET['id'];
$post = $News->find($id);
echo "<pre>";
echo $post['text'];
echo "</pre>";
