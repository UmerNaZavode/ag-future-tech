<?php
$features = get_field('features');
$header_subtitle = $features['header_subtitle'];
$header_title = $features['header_title'];
$card = $features['card'];
?>

<section class="section" aria-labelledby="features-title">
  <header class="section__header">
    <div class="section__header-inner container">
      <div class="section__header-info">
        <p class="section__subtitle tag"><?php echo $header_subtitle; ?></p>
        <h2 class="section__title" id="features-title"><?php echo $header_title; ?></h2>
      </div>
    </div>
  </header>
  <div class="section__body">
    <ul class="list">
      <?php foreach ($card as $card_item) : ?>
        <?php
        $preview_image = $card_item['preview_image'];
        $preview_title = $card_item['preview_title'];
        $preview_description = $card_item['preview_description'];
        $body = $card_item['body'];
        ?>

        <li class="list__item">
          <div class="card container">
            <div class="card__preview">
              <div class="card__preview-main">
                <img src="<?php echo $preview_image; ?>" alt="" class="card__preview-icon" width="80" height="80" loading="lazy">
              </div>
              <div class="card__preview-info">
                <h3 class="card__preview-title"><?php echo $preview_title; ?></h3>
                <div class="card__preview-description">
                  <p><?php echo $preview_description; ?></p>
                </div>
              </div>
            </div>
            <div class="card__body">
              <div class="card__grid card__grid--2--cols">
                <?php foreach ($body as $body_item) : ?>
                  <?php
                  $cell_title = $body_item['cell_title'];
                  $cell_description = $body_item['cell_description'];
                  ?>

                  <div class="card__cell tile">
                    <h4 class="card__cell-title h5"><?php echo $cell_title; ?></h4>
                    <p class="card__cell-description"><?php echo $cell_description; ?></p>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
