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

        <section class="tj-page-header rounded-0" data-bg-image="assets/images/hero/blogs.jpg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="tj-page-header-content text-center">
                  <h1 class="tj-page-title">Our Blog</h1>
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="index.php">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span>Blog Grid</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="page-header-overlay" data-bg-image="assets/images/shape/pheader-overlay.webp"></div> -->
        </section>
        <!-- end: Breadcrumb Section -->

        <!-- start: Blog Section -->
        <section class="tj-blog-section sec-gap">
          <div class="container">
            <!-- <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <h2 class="sec-title txt-anim">Our Blogs</h2>
                </div>
              </div>
            </div> -->
            <div class="row row-gap-4">
              <div class="col-xl-4 col-md-6 scroll-anim-right">
                <div class="blog-item">
                  <div class="blog-thumb">
                    <a href="blog-details.php"><img src="https://www.speditionindia.com/wp-content/uploads/2026/02/freight-challenges.png" alt=""></a>
                    <div class="blog-date">
                      <span class="date">23</span>
                      <span class="month">Feb</span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      <span>By <a href="blog-details.php">Admin</a></span>
                    </div>
                    <h4 class="title"><a href="blog-details.php">Automobile Exports from India: Freight Challenges</a>
                    </h4>
                    <a class="text-btn" href="blog-details.php">
                      <span class="btn-text"><span>Read More</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 scroll-anim-right">
                <div class="blog-item">
                  <div class="blog-thumb">
                    <a href="blog-details.php"><img src="https://www.speditionindia.com/wp-content/uploads/2026/02/Export-Documentation-Demystified-768x435.jpeg" alt=""></a>
                    <div class="blog-date">
                      <span class="date">13</span>
                      <span class="month">Feb</span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      <span>By <a href="blog-details.php">Admin</a></span>
                    </div>
                    <h4 class="title"><a href="blog-details.php">Export Documentation Demystified: From Invoice to Bill of Lading</a>
                    </h4>
                    <a class="text-btn" href="blog-details.php">
                      <span class="btn-text"><span>Read More</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 scroll-anim-right">
                <div class="blog-item">
                  <div class="blog-thumb">
                    <a href="blog-details.php"><img src="https://www.speditionindia.com/wp-content/uploads/2026/02/Logistics-in-free-trade-zones-768x433.jpeg" alt=""></a>
                    <div class="blog-date">
                      <span class="date">05</span>
                      <span class="month">Feb</span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      <span>By <a href="blog-details.php">Admin</a></span>
                    </div>
                    <h4 class="title"><a href="blog-details.php">Logistics in Free Trade Zones: Benefits & Regulatory Tips – The Spedition India Perspective</a>
                    </h4>
                    <a class="text-btn" href="blog-details.php">
                      <span class="btn-text"><span>Read More</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- post pagination -->
            <div class="tj-pagination d-flex justify-content-center">
              <ul>
                <li>
                  <span aria-current="page" class="page-numbers current">01</span>
                </li>
                <li>
                  <a class="page-numbers" href="#">02</a>
                </li>
                <li>
                  <a class="next page-numbers" href="#"><i class="tji-arrow-right-long"></i></a>
                </li>
              </ul>
            </div>
          </div>

        </section>
        <!-- end: Blog Section -->

      </main>

      <?php include "include/footer.php"; ?>
    </div>
  </div>

  <!-- JS here -->
  <?php include "include/script.php"; ?>
</body>

</html>