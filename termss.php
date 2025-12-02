<?php
/*
 * Template Name: 利用規約
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  利用規約ですよ
  <?php the_title(); ?>
  <?php the_content(); ?>
  <?php the_excerpt(); ?>
  <?php the_permalink(); ?>
  <?php the_ID();?>
  <img src="<?= get_the_post_thumbnail_url(); ?>">
</body>
</html>
