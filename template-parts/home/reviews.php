<?php
$reviews = get_field('reviews');
$header_subtitle = $reviews['header_subtitle'];
$header_title = $reviews['header_title'];
$header_button = $reviews['header_button'];
$card = $reviews['card'];
?>

<section class="section" aria-labelledby="reviews-title">
  <header class="section__header">
    <div class="section__header-inner container">
      <div class="section__header-info">
        <p class="section__subtitle tag"><?php echo $header_subtitle; ?></p>
        <h2 class="section__title" id="reviews-title"><?php echo $header_title; ?></h2>
      </div>
      <div class="section__actions">
        <a href="/" class="section__link button">
          <span class="icon icon--yellow-arrow"><?php echo $header_button; ?></span>
        </a>
      </div>
    </div>
  </header>
  <div class="section__body">
    <ul class="bordered-grid bordered-grid--3-cols container">

      <?php foreach ($card as $card_item) : ?>
        <?php
        $card_image = $card_item['card_image'];
        $card_name = $card_item['card_name'];
        $card_departmen = $card_item['card_departmen'];
        $card_star = $card_item['card_star'];
        $card_description = $card_item['card_description'];
        ?>

        <li class="bordered-grid__item">
          <div class="review-card">
            <div class="review-card__author person-card">
              <img src="<?php echo $card_image; ?>" alt="" class="person-card__image" width="60" height="60" loading="lazy">
              <div class="person-card__body">
                <p class="person-card__name"><?php echo $card_name; ?></p>
                <p class="person-card__department"><?php echo $card_departmen; ?></p>
              </div>
            </div>
            <div class="review-card__body tile">
              <div class="review-card__rating-view rating-view" aria-label="Rating 5 star" title="Rating 5 star">
                <?php foreach ($card_star as $star_item) : ?>
                  <?php
                  $star = $star_item['star'];
                  ?>
                  <div class="rating-view__star is-active"><?php echo $star; ?></div>
                <?php endforeach; ?>
              </div>
              <blockquote class="review-card__description">
                <p><?php echo $card_description; ?></p>
              </blockquote>
            </div>
          </div>
        </li>

      <?php endforeach; ?>

    </ul>
  </div>
</section>
