<?php get_header(); ?>

<div class="news-single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="news-content">

            <!-- タイトル -->
            <h1 class="news-title"><?php the_title(); ?></h1>

            <!-- 日付 -->
            <p class="news-date"><?php echo get_the_date(); ?></p>

            <!-- カテゴリー -->
            <div class="news-category">
                <?php
                $terms = get_the_terms(get_the_ID(), 'news_category');
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo '<span class="cat">' . esc_html($term->name) . '</span>';
                    }
                }
                ?>
            </div>

            <!-- タグ -->
            <div class="news-tags">
                <?php the_terms(get_the_ID(), 'news_tag', '<span>タグ: </span>', ', '); ?>
            </div>

            <!-- アイキャッチ -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="news-thumb">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- 本文 -->
            <div class="news-body">
                <?php the_content(); ?>
            </div>

        </article>

        <!-- 前後の記事ナビ -->
        <div class="news-nav">
            <div class="prev"><?php previous_post_link('%link', '← 前の記事'); ?></div>
            <div class="next"><?php next_post_link('%link', '次の記事 →'); ?></div>
        </div>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>

