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
          <video class="w-100 object-cover" src="assets/images/hero/transport-optimization.mp4" autoplay muted loop playsinline></video>
        </section>
        <!-- end: Banner Slider -->

        <!-- start: About Section -->
        <section class="tj-about-section sec-gap">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 order-lg-1 order-2 scroll-anim-right">
                <div class="about-img-area style-2">
                  <div class="about-img overflow-hidden">
                    <img data-speed=".8" src="assets/images/service/transport-optimization.png" alt="">
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 order-lg-2 order-1 scroll-anim-left">
                <div class="about-content-area">
                  <div class="sec-heading style-3">
                    <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Transport</span>
                    <h2 class="sec-title txt-anim">Transport optimization</h2>
                    <p class="desc my-4">Transport optimization is an important part of the supply chain Management System. It involves optimizing the transportation management system of goods and materials to reduce costs, increase efficiency and improve customer satisfaction.</p>
                    <p class="desc my-4">Spedition offers Transport Optimisation Solutions that are customized to individual clients’ needs. We analyse customer’s requirements for transport operations using advanced tools and techniques. After that, we identify areas of improvement and develop strategies. That will help reduce the customer’s overhead, and goods reach their destination quickly. We customized the route to reduce your transportation costs while maintaining a high standard of service with on-time deliveries.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="vactor">
              <img src="assets/images/icons/ship-vector.png" alt="" class="ship">
            </div>
          </div>
          <div class="bg-shape-1">
            <img src="assets/images/shape/pattern-2.svg" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="assets/images/shape/pattern-3.svg" alt="">
          </div>
        </section>
        <!-- end: About Section -->

        <?php include "components/enquiry-section1.php" ?>

        <!-- start: Project Section -->
        <section class="h7-project sec-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <h2 class="sec-title txt-anim">Industry sectors</h2>
                </div>
              </div>
              <div class="col-12 industry-sectors scroll-anim-right">
                <div class="row justify-content-center text-center row-gap-5">
                  <div class="col-lg-3">
                    <i class="fas fa-shopping-basket"></i>
                    <h4>FMCG</h4>
                  </div>
                  <div class="col-lg-3">
                    <i class="fas fa-tshirt"></i>
                    <h4>Lifestyle</h4>
                  </div>
                  <div class="col-lg-3">
                    <i class="fas fa-store"></i>
                    <h4>Retail</h4>
                  </div>
                  <div class="col-lg-3">
                    <i class="fas fa-flask"></i>
                    <h4>Chemicals</h4>
                  </div>
                  <div class="col-lg-3">
                    <i class="fas fa-car"></i>
                    <h4>Automotive</h4>
                  </div>
                  <div class="col-lg-3">
                    <i class="fas fa-laptop"></i>
                    <h4>Electronic</h4>
                  </div>
                  <div class="col-lg-3">
                    <i class="fas fa-truck-moving"></i>
                    <h4>Oversized Cargo</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Project Section -->

      </main>

      <?php include "include/footer.php"; ?>
    </div>
  </div>

  <!-- JS here -->
  <?php include "include/script.php"; ?>
</body>

</html>