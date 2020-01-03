<?php
/* 
Template Name: Outlet Store Archive
*/
$store_name = get_field('store_name');
?>
<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
    the_title("<h1 class='outlet-title'>", "</h1>");
    echo '<div class="entry-content">';
    the_content();

    echo '</div>';
  endwhile;
endif;
echo do_shortcode("[Bellmap]");
get_footer();
