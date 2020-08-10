<fieldset>
  <legend>新增問卷</legend>
  <form action="api/add_que.php" method="post">
    <table>
      <tr id="quename">
        <td class="clo" colspan="2">問卷名稱</td>
        <td><input type="text" name="title"></td>
      </tr>
      <tr>
        <td class="clo">選項</td>
        <td><input type="text" name="opt[]"><input type="button" value="更多" onclick="more()"></td>
      </tr>
    </table>
    <div>
      <input type="submit" value="新增">|<input type="reset" value="清空">
    </div>
  </form>
</fieldset>
<script>
  function more() {
    let input = `
    <tr>
      <td class="clo">選項</td>
      <td><input type="text" name="opt[]"></td>
    </tr>
    `
    $("#quename").after(input);
  }
</script>