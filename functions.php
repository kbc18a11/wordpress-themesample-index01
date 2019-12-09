<?php

/**
 * CSSの読み込み
 */
function inputscss():void
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'inputscss');

/**
 * jsの読み込み
 */
function inputsjs():void
{
    wp_enqueue_script('myscript', get_template_directory_uri() . '/js/jquery-3.4.1.min.js');
    wp_enqueue_script('myscript', get_template_directory_uri() . '/js/bootstrap.bundle.min.js');
}
add_action('wp_enqueue_scripts', 'inputsjs');
