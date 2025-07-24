<?php
$connect_with_us = get_field('connect_with_us');
$title = $connect_with_us['title'];
$items = $connect_with_us['items'];
?>

<li class="bordered-grid__item">
  <div class="contacts-card">
    <h2 class="contacts-card__title h6"><?php echo $title; ?></h2>
    <div class="contacts-card__body">
      <div class="soc1als soc1als--3-cols">
        <ul class="soc1als__list">
          <?php foreach($items as $item): ?>
          <?php 
          $icon = $item['icon'];
          $url = $item['url'];
          ?>
          <li class="soc1als__item">
            <a class="soc1als__link" href="<?php echo $url; ?>" target="_blank" aria-label="Twitter" title="Twitter">
              <img src="<?php echo $icon; ?>" alt="" class="soc1als__img">
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</li>
