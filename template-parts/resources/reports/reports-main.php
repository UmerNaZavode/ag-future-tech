<?php
$resources_details = get_field('resources_details');
$header_subtitle = $resources_details['header_subtitle'];
$header_title = $resources_details['header_title'];
$items = $resources_details['items'];
?>

<header class="section__header">
  <div class="section__header-inner container">
    <div class="section__header-info">
      <p class="section__subtitle tag"><?php echo $header_subtitle; ?></p>
      <h2 class="section__title" id="reports-title"><?php echo $header_title; ?></h2>
    </div>
  </div>
</header>
<ul class="list">
  <?php foreach ($items as $item) : ?>
    <?php
    $icon = $item['icon'];
    $preview_title = $item['preview_title'];
    $preview_description = $item['preview_description'];
    $image = $item['image'];
    $card_title = $item['card_title'];
    $card_description = $item['card_description'];
    $button_text = $item['button_text'];
    $cell = $item['cell'];
    ?>
    <li class="list__item">
      <div class="card container">
        <div class="card__preview">
          <div class="card__preview-main">
            <img class="card__preview-icon" src="<?php echo $icon; ?>" alt="" width="80" height="80" loading="lazy" />
            <div class="card__preview-info">
              <h3 class="card__preview-title"><?php echo $preview_title; ?></h3>
              <div class="card__preview-description">
                <p><?php echo $preview_description; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card__body">
          <div class="card__grid card__grid--3-cols-alt">
            <div class="card__cell card__cell--wide">
              <img class="card__cell-image" src="<?php echo $image; ?>" alt="" width="917" height="332" loading="lazy" />
            </div>
            <div class="card__cell card__cell--wide">
              <h4 class="card__cell-title"><?php echo $card_title; ?></h4>
              <p class="card__cell-description"><?php echo $card_description; ?></p>
              <a class="card__cell-link button button--dark-gray" href="/" download>
                <span class="icon icon--yellow-arrow"><?php echo $button_text; ?></span>
              </a>
            </div>
            <?php foreach ($cell as $cell_item) : ?>
              <?php
              $cell_title = $cell_item['cell_title'];
              $cell_description = $cell_item['cell_description'];
              ?>
            <div class="card__cell tile">
              <p class="card__cell-title"><?php echo $cell_title; ?></p>
              <p class="card__cell-description h6">
                <time datetime="2023-07"><?php echo $cell_description; ?></time>
              </p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
