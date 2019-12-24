<?php

/**
 * Template part for displaying startpage
 *
 *
 *
 * @package Bellvestis
 */
$shop_hero_img = get_field('shop_hero');
$men_category_img = get_field('men_category');
$women_category_img = get_field('women_category');
$kids_category_img = get_field('kids_category');
$trends_hero_img = get_field('trends_hero');
$trend_autumn_img = get_field('autumn_trends');
$trend_winter_img = get_field('winter_trends');
$trend_spring_img = get_field('spring_trends');
$trend_summer_img = get_field('summer_trends');
$about_hero_img = get_field('about_hero');

$prod_cat_args = array(
  'taxonomy' => 'product_cat', //woocommerce
  'orderby' => 'none',
  'empty' => 0,
);

$woo_categories = get_categories($prod_cat_args);
?>
<p class="h4 promo-tag"><?php echo get_field('promo_tag'); ?></p>

<a href="#" class="shop-hero"><img src="<?php echo $shop_hero_img['url']; ?>" alt="Shop Hero Image" class="shop-hero-img"></a>
<?php
foreach ($woo_categories as $woo_cat) {
  $woo_cat_id = $woo_cat->term_id; //category ID
  $woo_cat_name = $woo_cat->name; //category name
  $woo_cat_slug = $woo_cat->slug; //category slug

  // $return .= '<a href="' . get_term_link($woo_cat_slug, 'product_cat') . '">' . $woo_cat_name . '</a>';

  if ($woo_cat_slug == 'men') {
    $return .= '<a href="' . get_term_link($woo_cat_slug, 'product_cat') . '"  class="men-category">';
    $return .= '<img src="' . $men_category_img['url'] . '"';
    $return .= 'class="men-category-img">';
    $return .= '<div class="category">';
    $return .= '<p class="h3">' . $woo_cat_name . '</p>';
    $return .= '</div>';
    $return .= '</a>';
  } elseif ($woo_cat_slug == 'kids') {
    $return .= '<a href="' . get_term_link($woo_cat_slug, 'product_cat') . '"  class="kids-category">';
    $return .= '<img src="' . $kids_category_img['url'] . '"';
    $return .= 'class="kids-category-img">';
    $return .= '<div class="category kid">';
    $return .= '<p class="h3">' . $woo_cat_name . '</p>';
    $return .= '</div>';
    $return .= '</a>';
  } elseif ($woo_cat_slug == 'women') {
    $return .= '<a href="' . get_term_link($woo_cat_slug, 'product_cat') . '"  class="women-category">';
    $return .= '<img src="' . $women_category_img['url'] . '"';
    $return .= 'class="women-category-img">';
    $return .= '<div class="category">';
    $return .= '<p class="h3">' . $woo_cat_name . '</p>';
    $return .= '</div>';
    $return .= '</a>';
    echo $return;
  }
} //end of $woo_categories foreach

?>

<a href="#" class="trends-hero"><img src="<?php echo $trends_hero_img['url']; ?>" alt="Trends Hero Image" class="trends-hero-img">
  <div class="category trend-title">
    <p class="h3">Säsongens Trender</p>
  </div>
</a>

<div bp="grid" class="trend-container">
  <a bp="4@sm 2@md" href="#" class="trend-autumn mx-auto"><img class="trend-autumn-img" src="<?php echo $trend_autumn_img['url']; ?>" alt="Trend Autumn Image"></a>

  <div bp="4@sm 8@md" class="mx-auto">
    <a href="#" class="trend-winter"><img src="<?php echo $trend_winter_img['url']; ?>" alt="Trend winter Image" class="trend-winter-img"></a>
    <a href="#" class="trend-spring"><img src="<?php echo $trend_spring_img['url']; ?>" alt="Trend spring Image" class="trend-spring-img"></a>
  </div>

  <a bp="4@sm 2@md" href="#" class="trend-summer mx-auto"><img src="<?php echo $trend_summer_img['url']; ?>" alt="Trend summer Image" class="trend-summer-img"></a>
</div>
<p class="about-title h1">Om Bellvestis</p>
<a href="#" class="about-hero"><img class="about-hero-img" src="<?php echo $about_hero_img['url']; ?>" alt="About Hero Image" class="about-hero-img">
  <div class="category about-read-more">
    <p class="h3">Läs mer</p>
  </div>
</a>
</a>