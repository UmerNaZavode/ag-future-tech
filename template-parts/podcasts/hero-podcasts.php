<?php
$hero_podcasts = get_field('hero_podcasts');
$header_title = $hero_podcasts['header_title'];
$header_subtitle = $hero_podcasts['header_subtitle'];
$header_description = $hero_podcasts['header_description'];
$card = $hero_podcasts['card'];
?>

<section class="hero-alt" aria-labelledby="podcast-title">
  <header class="hero-alt__header">
    <div class="hero-alt__header-inner container">
      <h1 class="hero-alt__title" id="podcasts-stitle"><?php echo $header_title; ?></h1>
      <p class="hero-alt__subtitle h1 hidden-mobile" aria-hidden="true"><?php echo $header_subtitle; ?></p>
      <p class="hero-alt__description"><?php echo $header_description; ?></p>
    </div>
  </header>
  <div class="hero-alt__body">
    <ul class="list">

      <?php foreach ($card as $item) : ?>
        <?php
        $preview_icon = $item['preview_icon'];
        $preview_title = $item['preview_title'];
        $preview_star = $item['preview_star'];
        $preview_subtitle = $item['preview_subtitle'];
        $preview_description = $item['preview_description'];
        $preview_button = $item['preview_button'];
        $body_video = $item['body_video'];
        $body_poster = $item['body_poster'];
        $body_title = $item['body_title'];
        $body_description = $item['body_description'];
        $body_cell = $item['body_cell'];
        ?>

        <li class="list__item">
          <div class="card container">
            <div class="card__preview">
              <div class="card__preview-main">
                <img src="<?php echo $preview_icon; ?>" alt="" class="card__preview-icon" width="80" height="80" loading="lazy">
                <div class="card__preview-info">
                  <h2 class="card__preview-title h3"><?php echo $preview_title; ?></h2>
                  <div class="card__rating-view rating-view" aria-label="Rating 5 star" title="Rating 5 star">

                    <?php foreach ($preview_star as $star_item) : ?>
                      <?php
                      $star = $star_item['star'];
                      ?>
                      <div class="rating-view__star is-active"><?php echo $star; ?></div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="card__preview-extra">
                <div class="card__cell tile">
                  <h3 class="card__cell-subtitle"><?php echo $preview_subtitle; ?></h3>
                  <p class="card__cell-description h6"><?php echo $preview_description; ?></p>
                  <a href="/" class="card__cell-link button">
                    <span class="icon icon--yellow-arrow"><?php echo $preview_button; ?></span>
                  </a>
                </div>
              </div>
            </div>
            <div class="card__body">
              <div class="card__grid card__grid--3-cols">
                <div class="card__cell card__cell--wide">
                  <div class="video-player" data-js-video-player>
                    <video src="<?php echo $body_video; ?>" class="video-player__video" width="917" height="412" poster="<?php echo $body_poster; ?>" data-js-video-player-video></video>
                    <div class="video-player__panel video-player__panel--center is-active" data-js-video-player-panel>
                      <button class="video-player__play-button" type="button" aria-label="Play video" title="Play video" data-js-video-player-play-button>
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0.6875 21C0.6875 9.78172 9.78172 0.6875 21 0.6875C32.2183 0.6875 41.3125 9.78172 41.3125 21C41.3125 32.2183 32.2183 41.3125 21 41.3125C9.78172 41.3125 0.6875 32.2183 0.6875 21ZM29.9045 18.9513C31.5119 19.8443 31.5119 22.1559 29.9045 23.0489L18.232 29.5336C16.6698 30.4015 14.75 29.2719 14.75 27.4848L14.75 14.5153C14.75 12.7283 16.6698 11.5986 18.232 12.4665L29.9045 18.9513Z" fill="white" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card__cell card__cell--wide">
                  <h3 class="card__cell-title h4"><?php echo $body_title; ?></h3>
                  <p class="card__cell-description"><?php echo $body_description; ?></p>
                </div>
              </div>
              <div class="card__cell-small">
                <?php foreach ($body_cell as $body_item) : ?>
                  <?php
                  $title = $body_item['title'];
                  $description = $body_item['description'];
                  ?>
                  <div class="card__cell tile">
                    <p class="card__cell-title"><?php echo $title; ?></p>
                    <p class="card__cell-description h6"><?php echo $description; ?></p>
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
