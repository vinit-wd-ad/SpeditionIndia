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
                <div class="slider-bg-image" data-bg-image="assets/images/hero/our-gallery.jpg"></div>
                <div class="container">
                  <div class="slider-wrapper">
                    <div class="slider-content">
                      <h1 class="slider-title invisible">Our Team</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Banner Slider -->

        <!-- start: About Section -->
        <section class="tj-about-section sec-gap">
          <div class="container">
            <!-- <h2 class="text-center mb-4">Masonry Style Gallery (No Gaps)</h2> -->
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center mb-4">
                  <h2 class="sec-title txt-anim">Captured Moments</h2>
                </div>
              </div>
            </div>
            <div class="masonry-gallery">

              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-4-769x1024.jpeg" alt="Image 1">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-8-768x1024.jpeg" alt="Image 6">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-10-768x1024.jpeg" alt="Image 7">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-3-769x1024.jpeg" alt="Image 8">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-5-576x1024.jpeg" alt="Image 8">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-6-1-1024x576.jpeg" alt="Image 8">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-1-1024x576.jpeg" alt="Image 2">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-9-1024x852.jpeg" alt="Image 5">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-11-1024x576.jpeg" alt="Image 3">
              </div>
              <div class="gallery-item">
                <img src="https://www.speditionindia.com/wp-content/uploads/2024/08/spedition1-7-768x1024.jpeg" alt="Image 4">
              </div>

            </div>
          </div>
        </section>
        <!-- end: About Section -->

      </main>

      <?php include "include/footer.php"; ?>

    </div>
  </div>

  <!-- JS here -->
  <?php include "include/script.php"; ?>
</body>

</html>