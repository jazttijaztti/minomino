<?php
/*
 * Template Name:お問合せ
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <form action="<?= home_url().'/otoiawase_exe'?>" method="post">
   名前<input type="text" name="username"><br>
   メール<input type="text" name="email"><br>
   番号<input type="text" name="tel"><br>
   <input type="submit" value="送信">


  </form>
</body>
</html>
