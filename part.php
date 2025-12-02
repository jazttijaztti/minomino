<?php
/*
 * Template Name: パート
 */
?>
<?php 
  $pageinfo['title'] = get_the_title(); 
  $pageinfo['content'] = get_the_content();
  var_dump($pageinfo);
  set_query_var('pageinfo' , $pageinfo);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <?php get_header();?>
  <div id="content">
    <main>
     本文くる
     <?php get_template_part("template-part/content" , null , $pageinfo); ?>
     <?php get_template_part("template-part/content" , "card"); ?>
     <?php get_template_part("template-part/content" , "card" , $pageinfo); ?>
    </main>
  <?php get_sidebar(); ?>
  </div>
  <?php get_footer();?>
  <?php get_footer("bottom" , $pageinfo);?>
</body>
</html>
