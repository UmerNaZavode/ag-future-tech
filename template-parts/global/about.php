<?php
$about = get_field('about');
$icon = $about['icon'];
$subtitle = $about['subtitle'];
$title = $about['title'];
$description = $about['description'];
$card = $about['card'];
?>

<section class="about" aria-labelledby="about-title">
  <div class="about__inner container">
    <header class="about__header">
      <img src="<?php echo $icon; ?>" alt="" class="about__icon" width="150" height="150" loading="lazy">
      <div class="about__info">
        <p class="about__subtitle tag"><?php echo $subtitle; ?></p>
        <h2 class="about__title" id="about-title"><?php echo $title; ?></h2>
      </div>
      <div class="about__description">
        <p><?php echo $description; ?></p>
      </div>
    </header>
    <ul class="about__list">

      <?php foreach ($card as $item) : ?>
        <?php
        $card_title = $item['card_title'];
        $card_description = $item['card_description'];
        ?>
        <li class="about__item">
          <a href="/" class="about-card tile">
            <h3 class="about-card__title circle-icon"><?php echo $card_title; ?></h3>
            <div class="about-card__description">
              <p><?php echo $card_description; ?></p>
            </div>
          </a>
        </li>
      <?php endforeach; ?>

    </ul>
  </div>
</section>
