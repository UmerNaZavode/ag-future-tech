<?php
/*
 * Template Name: front-page
 */

get_header();
?>

<main>
  <?php get_template_part( 'template-parts/home/hero'); ?>
  <?php get_template_part( 'template-parts/home/features'); ?>
  <?php get_template_part( 'template-parts/home/blog'); ?>
</main>

<?php get_footer(); ?>
