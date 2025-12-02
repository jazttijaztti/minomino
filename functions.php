<?php
//コメント
add_theme_support('post-thumbnails');

/* =========================================
 * カスタム投稿タイプ：ニュース
 * ========================================= */
function create_post_type_news() {

    $labels = [
        'name'               => 'みのりんニュース',
        'singular_name'      => 'ニュース',
        'add_new'            => '新規追加',
        'add_new_item'       => 'ニュースを追加',
        'edit_item'          => 'ニュースを編集',
        'new_item'           => '新しいニュース',
        'view_item'          => 'ニュースを見る',
        'search_items'       => 'ニュースを検索',
        'not_found'          => 'ニュースが見つかりません',
        'not_found_in_trash' => 'ゴミ箱にニュースはありません',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 4,          // ←メニュー順序（好きに変更可）
        'menu_icon' => 'dashicons-admin-site',
        'has_archive' => true,
        'rewrite' => ['slug' => 'news'], // ←URLスラッグ（変更OK）
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        //'show_in_rest' => true, // Gutenberg / REST API対応
    ];
    register_post_type('news', $args);

    /* ============================
     * タクソノミー：ニュースカテゴリー
     * ============================ */
    register_taxonomy(
        'news_category',
        'news',
        [
            'label' => 'ニュースカテゴリー',
            'hierarchical' => true,    // ←カテゴリ形式（階層あり）
            'rewrite' => ['slug' => 'news-category'],
            'show_in_rest' => true,
        ]
    );

    /* ============================
     * タクソノミー：ニュースタグ
     * ============================ */
    register_taxonomy(
        'news_tag',
        'news',
        [
            'label' => 'ニュースタグ',
            'hierarchical' => false,   // ←タグ形式（階層なし）
            'rewrite' => ['slug' => 'news-tag'],
            'show_in_rest' => true,
        ]
    );
    /* ============================
     * タクソノミー：ニュースタグ
     * ============================ */
    register_taxonomy(
        'news_minorin',
        'news',
        [
            'label' => 'みのりん系ニュース',
            'hierarchical' => false,   // ←タグ形式（階層なし）
            'rewrite' => ['slug' => 'news-minorin-tag'],
            'show_in_rest' => true,
        ]
    );
}
add_action('init', 'create_post_type_news');

/* =========================================
 * カスタム投稿タイプ：スタッフ
 * ========================================= */
function create_post_type_staff() {

    $labels = [
        'name'               => 'スタッフ',
        'singular_name'      => 'スタッフ',
        'add_new'            => '新規追加',
        'add_new_item'       => 'スタッフを追加',
        'edit_item'          => 'スタッフを編集',
        'new_item'           => '新しいスタッフ',
        'view_item'          => 'スタッフを見る',
        'search_items'       => 'スタッフを検索',
        'not_found'          => 'スタッフが見つかりません',
        'not_found_in_trash' => 'ゴミ箱にスタッフはありません',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 6,              // メニューの表示順
        'menu_icon' => 'dashicons-groups', // アイコン：人のグループ
        'has_archive' => true,
        'rewrite' => ['slug' => 'staff'],  // URLスラッグ
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true
    ];

    register_post_type('staff', $args);
}
    register_taxonomy(
        'staff_tag',
        'staff',
        [
            'label' => 'スタッフタグ',
            'hierarchical' => false,   // ←タグ形式（階層なし）
            'rewrite' => ['slug' => 'staff-tag'],
            'show_in_rest' => true,
        ]
    );

add_action('init', 'create_post_type_staff');


// SMTP設定読み込み
add_action( 'phpmailer_init', function( $phpmailer ) {
    $phpmailer->Host       = WP_MAIL_SMTP_HOST;
    $phpmailer->Port       = WP_MAIL_SMTP_PORT;
    $phpmailer->Username   = WP_MAIL_SMTP_USER;
    $phpmailer->Password   = WP_MAIL_SMTP_PASS;
    $phpmailer->SMTPSecure = WP_MAIL_SMTP_SECURE;
    $phpmailer->SMTPAuth   = WP_MAIL_SMTP_AUTH;
    $phpmailer->IsSMTP();
});
//最後
?>
