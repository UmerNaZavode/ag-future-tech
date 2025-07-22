<?php
$videos = get_field('videos');
$header_subtitle = $videos['header_subtitle'];
$header_title = $videos['header_title'];
$header_button = $videos['header_button'];
$card = $videos['card'];
?>
<section class="section" aria-labelledby="videos-title">
  <header class="section__header">
    <div class="section__header-inner container">
      <div class="section__header-info">
        <p class="section__subtitle tag"><?php echo $header_subtitle; ?></p>
        <h2 class="section__title" id="videos-title"><?php echo $header_title; ?></h2>
      </div>
      <div class="section__actions">
        <a href="/" class="section__link button">
          <span class="icon icon--yellow-arrow"><?php echo $header_button; ?></span>
        </a>
      </div>
    </div>
  </header>
  <div class="section__body">
    <ul class="bordered-grid bordered-grid--2-cols container">

      <?php foreach ($card as $item) : ?>
        <?php
        $video = $item['video'];
        $poster = $item['poster'];
        $play_button = $item['play_button'];
        $play_duration = $item['play_duration'];
        $title = $item['title'];
        $description = $item['description'];
        ?>

        <li class="bordered-grid__item">
          <div class="video-card">
            <div class="video-card__player video-player" data-js-video-player>
              <video src="<?php echo $video; ?>" class="video-player__video" width="718" height="412" poster="<?php echo $poster; ?>" data-js-video-player-video></video>
              <div class="video-player__panel is-active" data-js-video-player-panel>
                <button class="video-player__play-button" type="button" aria-label="Play video" title="Play video" data-js-video-player-play-button>
                  <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.6875 21C0.6875 9.78172 9.78172 0.6875 21 0.6875C32.2183 0.6875 41.3125 9.78172 41.3125 21C41.3125 32.2183 32.2183 41.3125 21 41.3125C9.78172 41.3125 0.6875 32.2183 0.6875 21ZM29.9045 18.9513C31.5119 19.8443 31.5119 22.1559 29.9045 23.0489L18.232 29.5336C16.6698 30.4015 14.75 29.2719 14.75 27.4848L14.75 14.5153C14.75 12.7283 16.6698 11.5986 18.232 12.4665L29.9045 18.9513Z" fill="white" />
                  </svg>
                </button>
                <div class="video-player__duration"><?php echo $play_duration; ?></div>
              </div>
            </div>
            <div class="video-card__body">
              <h3 class="video-card__title h5"><?php echo $title; ?></h3>
              <div class="video-card__description">
                <p><?php echo $description; ?></p>
              </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section></section>
