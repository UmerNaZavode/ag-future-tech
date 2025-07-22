
<?php
/*
 * 
 */

get_header();
?>

<main>
  <?php get_template_part( 'template-parts/news/hero-news'); ?>
  <?php get_template_part( 'template-parts/global/blog'); ?>
  <?php get_template_part( 'template-parts/news/videos'); ?>
  <?php get_template_part( 'template-parts/global/about'); ?>
</main>

<?php get_footer(); ?>
