<?php
$resources_header = get_field('resources_header');
$title = $resources_header['title'];
$subtitle = $resources_header['subtitle'];
$description = $resources_header['description'];
$items = $resources_header['items'];
?>
<section class="hero-alt" aria-labelledby="resources-title">
  <header class="hero-alt__header">
    <div class="hero-alt__header-inner container">
      <h1 class="hero-alt__title" id="resources-title"><?php echo $title; ?></h1>
      <p class="hero-alt__subtitle h1 hidden-mobile" aria-hidden="true"><?php echo $subtitle; ?></p>
      <p class="hero-alt__description"><?php echo $description; ?></p>
    </div>
  </header>
  <div class="hero-alt__body">
    <div class="metrics metrics--4-cols container">
      <dl class="metrics__list">
        <?php foreach ($items as $item) : ?>
          <?php
          $value = $item['value'];
          $key = $item['key'];
          ?>
          <div class="metrics__item">
            <dt class="metrics__key"><?php echo $key; ?></dt>
            <dd class="metrics__value h2"><?php echo $value; ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </div>
  </div>
</section>
