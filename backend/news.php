<style>
  td {
    padding: 1rem;
  }

  .divpage {
    position: absolute;
    left: 50%;
    bottom: 0%;
    transform: translateX(-50%);
  }

  .divpage a {
    padding: .3rem 1rem;
    border: 2px solid #222;
    margin-bottom: 1rem;
  }
</style>
<form action="api/edit_news.php" method="post">
  <table style="width:100%;">
    <tr class="ct clo">
      <td style="width:5%;">編號</td>
      <td style="width:65%;">標題</td>
      <td style="width:15%;">顯示</td>
      <td style="width:15%;">刪除</td>
    </tr>
    <?php
    $per = 3;
    $total  = $News->count();
    $pages = ceil($total / $per);
    $now = (empty($_GET['p'])) ? 1 : $_GET['p'];
    $start = ($now - 1) * $per;
    $news = $News->all([], " limit $start, $per");
    foreach ($news as $k => $n) {
    ?>
      <tr class="ct">
        <td style="width:10%;"><?= $start + $k + 1 ?>.</td>
        <td style="width:60%;"><?= $n['title'] ?></td>
        <td style="width:15%;"><input type="checkbox" name="sh[]" value="<?= $n['id'] ?>" <?= ($n['sh'] == 1) ? "checked" : "" ?>></td>
        <td style="width:15%;"><input type="checkbox" name="del[]" value="<?= $n['id'] ?>"></td>
        <input type="hidden" name="id[]" value="<?= $n['id'] ?>">
      </tr>
    <?php
    }
    ?>
  </table>
  <div class="ct divpage">
    <?php
    if ($now - 1 > 0) {
    ?>
      <a href="?do=news&p=<?= $now - 1 ?>">＜</a>
    <?php
    }
    for ($i = 1; $i <= $pages; $i++) {
      $size = ($now == $i) ? "20px" : "15px";
    ?>
      <a href="?do=news&p=<?= $i ?>" style="font-size:<?= $size ?>;"><?= $i ?></a>
    <?php
    }
    if ($now + 1 <= $pages) {
    ?>
      <a href="?do=news&p=<?= $now + 1 ?>">＞</a>
    <?php
    }
    ?>
    <br><input type="submit" value="確定修改">
  </div>
</form>