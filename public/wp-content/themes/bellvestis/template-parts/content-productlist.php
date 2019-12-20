<?php
/**
 * Template part for displaying product archive
 *
 *
 *
 * @package Bellvestis
 */
$product_cat_object = get_queried_object();
$archive_hero_title = get_field('hero_title', 'product_cat_' . $product_cat_object->term_id);
$archive_hero_desc = get_field('hero_desc', 'product_cat_' . $product_cat_object->term_id);
$archive_hero_img = get_field('hero_image', 'product_cat_' . $product_cat_object->term_id);
?>

<h1><?php echo $archive_hero_title; ?> </h1>
<p><?php echo $archive_hero_desc; ?></p>
<img src="<?php echo $archive_hero_img['url']; ?>">
<h1>Bootstrap sucks</h1>