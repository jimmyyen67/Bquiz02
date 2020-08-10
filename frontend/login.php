<style>
  fieldset {
    width: fit-content;
    margin: auto;
  }
</style>
<div class="ct">
  <fieldset>
    <legend>會員登入</legend>
    <form>
      <table>
        <tr>
          <td>帳號</td>
          <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
          <td>密碼</td>
          <td><input type="password" name="pwd" id="pwd"></td>
        </tr>
      </table>
      <div class="ct"><input type="button" value="登入" onclick="login()"><input type="reset" value="清除">
    </form>
    <a href="?do=forget">忘記密碼</a>
    |
    <a href="?do=reg">尚未註冊</a>
</div>
</fieldset>
</div>


<script>
  function login() {
    let acc = $("#acc").val();
    let pwd = $("#pwd").val();
    $.post("api/check_acc.php", {
      acc
    }, (res) => {
      if (res == 0) {
        // 帳號輸入錯誤
        alert("查無帳號");
        location.href = "index.php?do=login";
      } else {
        // 帳號輸入正確
        $.post("api/check_pwd.php", {
          acc,
          pwd
        }, (res) => {
          if (res == 0) {
            // 密碼錯誤
            alert("密碼錯誤");
            location.href = "index.php?do=login";
          } else {
            // 密碼正確
            if (acc == 'admin') {
              location.href = "admin.php";
            } else {
              location.href = "index.php";
            }
          }
        })
      }
    })
  }
</script>