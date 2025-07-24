      <header class="contacts__header">
        <h1 class="visually-hidden" id="contacts-title">
          Contacts
        </h1>
        <ul class="bordered-grid bordered-grid--4-cols container">
          <li class="bordered-grid__item">
            <div class="contacts-card">
              <h2 class="contacts-card__title h6">General Inquiries</h2>
              <div class="contacts-card__body">
                <a class="contacts-card__link button button--dark-gray" href="mailto:contact@ai-podcasts.com">
                  <span class="icon icon--yellow-arrow">contact@ai-podcasts.com</span>
                </a>
                <a class="contacts-card__link button button--dark-gray" href="tel:+11234567890">
                  <span class="icon icon--yellow-arrow">+1 (123) 456-7890</span>
                </a>
              </div>
            </div>
          </li>
          <li class="bordered-grid__item">
            <div class="contacts-card">
              <h2 class="contacts-card__title h6">Technical Support</h2>
              <div class="contacts-card__body">
                <a class="contacts-card__link button button--dark-gray" href="mailto:contact@ai-podcasts.com">
                  <span class="icon icon--yellow-arrow">contact@ai-podcasts.com</span>
                </a>
                <a class="contacts-card__link button button--dark-gray" href="tel:+11234567890">
                  <span class="icon icon--yellow-arrow">+1 (123) 456-7890</span>
                </a>
              </div>
            </div>
          </li>
          <li class="bordered-grid__item">
            <div class="contacts-card">
              <h2 class="contacts-card__title h6">Our Office</h2>
              <div class="contacts-card__body">
                <address class="contacts-card__address">Address: 123 AI Tech Avenue, Techville, 54321
                </address>
                <a class="contacts-card__link button button--dark-gray" href="/">
                  <span class="icon icon--yellow-arrow">Get Directions</span>
                </a>
              </div>
            </div>
          </li>
          <?php get_template_part( 'template-parts/contacts/contact-us/header-right' ); ?>
        </ul>
      </header>
