<fieldset style="width:fit-content;margin:auto;padding:2rem;">
  <span>請輸入信箱以查詢密碼</span><br>
  <input type="text" name="email" id="email"><br>
  <span id="ans"></span><br>
  <input type="button" value="尋找" onclick="search()">
</fieldset>

<script>
  function search() {
    let email = $("#email").val();
    $.post("api/forget.php", {
      email
    },(res) => {
      $("#ans").text(res);
    })
  }
</script>