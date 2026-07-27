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
                <div class="slider-bg-image" data-bg-image="assets/images/hero/mission-vision.jpg"></div>
                <div class="container">
                  <div class="slider-wrapper">
                    <div class="slider-content">
                      <h1 class="slider-title invisible">Our Mission & Vision</h1>
                      <!-- <div class="slider-desc">Deteriorating scrap quality has necessitated the preparation of scrap through scrap processing machines for better efficiencies in melting furnaces.</div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Banner Slider -->

        <!-- start: About Section -->
        <section class="tj-about-section-2 section-gap rounded-0">
          <div class="container">
            <div class="row">
              <div class="col-xl-5 col-lg-5 pe-lg-4 order-lg-1 order-2 scroll-anim-right">
                <div class="about-img-area style-2 wow fadeInLeft" data-wow-delay=".3s">
                  <div class="about-img overflow-hidden">
                    <img data-speed=".8" src="assets/images/service/Driving-Innovation.png" alt="">
                  </div>
                  <!-- <div class="box-area">
                    <div class="progress-box wow fadeInUp" data-wow-delay=".3s">
                      <h4 class="title">Business Progress</h4>
                      <ul class="tj-progress-list">
                        <li>
                          <h6 class="tj-progress-title">Revenue</h6>
                          <div class="tj-progress">
                            <span class="tj-progress-percent">82%</span>
                            <div class="tj-progress-bar" data-percent="82">
                            </div>
                          </div>
                        </li>
                        <li>
                          <h6 class="tj-progress-title">Satisfaction</h6>
                          <div class="tj-progress">
                            <span class="tj-progress-percent">90%</span>
                            <div class="tj-progress-bar" data-percent="90">
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="col-xl-7 col-lg-7 ps-lg-2 order-lg-2 order-1">
                <div class="about-content-area">
                  <div class="sec-heading style-3">
                    <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Get to Know
                      Us</span>
                    <h2 class="sec-title title-highlight">Driving Innovation and Excellence for Reliable Global Logistics Solutions</h2>
                  </div>
                </div>
                <div class="about-bottom-area">
                  <div class="mission-vision-box scroll-anim-left">
                    <h4 class="title">Our Mission</h4>
                    <p class="desc">Our mission is delivering reliable logistics services through innovation, skilled teams, and efficient freight management solutions.
                    </p>
                    <ul class="list-items">
                      <li><i class="tji-list"></i>Technology & Infrastructure Growth</li>
                      <li><i class="tji-list"></i>Skilled and Passionate Team</li>
                      <li><i class="tji-list"></i>Efficient Freight Management</li>
                      <li><i class="tji-list"></i>Ethical Customer Relationships</li>
                    </ul>
                  </div>
                  <div class="mission-vision-box scroll-anim-left">
                    <h4 class="title">Our Vision</h4>
                    <p class="desc">Our vision is becoming a globally trusted logistics provider delivering reliability, flexibility, and efficient transportation services.
                    </p>
                    <ul class="list-items">
                      <li><i class="tji-list"></i>Global Logistics Leadership</li>
                      <li><i class="tji-list"></i>Reliable Service Excellence</li>
                      <li><i class="tji-list"></i>Flexible Logistics Solutions</li>
                      <li><i class="tji-list"></i>Sustainable Business Growth</li>
                    </ul>
                  </div>
                </div>
              </div>
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

        <?php include "components/why-choose-section1.php" ?>

        <?php include "components/enquiry-section1.php" ?>

        <!-- start: Project Section -->
        <section class="h7-project sec-gap bg-light">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <h2 class="sec-title txt-anim">Benefits, diversity, and alignment</h2>
                </div>
              </div>

              <div class="col-12 scroll-anim-right">
                <img src="assets/images/about/core-value.png" alt="Image" class="w-100">
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