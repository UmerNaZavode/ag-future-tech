<?php
$reports_cards = get_field('reports_cards');
$items = $reports_cards['items'];
?>

<ul class="bordered-grid bordered-grid--3-cols container">
  <?php foreach ($items as $item) : ?>
    <?php
    $image = $item['image'];
    $title = $item['title'];
    $description = $item['description'];
    $details_button = $item['details_button'];
    $download_button = $item['download_button'];
    ?>
    <li class="bordered-grid__item">
      <div class="report-card">
        <img class="report-card__image" src="<?php echo $image; ?>" alt="" width="471" height="290" loading="lazy" />
        <div class="report-card__body">
          <h3 class="report-card__title h6"><?php echo $title; ?></h3>
          <div class="report-card__description">
            <p><?php echo $description; ?></p>
          </div>
        </div>
        <div class="report-card__actions">
          <a class="report-card__details-link button" href="/"><?php echo $details_button; ?></a>
          <a class="report-card__download-link button button--dark-gray" href="/" download><?php echo $download_button; ?></a>
        </div>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
