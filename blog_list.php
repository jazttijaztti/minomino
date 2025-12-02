<?php
// 記事一覧の取得設定
$args = [
  'post_type'      => 'post',     // 投稿タイプ
  'posts_per_page' => 10,         // 1ページあたりの件数
  'orderby'        => 'date',     // 並び順の基準
  'order'          => 'DESC'      // 新しい順
];

// WP_Queryを実行
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
  <div class="post-list">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <article class="post-item">
        <h2 class="post-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div>
          <?php echo SCF::get('author',get_the_ID()); ?>
          <?php $image_id =  SCF::get('catch_image'); ?>
          <img src="<?php echo wp_get_attachment_image_url($image_id);?>">
          <?php $external_sites = SCF::get('external_sites'); 
          foreach($external_sites as $key=> $val) {
            echo $val["external_site"];   ?>      
            <img src="<?php echo wp_get_attachment_image_url( $val["external_site_image"]);?>"> 
<?php }
          ?>
          
        </div>
        <div class="post-meta">
          <span class="post-date"><?php echo get_the_date('Y.m.d'); ?></span>
          <span class="post-category"><?php the_category(', '); ?></span>
        </div>
        <div class="post-excerpt">
          <?php the_excerpt(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
著者:author 
キャッチ画像 catch_image
繰り返しexternal_sites 
    タイトル external_site
    画像     external_site_image
  <!-- ページネーション -->
  <div class="pagination">
    <?php
    the_posts_pagination([
      'mid_size'  => 2,
      'prev_text' => '« 前へ',
      'next_text' => '次へ »',
    ]);
    ?>
  </div>

<?php else : ?>
  <p>記事が見つかりませんでした。</p>
<?php endif;

// クエリのリセット（重要）
wp_reset_postdata();
?>

