<?php
/**
 * Template part for displaying product archive
 *
 *
 *
 * @package Bellvestis
 */
$archive_hero_title = get_field('hero_title');
$archive_hero_desc = get_field('hero_desc');
$archive_hero_img = get_field('hero_image');
?>

<h1><?php echo $archive_hero_title; ?> </h1>
<p><?php echo $archive_hero_desc; ?></p>
<img src="<?php echo $archive_hero_img['url']; ?>">
<h1>Bootstrap sucks</h1>