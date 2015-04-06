<?php
/*

//*structure
index
header
sidebar
footer
page:固定ページ　カテゴリ出力なし
single:記事ページ

//*memo
index.phpがfrontとアーカイブページ兼任中
ページネーションなんかも暫定

singleにコピペしたパンくずが入ってる

サイドバーのcategoryを並び替えしたい
そしたらその他をOtherに変更
*/

//wp_headコード非表示
remove_action('wp_head', 'feed_links_extra', 3);
//remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
//remove_action('wp_head', 'index_rel_link');
//remove_action('wp_head', 'parent_post_rel_link', 10, 0);
//remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');

// 管理バーにログアウトを追加
function add_new_item_in_admin_bar()
{
  global $wp_admin_bar;
  $wp_admin_bar->add_menu(array(
    'id' => 'new_item_in_admin_bar',
    'title' => __('ログアウト'),
    'href' => wp_logout_url()
  ));
}
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

// アイキャッチ画像有効
add_theme_support('post-thumbnails');

// ウィジェット有効
if (function_exists('register_sidebar'))
  register_sidebar();

// author隠し　/?author=1などで表示されるページ
function theme_slug_redirect_author_archive() {
  if (is_author() ) {
    wp_redirect( home_url());
    exit;
  }
}
add_action( 'template_redirect', 'theme_slug_redirect_author_archive' );


// OGPのための各種設定
// アイキャッチ画像のURL取得
function get_thumbnail_image_url() {
  $img_id = get_post_thumbnail_id();
  $img_url = wp_get_attachment_image_src($img_id, 'full');
  return $img_url[0];
}

// ogp用description取得
function get_ogp_excerpted_content($content) {
  $content = strip_tags($content);
  $content = mb_substr($content, 0, 120, 'UTF-8');
  $content = preg_replace('/\s\s+/', '', $content);
  $content = preg_replace('/[\r\n]/', '', $content);
  $content = esc_attr($content) . ' ...';
  return $content;
}


// サイトID
//function apt_site_id() {
//  if (is_front_page()) {
//    echo "h1";
//  } else {
//    echo "div";
//  }
//}