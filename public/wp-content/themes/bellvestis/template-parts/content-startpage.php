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

?>

<p class="h4 promo-tag"><?php echo get_field('promo_tag'); ?></p>

<a href="#" class="shop-hero"><img src="<?php echo $shop_hero_img['url']; ?>" alt="Shop Hero Image" class="shop-hero-img"></a>

<a href="#" class="men-category"><img src="<?php echo $men_category_img['url']; ?>" alt="Men Category" class="men-category-img">
  <div class="category">
    <p class="h3">Herr</p>
  </div>
</a>
<a href="#" class="women-category"><img src="<?php echo $women_category_img['url']; ?>" alt="Women Category" class="women-category-img">
  <div class="category">
    <p class="h3">Dam</p>
  </div>
</a>
<a href="#" class="kids-category"><img src="<?php echo $kids_category_img['url']; ?>" alt="Kids Category" class="kids-category-img">
  <div class="category kid">
    <p class="h3">Barn</p>
  </div>
</a>

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