<fieldset style="width:fit-content;margin:auto;">
  <legend>會員註冊</legend>
  <span>*請設定您要註冊的帳號及密碼（最長12個字元）</span>
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
          location.href = "index.php?do=login";
        }
      })
    }
  }
</script>