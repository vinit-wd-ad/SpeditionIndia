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
                      <a href="<?= BASE_URL ?>">Home</a>
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
              <div id="wordpress-blogs-wrapper">
              </div>
              <script>
                document.addEventListener("DOMContentLoaded", function() {
                  const wrapper = document.getElementById("wordpress-blogs-wrapper");
                  if (!wrapper) return;

                  // Aapka WordPress API Endpoint
                  const WP_API_URL = "https://www.speditionindia.com/wp-json/wp/v2/posts";
                  const POSTS_PER_PAGE = 6;

                  function fetchAndRenderBlogs(page = 1) {
                    // Fetch API request
                    fetch(`${WP_API_URL}?_embed&per_page=${POSTS_PER_PAGE}&page=${page}`)
                      .then(response => {
                        if (!response.ok) throw new Error("API network error");

                        const totalPages = parseInt(response.headers.get("X-WP-TotalPages")) || 1;

                        return response.json().then(posts => ({
                          posts,
                          totalPages
                        }));
                      })
                      .then(({
                        posts,
                        totalPages
                      }) => {
                        renderBlogGrid(posts);
                        renderPagination(page, totalPages);
                      })
                      .catch(error => {
                        console.error("Error loading blogs:", error);
                        wrapper.innerHTML = `<p class="text-center text-danger">Unable to load blogs at the moment.</p>`;
                      });
                  }

                  // 1. Grid Render Function
                  function renderBlogGrid(posts) {
                    let gridHtml = `<div class="row row-gap-4">`;

                    posts.forEach(post => {
                      // Title & Link
                      const title = post.title.rendered;
                      // const link = post.link;
                      const link = `blog/${post.slug}`;

                      // Featured Image Extraction
                      const image = post._embedded?.['wp:featuredmedia']?.[0]?.source_url || 'https://via.placeholder.com/768x435';

                      // Date Formatting (DD & Mon)
                      const postDate = new Date(post.date);
                      const dateNum = String(postDate.getDate()).padStart(2, '0');
                      const monthName = postDate.toLocaleString('en-US', {
                        month: 'short'
                      });

                      // Author Name Extraction
                      const author = post._embedded?.['author']?.[0]?.name || 'Admin';

                      gridHtml += `
                                <div class="col-xl-4 col-md-6 scroll-anim-right">
                                    <div class="blog-item">
                                        <div class="blog-thumb">
                                            <a href="${link}"><img src="${image}" alt="${title}"></a>
                                            <div class="blog-date">
                                                <span class="date">${dateNum}</span>
                                                <span class="month">${monthName}</span>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <span>By <a href="${link}">${author}</a></span>
                                            </div>
                                            <h4 class="title">
                                                <a href="${link}">${title}</a>
                                            </h4>
                                            <a class="text-btn" href="${link}">
                                                <span class="btn-text"><span>Read More</span></span>
                                                <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `;
                    });

                    gridHtml += `</div>`;
                    wrapper.innerHTML = gridHtml;
                  }

                  // 2. Pagination Render Function
                  function renderPagination(currentPage, totalPages) {
                    if (totalPages <= 1) return;

                    let paginationHtml = `
                        <div class="tj-pagination d-flex justify-content-center mt-5">
                            <ul>
                    `;

                    // 1. Previous Button
                    if (currentPage > 1) {
                      paginationHtml += `
                          <li>
                              <a class="prev page-numbers" href="#" data-page="${currentPage - 1}">
                                  <i class="tji-arrow-left-long"></i>
                              </a>
                          </li>
                      `;
                    }

                    // 2. Dynamic 5-Page Range Logic
                    let maxVisiblePages = 5;
                    let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                    let endPage = startPage + maxVisiblePages - 1;

                    if (endPage > totalPages) {
                      endPage = totalPages;
                      startPage = Math.max(1, endPage - maxVisiblePages + 1);
                    }

                    // First Page Direct Jump
                    if (startPage > 1) {
                      paginationHtml += `
                          <li><a class="page-numbers" href="#" data-page="1">01</a></li>
                      `;
                      if (startPage > 2) {
                        paginationHtml += `<li><span class="page-numbers dots">...</span></li>`;
                      }
                    }

                    // 3. Render Limited Pages (Max 5)
                    for (let i = startPage; i <= endPage; i++) {
                      const pageFormatted = String(i).padStart(2, '0');
                      if (i === currentPage) {
                        paginationHtml += `
                            <li>
                                <span aria-current="page" class="page-numbers current">${pageFormatted}</span>
                            </li>
                        `;
                      } else {
                        paginationHtml += `
                            <li>
                                <a class="page-numbers" href="#" data-page="${i}">${pageFormatted}</a>
                            </li>
                        `;
                      }
                    }

                    // Last Page Direct Jump
                    if (endPage < totalPages) {
                      if (endPage < totalPages - 1) {
                        paginationHtml += `<li><span class="page-numbers dots">...</span></li>`;
                      }
                      paginationHtml += `
                          <li><a class="page-numbers" href="#" data-page="${totalPages}">${String(totalPages).padStart(2, '0')}</a></li>
                      `;
                    }

                    // 4. Next Button
                    if (currentPage < totalPages) {
                      paginationHtml += `
                            <li>
                                <a class="next page-numbers" href="#" data-page="${currentPage + 1}">
                                    <i class="tji-arrow-right-long"></i>
                                </a>
                            </li>
                        `;
                                    }

                                    paginationHtml += `
                            </ul>
                        </div>
                    `;

                    wrapper.insertAdjacentHTML('beforeend', paginationHtml);

                    // 5. Click Events
                    const pageButtons = wrapper.querySelectorAll('.page-numbers[data-page]');
                    pageButtons.forEach(btn => {
                      btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const selectedPage = parseInt(this.getAttribute('data-page'));
                        fetchAndRenderBlogs(selectedPage);

                        wrapper.scrollIntoView({
                          behavior: 'smooth'
                        });
                      });
                    });
                  }

                  // Initial API Load
                  fetchAndRenderBlogs(1);
                });
              </script>
            </div>

          </div>

        </section>
        <!-- end: Blog Section -->

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