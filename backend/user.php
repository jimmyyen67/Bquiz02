<fieldset style="width:fit-content;margin:auto;">
  <legend>帳號管理</legend>
  <form>
    <table style="margin:auto;">
      <tr class="ct clo">
        <td style="width:40%;">密碼</td>
        <td style="width:40%;">帳號</td>
        <td style="width:20%;">刪除</td>
      </tr>
      <?php
      $users = $User->all();
      foreach ($users as $k => $u) {
      ?>
        <tr class="ct">
          <td><?= $u['acc'] ?></td>
          <td><?= str_repeat("*", strlen($u['pwd'])) ?></td>
          <td><input type="checkbox" name="del" value="<?= $u['id'] ?>"></td>
        </tr>
      <?php
      }
      ?>
    </table>
    <div class="ct"><input type="button" value="確定刪除" onclick="userdelete()"><input type="reset" value="清空選取"></div>
  </form>

  <h2>新增會員</h2>
  <form>
    <table>
      <tr>
        <td>Step1:登入帳號</td>
        <td><input type="text" name="acc" id="acc" autofocus="true"></td>
      </tr>
      <tr>
        <td>Step2:登入密碼</td>
        <td><input type="password" name="pwd" id="pwd"></td>
      </tr>
      <tr>
        <td>Step3:再次確認密碼</td>
        <td><input type="password" name="pwd2" id="pwd2"></td>
      </tr>
      <tr>
        <td>Step4:信箱(忘記密碼時使用)</td>
        <td><input type="text" name="email" id="email"></td>
      </tr>
    </table>
    <div><input type="button" value="註冊" onclick="reg()"><input type="reset" value="清除"></div>
  </form>
</fieldset>



<script>
  function userdelete() {
    var checked = [];
    $.each($("input[name='del']:checked"), function() {
      checked.push($(this).val());
    });
    $.post("api/del.php", {
      checked
    }, (res) => {
      location.href = "admin.php?do=user";
    })
  }
  function reg() {
    let acc = $("#acc").val();
    let pwd = $("#pwd").val();
    let pwd2 = $("#pwd2").val();
    let email = $("#email").val();
    if (acc == "" || pwd == "" || pwd2 == "" || email == "") {
      alert("不可空白");
    } else if (pwd != pwd2) {
      alert("密碼錯誤");
    } else {
      $.post("api/reg.php", {
        acc,
        pwd,
        email
      }, (res) => {
        if (res == 0) {
          console.log(res);
          alert("帳號重複");
        } else if (res == 1) {
          alert("註冊完成，歡迎加入");
          location.href = "?do=user";
        }
      })
    }
  }
</script>