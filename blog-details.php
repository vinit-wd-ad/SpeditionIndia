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

        <section class="tj-page-header rounded-0" data-bg-image="<?= BASE_URL ?>assets/images/hero/12.jpg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="tj-page-header-content text-center">
                  <!-- <h1 class="tj-page-title">Our Blog</h1> -->
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="<?= BASE_URL ?>">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span id="header-title"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="page-header-overlay" data-bg-image="<?= BASE_URL ?>assets/images/shape/pheader-overlay.webp"></div> -->
        </section>
        <!-- end: Breadcrumb Section -->

        <!-- start: Blog Section -->
        <section class="tj-blog-section section-gap slidebar-stickiy-container">
          <div class="container">
            <div class="row row-gap-5">
              <div class="col-lg-8">
                <div class="blog-details-wrapper">
                  <!-- Main Featured Image -->
                  <div class="blog-thumb mb-4">
                    <img id="post-image" src="" alt="" class="img-fluid rounded" style="width: 100%; display: none;">
                  </div>

                  <!-- Meta Information -->
                  <div class="blog-meta mb-3">
                    <span><i class="tji-user"></i> By <strong id="post-author">...</strong></span> |
                    <span><i class="tji-calendar"></i> <span id="post-date">...</span></span>
                  </div>

                  <!-- Post Title -->
                  <!-- <h2 id="post-title" class="mb-4">Loading Blog...</h2> -->

                  <!-- Post Main Content (WordPress HTML) -->
                  <div id="post-content" class="blog-content">
                    <p>Fetching post details...</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="tj-main-sidebar slidebar-stickiy">
                  <!-- 1. Related Posts Widget -->
                  <div class="tj-sidebar-widget tj-recent-posts wow fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Related post</h4>
                    <ul id="sidebar-recent-posts">
                      <li>
                        <p class="p-2">Loading posts...</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Blog Section -->

        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const pathSegments = window.location.pathname.split('/').filter(Boolean);
            const postSlug = pathSegments[pathSegments.length - 1];

            function decodeHTMLEntities(text) {
              if (!text) return '';
              const textArea = document.createElement('textarea');
              textArea.innerHTML = text;
              return textArea.value;
            }

            if (!postSlug || postSlug === 'blog-details.php') {
              const postTitleEl = document.getElementById('post-title');
              const postContentEl = document.getElementById('post-content');
              if (postTitleEl) postTitleEl.innerText = "Post Not Found";
              if (postContentEl) postContentEl.innerHTML = "<p>No blog post selected.</p>";
              return;
            }

            const WP_API_URL = `https://www.speditionindia.com/wp-json/wp/v2/posts?slug=${postSlug}&_embed`;

            // 2. Fetch Single Post Data
            fetch(WP_API_URL)
              .then(response => {
                if (!response.ok) throw new Error("API Network error");
                return response.json();
              })
              .then(posts => {
                if (!posts || posts.length === 0) {
                  const postTitleEl = document.getElementById('post-title');
                  const postContentEl = document.getElementById('post-content');
                  if (postTitleEl) postTitleEl.innerText = "Post Not Found";
                  if (postContentEl) postContentEl.innerHTML = "<p>The requested article could not be found.</p>";
                  return;
                }

                const post = posts[0];

                const cleanTitle = decodeHTMLEntities(post.title.rendered);

                const postTitleEl = document.getElementById('post-title');
                if (postTitleEl) {
                  postTitleEl.innerHTML = post.title.rendered;
                }

                const headerTitleEl = document.getElementById('header-title');
                if (headerTitleEl) {
                  headerTitleEl.innerText = cleanTitle;
                }

                document.title = `${cleanTitle} - Spedition India`;

                const postContentEl = document.getElementById('post-content');
                if (postContentEl) {
                  postContentEl.innerHTML = post.content.rendered;
                }

                const imageEl = document.getElementById('post-image');
                const featuredImgUrl = post._embedded?.['wp:featuredmedia']?.[0]?.source_url;
                if (imageEl && featuredImgUrl) {
                  imageEl.src = featuredImgUrl;
                  imageEl.alt = cleanTitle;
                  imageEl.style.display = "block";
                }

                const authorEl = document.getElementById('post-author');
                if (authorEl) {
                  const author = post._embedded?.['author']?.[0]?.name || 'Admin';
                  authorEl.innerText = author;
                }

                const dateEl = document.getElementById('post-date');
                if (dateEl) {
                  const postDate = new Date(post.date);
                  const formattedDate = postDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                  });
                  dateEl.innerText = formattedDate;
                }
              })
              .catch(error => {
                console.error('Error fetching blog details:', error);
                const postTitleEl = document.getElementById('post-title');
                const postContentEl = document.getElementById('post-content');
                if (postTitleEl) postTitleEl.innerText = "Error Loading Post";
                if (postContentEl) postContentEl.innerHTML = "<p>Something went wrong while fetching content.</p>";
              });
          });
        </script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const WP_BASE_URL = "https://www.speditionindia.com/wp-json/wp/v2";

            // 1. Fetch Related/Recent Posts
            function loadSidebarRecentPosts() {
              const recentContainer = document.getElementById("sidebar-recent-posts");
              if (!recentContainer) return;

              fetch(`${WP_BASE_URL}/posts?_embed&per_page=5`)
                .then(res => res.json())
                .then(posts => {
                  let html = '';
                  posts.forEach(post => {
                    const title = post.title.rendered;
                    const link = `<?= BASE_URL ?>blog/${post.slug}`;
                    const image = post._embedded?.['wp:featuredmedia']?.[0]?.source_url || 'https://via.placeholder.com/150';

                    // Date Format (13 FEB 2026)
                    const dateObj = new Date(post.date);
                    const formattedDate = dateObj.toLocaleDateString('en-US', {
                      day: '2-digit',
                      month: 'short',
                      year: 'numeric'
                    }).toUpperCase();

                    html += `
                        <li>
                            <div class="post-thumb">
                                <a href="${link}"><img src="${image}" alt="${title}"></a>
                            </div>
                            <div class="post-content">
                                <h6 class="post-title">
                                    <a href="${link}">${title}</a>
                                </h6>
                                <div class="blog-meta">
                                    <ul>
                                        <li>${formattedDate}</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    `;
                  });
                  recentContainer.innerHTML = html;
                })
                .catch(err => {
                  console.error("Sidebar Posts Error:", err);
                  recentContainer.innerHTML = '<li>Unable to load posts</li>';
                });
            }

            // Call Sidebar Functions
            loadSidebarRecentPosts();
          });
        </script>
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