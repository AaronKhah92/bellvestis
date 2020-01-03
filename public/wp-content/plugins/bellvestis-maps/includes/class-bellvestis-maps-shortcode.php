<?php

add_action('init', 'register_shortcodes');

function wp_bellmaps_shortcode_function()
{
  $output = "<div id='map'></div>";
  return $output;
}

function register_shortcodes()
{
  add_shortcode("Bellmap", "wp_bellmaps_shortcode_function");
}
