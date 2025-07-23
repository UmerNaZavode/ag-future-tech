<?php
/*
 * Template Name: front-page
 */
get_header();
?>

<main>
  <?php get_template_part( 'template-parts/home/hero'); ?>
  <?php get_template_part( 'template-parts/home/features'); ?>
  <?php get_template_part( 'template-parts/global/blog'); ?>
  <?php get_template_part( 'template-parts/home/resources'); ?>
  <?php get_template_part( 'template-parts/home/reviews'); ?>
  <?php get_template_part( 'template-parts/global/about'); ?>
</main>

<?php get_footer(); ?>
