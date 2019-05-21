<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>なべしま農園</title>
  </head>
  <body>
    <?php
    try {
      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $staff_code = $_GET['staffcode'];
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT code, name FROM mst_staff WHERE code=?';
      $stmt = $dbh -> prepare($sql);
      $data[] = $staff_code;
      $stmt -> execute($data);

      $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
      $staff_name = $rec['name'];

      $dbh = null;

      } catch (\Exception $e) {
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
      }
      ?>

      スタッフ情報参照<br/>
      <br/>
      スタッフコード<br/>
      <?php print $staff_code; ?>
      <br/>
      <?php print $staff_name; ?>
      <br/>
      <br/>
        <input type="button" onclick="history.back()" value="戻る">
      </form>

  </body>
</html>
