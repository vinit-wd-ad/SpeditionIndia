<?php include "setting.php" ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php include "include/head.php" ?>
</head>

<body>

  <?php include "include/header.php" ?>

  <div id="smooth-wrapper">
    <div id="smooth-content">
      <main id="primary" class="site-main">
        <!-- <div class="top-space-15"></div> -->

        <!-- start: Banner Slider -->
        <section class="tj-slider-section">
          <div class="swiper hero-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide tj-slider-item">
                <div class="slider-bg-image" data-bg-image="<?= BASE_URL ?>assets/images/hero/news-event.jpg"></div>
                <div class="container">
                  <div class="slider-wrapper">
                    <div class="slider-content">
                      <h1 class="slider-title invisible">News & Events</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Banner Slider -->

        <!-- start: Associated Members (Event Details) -->
        <section class="tj-careers-section sec-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <!-- Event Details Container -->
                <div id="event-details-container">
                  <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                      <span class="visually-hidden">Loading event details...</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <script>
          document.addEventListener("DOMContentLoaded", function() {
            function initGalleryLightbox() {
              // 1. Create Overlay Element
              const overlay = document.createElement('div');
              overlay.className = 'image-lightbox-overlay';
              overlay.id = 'galleryLightbox';
              overlay.innerHTML = `
                  <span class="image-lightbox-close">&times;</span>
                  <img class="image-lightbox-img" src="" alt="Zoomed Image">
              `;
              document.body.appendChild(overlay);

              const lightboxImg = overlay.querySelector('.image-lightbox-img');

              // 2. Event Delegation for Dynamically Loaded .gall-row Images
              document.addEventListener('click', function(e) {
                const target = e.target;
                // Agar click .gall-row ke andar kisi IMG tag par hua ho
                if (target.tagName === 'IMG' && target.closest('.gall-row')) {
                  lightboxImg.src = target.src;
                  lightboxImg.alt = target.alt || 'Gallery Image';
                  overlay.classList.add('active');
                }
              });

              // 3. Close Modal on Overlay/Close Button Click
              overlay.addEventListener('click', function(e) {
                if (e.target !== lightboxImg) {
                  overlay.classList.remove('active');
                }
              });

              // 4. Close Modal on 'ESC' Key Press
              document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && overlay.classList.contains('active')) {
                  overlay.classList.remove('active');
                }
              });
            }

            // Lightbox Init Call
            initGalleryLightbox();

            function getEventSlug() {
              const urlParams = new URLSearchParams(window.location.search);
              if (urlParams.get('slug')) {
                return urlParams.get('slug');
              }
              const pathSegments = window.location.pathname.split('/').filter(Boolean);
              return pathSegments[pathSegments.length - 1];
            }

            const eventSlug = getEventSlug();

            if (!eventSlug || eventSlug.includes('.php')) {
              document.getElementById('event-details-container').innerHTML =
                '<h3 class="text-center py-5">Invalid Event Link.</h3>';
              return;
            }

            const SINGLE_EVENT_API = `https://www.speditionindia.com/wp-json/tribe/events/v1/events/by-slug/${eventSlug}`;

            fetch(SINGLE_EVENT_API)
              .then(res => {
                if (!res.ok) throw new Error("Event not found");
                return res.json();
              })
              .then(event => {
                renderEventDetails(event);
              })
              .catch(err => {
                console.error("Error fetching event details:", err);
                document.getElementById('event-details-container').innerHTML =
                  '<h3 class="text-center py-5">Event details not found or removed.</h3>';
              });

            function formatDetailsDate(dateString) {
              if (!dateString) return '';
              const dateObj = new Date(dateString.replace(' ', 'T'));
              const day = String(dateObj.getDate()).padStart(2, '0');
              let month = dateObj.toLocaleString('en-US', {
                month: 'long'
              });
              month = month.charAt(0).toUpperCase() + month.slice(1).toLowerCase();
              const year = dateObj.getFullYear();
              return `${day} ${month} ${year}`;
            }

            function renderEventDetails(event) {
              const container = document.getElementById('event-details-container');
              if (!container) return;

              const imgUrl = event.image?.url || 'https://www.speditionindia.com/wp-content/uploads/2023/09/global-meeting.png';
              const title = event.title;
              const description = event.description || '<p>No detailed description available for this event.</p>';

              const startDateFormatted = formatDetailsDate(event.start_date);
              const endDateFormatted = formatDetailsDate(event.end_date);

              let dateRange = startDateFormatted;
              if (event.end_date && startDateFormatted !== endDateFormatted) {
                dateRange += ` - ${endDateFormatted}`;
              }

              const venue = event.venue;
              let locationText = "Location TBA";
              if (venue && venue.venue) {
                locationText = `${venue.venue}${venue.city ? ', ' + venue.city : ''}${venue.country ? ', ' + venue.country : ''}`;
              }

              // Layout: Top 2-Column (Image + Info), Bottom Content
              container.innerHTML = `
            <div class="event-details-wrapper">
                <!-- Top Section: Image (Left) + Details (Right) -->
                <div class="event-details-top mb-5 pb-4 border-bottom">
                    <div class="event-thumb-col">
                        <img src="${imgUrl}" alt="${title}" class="img-fluid">
                    </div>
                    <div class="event-info-col">
                        <h1 class="event-title mb-3" style="font-size: 32px; font-weight: 700;">${title}</h1>
                        
                        <div class="event-meta-list mb-3">
                            <p class="mb-2" style="font-size: 16px; color: #555;">
                                <i class="fa fa-calendar-alt text-primary me-2"></i>
                                <strong>Date:</strong> ${dateRange}
                            </p>
                            <p class="mb-0" style="font-size: 16px; color: #555;">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                <strong>Location:</strong> ${locationText}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Section: Full Width Description / Content & .gall-row -->
                <div class="event-content-full mt-4" style="font-size: 16px; line-height: 1.8; color: #444;">
                    ${description}
                </div>
            </div>
        `;
            }
          });
        </script>

      </main>

      <?php include "include/footer.php"; ?>
    </div>
  </div>

  <!-- JS here -->
  <?php include "include/script.php"; ?>
</body>

</html>