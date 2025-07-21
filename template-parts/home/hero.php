<?php
$hero = get_field('hero');
$body_subtitle = $hero['body_subtitle'];
$body_title = $hero['body_title'];
$body_description = $hero['body_description'];
$metrics = $hero['metrics'];
$resources_image = $hero['resources_image'];
$resources_title = $hero['resources_title'];
$resources_subtitle = $hero['resources_subtitle'];
$resources_button = $hero['resources_button'];
$advantages = $hero['advantages'];
?>

<section class="hero" aria-labelledby="hero-title">
  <div class="hero__main container">
    <div class="hero__body">
      <p class="hero__subtitle"><?php echo $body_subtitle; ?></p>
      <h1 class="hero__title" id="hero-title"><?php echo $body_title; ?></h1>
      <div class="hero__description">
        <p><?php echo $body_description; ?></p>
      </div>
    </div>
    <div class="hero__metrics metrics full-vw-line full-vw-line--top full-vw-line--left">
      <dl class="metrics__list">

        <?php foreach ($metrics as $metrics__item) : ?>
          <?php
          $key = $metrics__item['key'];
          $value = $metrics__item['value'];
          ?>
          <div class="metrics__item">
            <dt class="metrics__key"><?php echo $key; ?></dt>
            <dd class="metrics__value h3"><?php echo $value; ?></dd>
          </div>
        <?php endforeach; ?>

      </dl>
    </div>
    <div class="hero__resources-preview resources-preview">
      <div class="resources-preview__team team">

        <?php foreach ($resources_image as $resources_item) : ?>
          <?php
          $img = $resources_item['img'];
          ?>
          <img src="<?php echo $img; ?>" alt="" class="team__person" width="60" height="60" loading="lazy">
        <?php endforeach; ?>

      </div>
      <div class="resources-preview__body">
        <p class="resources-preview__title h5"><?php echo $resources_title; ?></p>
        <p class="resources-preview__subtitle"><?php echo $resources_subtitle; ?></p>
      </div>
      <a href="/" class="resources-preview__button button">
        <span class="icon icon--yellow-arrow"><?php echo $resources_button; ?></span>
      </a>
    </div>
  </div>
  <div class="hero__advantages">
    <h2 class="visually-hidden">Our Advantages</h2>
    <ul class="hero__advantages-list container">

      <?php foreach ($advantages as $advantages_item) : ?>
        <?php
        $advantages_image = $advantages_item['advantages_image'];
        $advantages_title = $advantages_item['advantages_title'];
        $advantages_subtitle = $advantages_item['advantages_subtitle'];
        $advantages_details = $advantages_item['advantages_details'];
        ?>
      <li class="hero__advantages-item">
        <div class="advantage-card">
          <img src="<?php echo $advantages_image; ?>" alt="" class="advantage-card__image" width="50" height="50" loading="lazy">
          <a href="/" class="advantage-card__link circle-icon">
            <h3 class="advantage-card__title h6"><?php echo $advantages_title; ?></h3>
            <p class="advantage-card__subtitle"><?php echo $advantages_subtitle; ?></p>
          </a>
          <p class="advantage-card__details"><?php echo $advantages_details; ?></p>
        </div>
      </li>
      <?php endforeach; ?>

    </ul>
  </div>
</section>
