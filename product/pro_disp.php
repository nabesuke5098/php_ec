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
      $pro_code = $_GET['procode'];
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT name, price, gazou FROM mst_product WHERE code=?';
      $stmt = $dbh -> prepare($sql);
      $data[] = $pro_code;
      $stmt -> execute($data);

      $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
      $pro_name = $rec['name'];
      $pro_price = $rec['price'];
      $pro_gazou_name = $rec['gazou'];

      $dbh = null;

      if($pro_gazou_name == '')
      {
        $disp_gazou = '';
      }
      else{
        $disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">';
      }

      } catch (\Exception $e) {
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
      }
      ?>

      商品情報参照<br/>
      <br/>
      商品コード<br/>
      <?php print $pro_code; ?>
      <br/>
      <?php print $pro_name; ?>
      <br/>
      <?php print $disp_gazou; ?>
      <br/>
        <input type="button" onclick="history.back()" value="戻る">
      </form>

  </body>
</html>
