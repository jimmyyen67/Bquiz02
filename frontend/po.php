<style>
  .main {
    height: 100%;
    width: 100%;
    position: relative;
  }

  fieldset {
    display: inline-block;
    position: absolute;
  }

  fieldset a {
    display: block;
    padding: .5rem;
  }

  .title {
    cursor: pointer;
    color: #999;
  }

  .title:hover {
    color: #111;
  }
</style>
<?php
$type = $_GET['type'];
switch ($_GET['type']) {
  case 1:
    $list = "健康新知";
    break;
  case 2:
    $list = "菸害防制";
    break;
  case 3:
    $list = "癌症防治";
    break;
  case 4:
    $list = "慢性病防治";
    break;
}
?>
<h4>目前位置：首頁 > 分類網誌 > <?= $list ?></h4>
<div class="main">
  <fieldset>
    <legend>分類網誌</legend>
    <a href="?do=po&type=1">健康新知</a>
    <a href="?do=po&type=2">菸害防制</a>
    <a href="?do=po&type=3">癌症防治</a>
    <a href="?do=po&type=4">慢性病防治</a>
  </fieldset>
  <fieldset style="width:78%;left:17%;">
    <legend>文章列表</legend>
    <div id="content" style="height:380px;overflow:auto;padding:1.5remp;">
      <?php
      $titles = $News->all(['sh' => 1, 'type' => $type]);
      foreach ($titles as $k => $t) {
      ?>
        <h6 class="title" onclick="opost(<?= $t['id'] ?>)"><?= $t['title'] ?></h6>
      <?php
      }
      ?>
    </div>
  </fieldset>
</div>
<script>
  function opost(id) {
    $.get("api/get_post.php", {
      id
    }, (res) => {
      $("#content").html(res);
    })
  }
</script>