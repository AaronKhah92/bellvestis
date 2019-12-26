<?php





add_action('init', 'register_shortcodes');



function wp_bellmaps_shortcode_function($atts)
{

  extract(shortcode_atts([
    'lat' => $latit,
    'lng' => $longi,
    'icon' => $store_icon,
    'content' => $store_content_box
  ], $atts));



  $latit = '';
  $longi = '';
  $store_icon = '';
  $store_content_box = '';




  /*  return '<img title="' . $title . '" src="http://chart.apis.google.com/chart?cht=' . $chart_type . ’ . $attributes . '" alt="' . $title . '" />'; */
}

function register_shortcodes()
{
  add_shortcode("Bellmap", "wp_bellmaps_shortcode_function");
}
