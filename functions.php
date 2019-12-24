<?php
add_theme_support('post-thumbnails');
/**
 * CSSの読み込み
 */
function inputscss(): void
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'inputscss');

/**
 * jsの読み込み
 */
function inputsjs(): void
{
    wp_enqueue_script('myscript', get_template_directory_uri() . '/js/jquery-3.4.1.min.js');
    wp_enqueue_script('myscript', get_template_directory_uri() . '/js/bootstrap.bundle.min.js');
}
add_action('wp_enqueue_scripts', 'inputsjs');

/**
 * メインループの制御
 */
function exclude_category($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    //$query->set('posts_per_page', '1');
    return;
}
add_action('pre_get_posts', 'exclude_category');

/**
 * 抜粋の文字列制御
 */
function my_excerpt_length($length): int
{
    return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

/**
 * 抜粋の文字列制御
 */
function my_excerpt_more($length): string
{
    return ' ...';
}
add_filter('excerpt_more', 'my_excerpt_more');

/**
 * アイキャッチ画像の制御
 */
function twpp_setup_theme():void
{
 
}
add_action('after_setup_theme', 'twpp_setup_theme');
