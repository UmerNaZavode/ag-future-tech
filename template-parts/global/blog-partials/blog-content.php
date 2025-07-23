<?php

use function Avifinfo\read;

$blog = get_field('blog');
$card = $blog['card'];
?>

<section class="section" aria-labelledby="blog-title">
  <div class="section__body tabs" data-js-tabs>
    <h3 class="visually-hidden" id="blog-category-title">Blog Category</h3>
    <?php
    $term_id = 2;
    $field = get_field_object('single_author', 'author_' . $term_id); // ACF field name
    // vardump($field);

    $jobs = [];

    if ($field && isset($field['sub_fields'])) {
      foreach ($field['sub_fields'] as $sub_field) {
        if ($sub_field['name'] === 'job' && isset($sub_field['choices'])) {
          foreach ($sub_field['choices'] as $value => $label) {
            $jobs[] = $value;
          }
        }
      }
    }
    ?>
    <header class="tabs__header">
      <?php
      $term_name_get = isset($_GET['term_name']) ? $_GET['term_name'] : null;
      function setActive($term_name_get, $link_name)
      {
        if (!$term_name_get) {
          if ($link_name === 'All') {
            return 'is-active';
          }
          return null;
        } else {
          if ($term_name_get === $link_name) {
            return 'is-active';
          } else {
            return null;
          }
        }
      }
      ?>
      <div class="tabs__buttons container" role="tablist" aria-labelledby="blog-category-title">
        <a href="<?php echo get_the_permalink(); ?>?term_name=All" class="tabs__button <?php echo setActive($term_name_get, 'All'); ?>" type="button" role="tab">All</a>
        <?php foreach ($jobs as $job) : ?>
          <a href="<?php echo get_the_permalink(); ?>?term_name=<?php echo $job; ?>" class="tabs__button <?php echo setActive($term_name_get, $job); ?>" type="button" role="tab"><?php echo $job; ?></a>
        <?php endforeach; ?>
      </div>
    </header>

    <?php
    $matching_terms = [];

    $authors = get_terms([
      'taxonomy' => 'author',
      'hide_empty' => false,
    ]);
    // vardump($authors);
    foreach ($authors as $author) {
      $field = get_field('single_author', $author); // ACF field name
      $job = $field['job'];
      // vardump($job);
      if ($term_name_get === null || $term_name_get === 'All') {
        $matching_terms[] = $author->term_id;
      } else {
        if ($job === $term_name_get) {
          $matching_terms[] = $author->term_id;
        }
      }
    }

    if (!empty($matching_terms)) {
      $args = [
        'post_type' => 'blog',
        'tax_query' => [
          [
            'taxonomy' => 'author',
            'field' => 'term_id',
            'terms' => $matching_terms,
          ],
        ],
      ];

      $author_posts = new WP_Query($args);
      // vardump($author_posts->posts);
    }
    ?>
    <?php foreach ($author_posts->posts as $post) : ?>
      <?php
      $id = $post->ID;
      ?>
      <h2><?php echo get_the_title($id); ?></h2>
    <?php endforeach; ?>

    <div class="tabs__body">
      <div class="tabs__content is-active" id="tabpanel-1" aria-labelledby="tab-1" tabindex="0" data-js-tabs-content>
        <ul class="list">

          <?php foreach ($card as $card_item) : ?>
            <?php
            $card_image = $card_item['card_image'];
            $card_name = $card_item['card_name'];
            $card_department = $card_item['card_department'];
            $card_date = $card_item['card_date'];
            $card_title = $card_item['card_title'];
            $card_description = $card_item['card_description'];
            $card_button = $card_item['card_button'];
            ?>

            <li class="list__item">
              <article class="blog-card container">
                <div class="blog-card__author person-card">
                  <img src="<?php echo $card_image; ?>" alt="" class="person-card__image" width="80" height="80" loading="lazy">
                  <div class="person-card__body">
                    <p class="person-card__name"><?php echo $card_name; ?></p>
                    <p class="person-card__department"><?php echo $card_department; ?></p>
                  </div>
                </div>
                <div class="blog-card__body">
                  <time class="blog-card__date h6" datetime="2023-10-15"><?php echo $card_date; ?></time>
                  <div class="blog-card__info">
                    <h4 class="blog-card__title"><?php echo $card_title; ?></h4>
                    <div class="blog-card__description">
                      <p><?php echo $card_description; ?></p>
                    </div>
                  </div>
                  <div class="blog-card__actions blog-actions">
                    <ul class="blog-actions__list">
                      <li class="blog-actions__item">
                        <button class="blog-actions__button is-active" type="button">
                          <span class="blog-actions__icon-wrapper">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M11.645 21.4107L11.6384 21.4071L11.6158 21.3949C11.5965 21.3844 11.5689 21.3693 11.5336 21.3496C11.4629 21.3101 11.3612 21.2524 11.233 21.1769C10.9765 21.0261 10.6132 20.8039 10.1785 20.515C9.31074 19.9381 8.15122 19.0901 6.9886 18.0063C4.68781 15.8615 2.25 12.6751 2.25 8.75C2.25 5.82194 4.7136 3.5 7.6875 3.5C9.43638 3.5 11.0023 4.29909 12 5.5516C12.9977 4.29909 14.5636 3.5 16.3125 3.5C19.2864 3.5 21.75 5.82194 21.75 8.75C21.75 12.6751 19.3122 15.8615 17.0114 18.0063C15.8488 19.0901 14.6893 19.9381 13.8215 20.515C13.3868 20.8039 13.0235 21.0261 12.767 21.1769C12.6388 21.2524 12.5371 21.3101 12.4664 21.3496C12.4311 21.3693 12.4035 21.3844 12.3842 21.3949L12.3616 21.4071L12.355 21.4107L12.3523 21.4121C12.1323 21.5289 11.8677 21.5289 11.6477 21.4121L11.645 21.4107Z" stroke="#666666" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                          </span>
                          <span>24.5k</span>
                        </button>
                      </li>
                      <li class="blog-actions__item">
                        <button class="blog-actions__button" type="button">
                          <span class="blog-actions__icon-wrapper">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.48581 19.6888C9.54657 20.2083 10.7392 20.5 12 20.5C16.4183 20.5 20 16.9183 20 12.5C20 8.08172 16.4183 4.5 12 4.5C7.58172 4.5 4 8.08172 4 12.5C4 14.1401 4.49356 15.665 5.34026 16.9341M8.48581 19.6888L4 20.5L5.34026 16.9341M8.48581 19.6888L8.49231 19.6877M5.34026 16.9341L5.34154 16.9308" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </span>
                          <span>50</span>
                        </button>
                      </li>
                      <li class="blog-actions__item">
                        <button class="blog-actions__button" type="button">
                          <span class="blog-actions__icon-wrapper">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.0384 14.4616L4.1719 11.7951C3.36454 11.4281 3.39898 10.2697 4.22673 9.95134L18.8999 4.30781C19.7087 3.99675 20.5033 4.79139 20.1922 5.60013L14.5487 20.2733C14.2303 21.1011 13.072 21.1355 12.705 20.3281L10.0384 14.4616ZM10.0384 14.4616L14.4231 10.077" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </span>
                          <span>20</span>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>
                <a href="/" class="blog-card__link button">
                  <span class="icon icon--yellow-arrow"><?php echo $card_button; ?></span>
                </a>
              </article>
            </li>

          <?php endforeach; ?>

        </ul>
      </div>
      <div class="tabs__content" id="tabpanel-2" aria-labelledby="tab-2" tabindex="0" data-js-tabs-content>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, perferendis?
      </div>
      <div class="tabs__content" id="tabpanel-3" aria-labelledby="tab-3" tabindex="0" data-js-tabs-content>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, perferendis?
      </div>
      <div class="tabs__content" id="tabpanel-4" aria-labelledby="tab-4" tabindex="0" data-js-tabs-content>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, perferendis?
      </div>
      <div class="tabs__content" id="tabpanel-5" aria-labelledby="tab-5" tabindex="0" data-js-tabs-content>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, perferendis?
      </div>
      <div class="tabs__content" id="tabpanel-6" aria-labelledby="tab-6" tabindex="0" data-js-tabs-content>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, perferendis?
      </div>
    </div>
  </div>
</section>
