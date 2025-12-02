<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <main class="single-post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- 投稿ID -->
    <p><strong>ID:</strong> <?php the_ID(); ?></p>

    <!-- 投稿日 -->
    <p><strong>投稿日:</strong> <?php echo get_the_date(); ?></p>

    <!-- タイトル -->
    <h1><?php the_title(); ?></h1>

    <!-- 本文 -->
    <div class="post-content">
      <?php the_content(); ?>
    </div>

    <!-- カテゴリー -->
    <?php
      $categories = get_the_category();
      if ($categories) :
    ?>
      <p><strong>カテゴリー:</strong>
        <?php foreach ($categories as $category) : ?>
          <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
            <?php echo esc_html($category->name); ?>
          </a>
        <?php endforeach; ?>
      </p>
    <?php endif; ?>

    <!-- タグ -->
    <?php
      $tags = get_the_tags();
      if ($tags) :
    ?>
      <p><strong>タグ:</strong>
        <?php foreach ($tags as $tag) : ?>
          <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
            <?php echo esc_html($tag->name); ?>
          </a>
        <?php endforeach; ?>
      </p>
    <?php endif; ?>

  </article>

<?php endwhile; endif; ?>

</main>

</body>
</html>
