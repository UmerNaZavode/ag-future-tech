<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ag-future-tech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>
<?php
$header = get_field('header', 'option');
$logo = $header['logo'];
$promo = $header['promo'];
$button_text = $header['button_text'];
$button_url = $header['button_url'];
?>
<header class="header" data-js-header>
  <div class="header__promo">
    <div class="header__promo-inner container">
      <a href="/" class="header__promo-link">
        <span class="icon icon--yellow-arrow"><?php echo $promo; ?></span>
      </a>
    </div>
  </div>
  <div class="header__body">
    <div class="header__body-inner container">
      <a href="/" class="header__logo logo" aria-label="Home" title="Home">
        <img src="<?php echo $logo["url"]; ?>" alt="" class="logo__img" width="179" height="50">
      </a>
      <div class="header__overlay" data-js-header-overlay>
        <nav class="header__menu">

          <?php wp_nav_menu([
            'theme_location' => 'menu-1',
            'menu' => '',
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => 'header__menu-list',
            'menu_id' => 'js-main-menu',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => '',
          ]); ?>

         <!-- <ul class="header__menu-list"> -->
            <!-- <li class="header__menu-item"><a href="/index.html" class="header__menu-link is-active">Home</a></li> -->
            <!-- <li class="header__menu-item"><a href="/news.html" class="header__menu-link">News</a></li> -->
            <!-- <li class="header__menu-item"><a href="/podcasts.html" class="header__menu-link">Podcasts</a></li> -->
            <!-- <li class="header__menu-item"><a href="/resources.html" class="header__menu-link">Resources</a></li> -->
          <!-- </ul> -->
        </nav>
        <a href="<?php echo $button_url; ?>" class="header__contact-us-link button button--accent"><?php echo $button_text; ?></a>
      </div>
      <button class="header__burger-button burger-button visible-mobile" type="button" aria-label="Open menu" title="Open menu" data-js-header-burger-button>
        <span class="burger-button__line"></span>
        <span class="burger-button__line"></span>
        <span class="burger-button__line"></span>
      </button>
    </div>
  </div>
</header>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
