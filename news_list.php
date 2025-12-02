<?php
/*
 * Template Name: ニュース一覧
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
 ニュース一覧です
 <?php
/* 
Template Name: ニュース一覧 
*/
get_header(); ?>

<div class="news-list">

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = [
    'post_type' => 'news',
    'posts_per_page' => 10,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC'
];

$query = new WP_Query($args);

if ($query->have_posts()) : 
    while ($query->have_posts()) : $query->the_post(); ?>

        <article class="news-item">
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>

            <p class="news-date"><?php echo get_the_date(); ?></p>

            <?php if (has_post_thumbnail()) : ?>
                <div class="news-thumb">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
            <?php endif; ?>

            <div class="news-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </article>

    <?php endwhile; ?>

    <!-- ページネーション -->
    <div class="pagination">
        <?php
        echo paginate_links([
            'total' => $query->max_num_pages,
            'current' => $paged
        ]);
        ?>
    </div>

<?php
else :
    echo '<p>ニュースがありません。</p>';
endif;
wp_reset_postdata();
?>

</div>

<?php get_footer(); ?>


</body>
</html>
