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
                <div class="slider-bg-image" data-bg-image="assets/images/hero/news-event.jpg"></div>
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

        <!-- start: Associated Members (Upcoming Events) -->
        <section class="tj-careers-section sec-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center mb-2">
                  <h2 class="sec-title txt-anim">Our Upcoming Events</h2>
                </div>
              </div>
            </div>
            <div class="row rg-30 mt-5">
              <div class="col-12">
                <!-- Upcoming Events Container -->
                <div id="upcoming-events-container" class="blog-wrapper h8-blog-wrapper h10-blog-wrapper">
                  <!-- JS dynamic content -->
                </div>

                <!-- Show More Button Container -->
                <div id="upcoming-load-more-wrapper" class="text-center mt-4 d-none">
                  <button id="upcoming-load-more-btn" class="tj-primary-btn btn">
                    <span>Show More</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- start: Associated Members (Previous Events) -->
        <section class="tj-about-section-2 rounded-0 sec-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center mb-2">
                  <h2 class="sec-title txt-anim">Our Previous Events</h2>
                </div>
              </div>
            </div>
            <div class="row rg-30 mt-5">
              <div class="col-12">
                <!-- Previous Events Container -->
                <div id="previous-events-container" class="blog-wrapper h8-blog-wrapper h10-blog-wrapper">
                  <!-- JS dynamic content -->
                </div>

                <!-- Show More Button Container -->
                <div id="previous-load-more-wrapper" class="text-center mt-4 d-none">
                  <button id="previous-load-more-btn" class="bg-theme p-3 py-2">
                    <span class="text-white">Show More</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <script>
          document.addEventListener("DOMContentLoaded", function() {
            function formatEventDate(dateString) {
              if (!dateString) return {
                day: '',
                monthFull: '',
                monthShort: '',
                year: ''
              };

              const dateObj = new Date(dateString.replace(' ', 'T'));
              const day = String(dateObj.getDate()).padStart(2, '0');

              let monthFull = dateObj.toLocaleString('en-US', {
                month: 'long'
              });
              monthFull = monthFull.charAt(0).toUpperCase() + monthFull.slice(1).toLowerCase();

              let monthShort = dateObj.toLocaleString('en-US', {
                month: 'short'
              });
              monthShort = monthShort.charAt(0).toUpperCase() + monthShort.slice(1).toLowerCase();

              const year = dateObj.getFullYear();

              return {
                day,
                monthFull,
                monthShort,
                year
              };
            }

            // HTML cleanup for excerpt/description
            function getCleanExcerpt(htmlString, maxLength = 120) {
              if (!htmlString) return '';
              const tempDiv = document.createElement('div');
              tempDiv.innerHTML = htmlString;
              let text = tempDiv.textContent || tempDiv.innerText || '';
              text = text.trim();
              if (text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
              }
              return text;
            }

            const ALL_EVENTS_API = "https://www.speditionindia.com/wp-json/tribe/events/v1/events?start_date=2020-01-01&per_page=100";

            // Section State Tracking
            const state = {
              upcoming: {
                all: [],
                visibleCount: 6
              },
              previous: {
                all: [],
                visibleCount: 6
              }
            };

            fetch(ALL_EVENTS_API)
              .then(res => res.json())
              .then(data => {
                const allEvents = data.events || [];

                if (allEvents.length === 0) {
                  showEmptyMessage('upcoming-events-container');
                  showEmptyMessage('previous-events-container');
                  return;
                }

                const now = new Date();

                allEvents.forEach(event => {
                  const eventStartDate = new Date(event.start_date.replace(' ', 'T'));
                  if (eventStartDate >= now) {
                    state.upcoming.all.push(event);
                  } else {
                    state.previous.all.push(event);
                  }
                });

                // Initial Render (First 6 Items)
                renderSection('upcoming');
                renderSection('previous');
              })
              .catch(err => {
                console.error("Error loading events:", err);
                showEmptyMessage('upcoming-events-container');
                showEmptyMessage('previous-events-container');
              });

            // Load More Button Event Listeners
            document.getElementById('upcoming-load-more-btn')?.addEventListener('click', function() {
              state.upcoming.visibleCount += 6;
              renderSection('upcoming');
            });

            document.getElementById('previous-load-more-btn')?.addEventListener('click', function() {
              state.previous.visibleCount += 6;
              renderSection('previous');
            });

            function showEmptyMessage(containerId) {
              const container = document.getElementById(containerId);
              if (container) {
                container.innerHTML = '<p class="text-center py-4">No events found in this section.</p>';
              }
            }

            // Common Render Method with Load More Logic
            function renderSection(type) {
              const containerId = type === 'upcoming' ? 'upcoming-events-container' : 'previous-events-container';
              const wrapperId = type === 'upcoming' ? 'upcoming-load-more-wrapper' : 'previous-load-more-wrapper';
              const emptyText = type === 'upcoming' ? 'No upcoming events scheduled right now.' : 'No previous events found.';

              const container = document.getElementById(containerId);
              const wrapper = document.getElementById(wrapperId);
              if (!container) return;

              const items = state[type].all;
              const limit = state[type].visibleCount;

              if (items.length === 0) {
                container.innerHTML = `<p class="text-center py-4">${emptyText}</p>`;
                if (wrapper) wrapper.classList.add('d-none');
                return;
              }

              // Slice Array up to current Limit (6, 12, 18, etc.)
              const visibleEvents = items.slice(0, limit);

              let html = '';
              visibleEvents.forEach(event => {
                const imgUrl = event.image?.url || 'https://www.speditionindia.com/wp-content/uploads/2023/09/global-meeting.png';
                const title = event.title;
                const descriptionText = getCleanExcerpt(event.description || event.excerpt || '');

                const start = formatEventDate(event.start_date);
                const end = formatEventDate(event.end_date);

                const topRightDate = `${start.monthFull} - ${start.day}`;

                let fullDateRange = `${start.day} ${start.monthFull} ${start.year}`;
                if (event.end_date) {
                  fullDateRange += ` - ${end.day} ${end.monthFull} ${end.year}`;
                }

                const venue = event.venue;
                let locationText = "Location TBA";
                if (venue && venue.venue) {
                  locationText = `${venue.venue}${venue.city ? ', ' + venue.city : ''}${venue.country ? ', ' + venue.country : ''}`;
                }

                const eventLink = `event/${event.slug}`;

                html += `
                  <div class="blog-item style-2 flex-row scroll-anim mb-4">
                      <div class="blog-thumb">
                          <a href="${eventLink}">
                              <img src="${imgUrl}" alt="${title}">
                          </a>
                      </div>
                      <div class="blog-content">
                          <div class="title-area">
                              <h3 class="title">
                                  <a href="${eventLink}">${title}</a>
                              </h3>
                              ${descriptionText ? `<p class="event-desc mt-2 mb-3" style="color: #666; font-size: 14px; line-height: 1.5;">${descriptionText}</p>` : ''}
                              <a class="text-btn" href="${eventLink}">
                                  <span class="btn-text"><span>Read More</span></span>
                                  <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                              </a>
                          </div>
                          <div class="blog-meta align-items-end">
                              <div class="blog-date-wrapper text-end">
                                  <h3>${topRightDate}</h3>
                                  <span class="blog-date">${fullDateRange}</span>
                              </div>
                              <span class="categories text-end">
                                  <i class="fa fa-map-marker-alt"></i>
                                  ${locationText}
                              </span>
                          </div>
                      </div>
                  </div>
                `;
              });

              container.innerHTML = html;

              // Button Hide/Show Logic
              if (wrapper) {
                if (items.length > limit) {
                  wrapper.classList.remove('d-none');
                } else {
                  wrapper.classList.add('d-none');
                }
              }
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