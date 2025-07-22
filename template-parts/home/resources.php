<?php
$resources = get_field('resources');
$header_subtitle = $resources['header_subtitle'];
$header_title = $resources['header_title'];
$header_button = $resources['header_button'];
$card = $resources['card'];
?>

<section class="section" aria-labelledby="resources-title" xmlns="http://www.w3.org/1999/html">
  <header class="section__header">
    <div class="section__header-inner container">
      <div class="section__header-info">
        <p class="section__subtitle tag"><?php echo $header_subtitle; ?></p>
        <h2 class="section__title" id="resources-title"><?php echo $header_title; ?></h2>
      </div>
      <div class="section__actions">
        <a href="/" class="section__link button">
          <span class="icon icon--yellow-arrow"><?php echo $header_button; ?></span>
        </a>
      </div>
    </div>
  </header>
  <div class="section__body">
    <ul class="list">

      <?php foreach ($card as $card_item) : ?>
        <?php
        $preview_icon = $card_item['preview_icon'];
        $preview_title = $card_item['preview_title'];
        $preview_description = $card_item['preview_description'];
        $preview_button = $card_item['preview_button'];
        $download_title = $card_item['download_title'];
        $download_subtitle = $card_item['download_subtitle'];
        $download_person = $card_item['download_person'];
        $card_title = $card_item['card_title'];
        $card_description = $card_item['card_description'];
        $card_image = $card_item['card_image'];
        $card_cell = $card_item['card_cell'];
        ?>

      <li class="list__item">
        <div class="card container">
          <div class="card__preview">
            <div class="card__preview-main">
              <img src="<?php echo $preview_icon; ?>" alt="" class="card__preview-icon" width="80" height="80" loading="lazy">
              <div class="card__preview-info">
                <h3 class="card__preview-title"><?php echo $preview_title; ?></h3>
                <div class="card__preview-description">
                  <p><?php echo $preview_description; ?></p>
                </div>
              </div>
              <a href="/" class="card__preview-link button button--dark-gray">
                <span class="icon icon--yellow-arrow"><?php echo $preview_button; ?></span>
              </a>
            </div>
            <div class="card__preview-extra">
              <div class="download-info tile">
                <div class="download-info__body">
                  <p class="download-info__title"><?php echo $download_title; ?></p>
                  <p class="download-info__subtitle h5"><?php echo $download_subtitle; ?></p>
                </div>
                <div class="download-info__team team">
                  <?php foreach($download_person as $dw_item): ?>
                  <?php 
                  $download_image = $dw_item['download_image'];
                  ?>
                  <img src="<?php echo $download_image; ?>" alt="" class="team__person" width="50" height="50" loading="lazy">
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card__body">
            <div class="card__grid card__grid--2--cols-alt">
              <div class="card__cell">
                <h3 class="card__cell-title h5"><?php echo $card_title; ?></h3>
              </div>
              <div class="card__cell">
                <p class="card__cell-description"><?php echo $card_description; ?></p>
              </div>
              <div class="card__cell card__cell--wide">
                <img src="<?php echo $card_image; ?>" alt="" class="card__cell-image" width="917" height="332" loading="lazy">
              </div>
              <div class="card__cell tile">
                <h4 class="card__cell-subtitle">Total Ebooks</h4>
                <p class="card__cell-description h6">Over 100 ebooks</p>
              </div>
              <div class="card__cell tile">
                <h4 class="card__cell-subtitle">Download Formats</h4>
                <p class="card__cell-description h6">PDF format for access.</p>
                <a href="/" class="card__cell-link button">
                  <span class="icon icon--yellow-eye">Preview</span>
                </a>
              </div>
              <div class="card__cell card__cell--wide tile">
                <h4 class="card__cell-subtitle">Average Author Expertise</h4>
                <p class="card__cell-description h6">Ebooks are authored by renowned experts with an
                  average of 15 years of experience</p>
              </div>
            </div>
          </div>
        </div>
      </li>

      <?php endforeach; ?>

    </ul>
  </div>
</section>
