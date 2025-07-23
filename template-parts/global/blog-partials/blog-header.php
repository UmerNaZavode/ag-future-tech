<?php
$blog = get_field('blog');
$header_title = $blog['header_title'];
$header_subtitle = $blog['header_subtitle'];
$header_button = $blog['header_button'];
?>

  <header class="section__header">
    <div class="section__header-inner container">
      <div class="section__header-info">
        <p class="section__subtitle tag"><?php echo $header_subtitle; ?></p>
        <h2 class="section__title" id="blog-title"><?php echo $header_title; ?></h2>
      </div>
      <div class="section__actions">
        <a href="/blog.html" class="section__link button">
          <span class="icon icon--yellow-arrow"><?php echo $header_button; ?></span>
        </a>
      </div>
    </div>
  </header>

