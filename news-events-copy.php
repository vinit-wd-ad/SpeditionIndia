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

        <!-- start: Associated Members -->
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
              <div class="col-12 ">
                <div class="blog-wrapper h8-blog-wrapper h10-blog-wrapper ">
                  <div class="blog-item style-2 flex-row scroll-anim">
                    <div class="blog-thumb">
                      <a href="upcoming-event.php"><img src="https://www.speditionindia.com/wp-content/uploads/2024/11/WhatsApp-Image-2024-11-04-at-1.57.30-PM.jpeg" alt=""></a>
                    </div>
                    <div class="blog-content">
                      <div class="title-area">
                        <h3 class="title"><a href="upcoming-event.php">Global Freight Forwarders Conference</a></h3>
                        <a class="text-btn" href="upcoming-event.php">
                          <span class="btn-text"><span>Read More</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                        
                      </div>
                      <div class="blog-meta align-items-end">
                        <div class="blog-date-wrapper text-end">
                          <h3 class="">May 12</h3>
                          <span class="blog-date">May 12, 2023 - May 15, 2023</span>
                        </div>
                        <span class="categories text-end">
                          <i class="fa fa-map-marker-alt"></i>
                          Bangkok, Thailand
                        </span>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Associated Members -->

        <!-- start: Associated Members -->
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
              <div class="col-12 ">
                <div class="blog-wrapper h8-blog-wrapper h10-blog-wrapper ">
                  <div class="blog-item style-2 flex-row scroll-anim">
                    <div class="blog-thumb">
                      <a href="5th-annual-global-meeting.php"><img src="https://www.speditionindia.com/wp-content/uploads/2023/09/global-meeting.png" alt=""></a>
                    </div>
                    <div class="blog-content">
                      <div class="title-area">
                        <h3 class="title"><a href="5th-annual-global-meeting.php">5th Annual global meeting</a></h3>
                        <a class="text-btn" href="5th-annual-global-meeting.php">
                          <span class="btn-text"><span>Read More</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                        
                      </div>
                      <div class="blog-meta align-items-end">
                        <div class="blog-date-wrapper text-end">
                          <h3 class="">October 12</h3>
                          <span class="blog-date">October 12, 2023 - October 15, 2023</span>
                        </div>
                        <span class="categories text-end">
                          <i class="fa fa-map-marker-alt"></i>
                          Expo Centre, Shanghai, China
                        </span>

                      </div>
                    </div>
                  </div>
                  <!-- <div class="blog-item style-2 scroll-anim">
                    <div class="blog-thumb">
                      <a href="blog-details.html"><img src="assets/images/blog/blog-5.webp" alt=""></a>
                    </div>
                    <div class="blog-content">
                      <div class="blog-meta">
                        <div class="blog-date-wrapper">
                          <span class="blog-author">By <a href="blog-details.html">Ellinien Loma</a></span>
                          <span class="blog-date">June 20, 2025</span>
                        </div>
                        <span class="categories"><a href="blog-details.html">Success</a></span>

                      </div>
                      <div class="title-area">
                        <h3 class="title"><a href="blog-details.html">Mastering Change Management Lessons for
                            Businesses.</a></h3>
                        <a class="text-btn" href="blog-details.html">
                          <span class="btn-text"><span>Read More</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Associated Members -->

      </main>

      <?php include "include/footer.php"; ?>
    </div>
  </div>

  <div id="teamModal" class="modal">
    <div class="modal-content">
      <span class="close-btn-products">&times;</span>
      <div class="row">
        <div class="col-md-5">
          <img src="" alt="" id="teamMemberImg" class="w-100">
        </div>
        <div class="col-md-7 d-flex flex-column justify-content-center">
          <h3 id="teamMemberTitle" class="my-2"></h3>
          <p id="teamMemberDesignation" class="mb-4 text-theme"></p>
          <p id="teamMemberDesc"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- JS here -->
  <?php include "include/script.php"; ?>
</body>

</html>