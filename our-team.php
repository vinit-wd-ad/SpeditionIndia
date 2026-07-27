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
                <div class="slider-bg-image" data-bg-image="assets/images/hero/our-team.jpg"></div>
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

        <!-- start: Team Section -->
        <section class="tj-team-section sec-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <!--<span class="sub-title wow fadeInUp" data-wow-delay=".1s"><i class="tji-box"></i>Meet Our Team</span>-->
                  <h2 class="sec-title txt-anim">People Behind <span>Spedition.</span></h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-sm-6">
                <div class="team-item card" data-project-id="harpreet-singh">
                  <div class="team-img open-team-modal">
                    <div class="team-img-inner">
                      <img src="assets/images/team/harpreet1.jpeg" alt="">
                    </div>
                  </div>

                  <div class="team-content open-team-modal p-2">
                    <h5 class="title"><a>Harpreet Singh</a></h5>
                    <span class="designation">Head Operations</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="team-item card" data-project-id="munish-bhardwaj">
                  <div class="team-img open-team-modal">
                    <div class="team-img-inner">
                      <img src="https://speditionindia.com/wp-content/uploads/2021/09/munish-150x150.jpg" alt="">
                    </div>
                  </div>

                  <div class="team-content open-team-modal p-2">
                    <h5 class="title"><a>Munish Bhardwaj</a></h5>
                    <span class="designation">Country Head Fairs & Exhibitions</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Team Section -->


        <?php include "components/enquiry-section1.php" ?>

        <?php include "components/why-choose-section1.php" ?>

      </main>

      <?php include "include/footer.php"; ?>
    </div>
  </div>

  <div id="teamModal" class="modal">
    <div class="modal-content" style="min-width: 80%; border: none; margin-top: 5%;">
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