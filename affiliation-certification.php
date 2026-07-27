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
                <div class="slider-bg-image" data-bg-image="assets/images/hero/affiliation-certification.jpg"></div>
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

        <!-- start: Associated Members -->
        <section class="h7-project sec-gap bg-light">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <h2 class="sec-title txt-anim">Affiliation Certification</h2>
                </div>
              </div>
            </div>
            <div class="row row-gap-md-3 justify-content-center">
              <div class="col-md-3 scroll-anim-right">
                <img src="https://www.speditionindia.com/wp-content/uploads/2023/09/iso-certificate.jpg" alt="" class="border preview">
              </div>

              <div class="col-md-3 scroll-anim-right">
                <img src="http://speditionindia.com/wp-content/uploads/2023/09/meme-certificate-768x1105.jpg" alt="" class="border preview">
              </div>

              <div class="col-md-6 scroll-anim-right">
                <img src="https://www.speditionindia.com/wp-content/uploads/2023/09/iata-certificate.jpg" alt="" class="border preview">
              </div>
            </div>
          </div>
        </section>
        <!-- end: Associated Members -->

        <?php include "components/enquiry-section1.php" ?>

        <?php include "components/why-choose-section1.php" ?>

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