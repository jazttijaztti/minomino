<?php
/*
 * Template Name: お問合せ実行
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    wp_redirect(home_url('/otoiawase'));
    exit;
}

$username = isset($_POST['username']) ? sanitize_text_field($_POST['username']) : '';
$email    = isset($_POST['email'])    ? sanitize_email($_POST['email']) : '';
$tel      = isset($_POST['tel'])      ? sanitize_text_field($_POST['tel']) : '';

// ★ 管理者メールアドレス（From に使う）
$admin_email = get_option('admin_email');

// ★ ブログ名（メール本文に記載）
$blog_name   = get_bloginfo('name');

// メール本文（管理者 → ユーザーへ送る「Thanksメール」）
$subject = '【'.$blog_name.'】 お問い合わせありがとうございます';

$message =
"{$username} 様\n\n".
"お問い合わせありがとうございます。\n".
"以下の内容で受け付けました。\n\n".
"---------------------------\n".
"お名前：{$username}\n".
"メール：{$email}\n".
"電話番号：{$tel}\n".
"---------------------------\n\n".
"本メールは自動返信です。\n".
"- {$blog_name}";

// From 設定
$headers = array(
    'From: '.$blog_name.' <'.$admin_email.'>',
    'Reply-To: '.$admin_email,
);

// メール送信
$send = wp_mail($email, $subject, $message, $headers);

// 成功 → /thanks
if ($send) {
    wp_redirect(home_url('/thanks'));
    exit;
}

// 失敗 → /otoiawase
wp_redirect(home_url('/otoiawase'));
exit;
?>

