<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Explore the latest blog posts from TeamAvenues. Stay updated with insightful content.">
  <meta name="keywords" content="blog, TeamAvenues, dark theme, modern design">
  <title><?= esc($title) ?> - TeamAvenues.com</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Base reset and typography */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      background-color: #121416;
      color: #e0e0e0;
      font-family: 'Inter', sans-serif;
      line-height: 1.6;
      overflow-x: hidden;
    }
    a {
      text-decoration: none;
      color: inherit;
    }
    h1, h2, h3, h4, h5, h6 {
      color: #ffffff;
    }

    /* Header and navigation */
    .main-header {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      background: rgba(18, 20, 22, 0.95);
      backdrop-filter: blur(12px);
      padding: 1rem 2rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .nav-logo {
      font-size: 1.6rem;
      font-weight: 700;
      color: #ffffff;
      transition: color 0.3s;
    }
    .nav-logo:hover {
      color: #00aaff;
    }
    .nav-menu {
      list-style: none;
      display: flex;
      gap: 2rem;
    }
    .nav-menu li a {
      font-weight: 500;
      color: #e0e0e0;
      transition: color 0.3s ease;
    }
    .nav-menu li a:hover,
    .nav-menu li a.active {
      color: #00aaff;
    }

    /* Container settings */
    .container {
      max-width: 1240px;
      margin: 0 auto;
      padding: 6rem 1.5rem 3rem;
    }

    /* Blog Card Design */
    .blog-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      grid-gap: 2.5rem;
    }
    .blog-card {
      background-color: #1e2128;
      border-radius: 16px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .blog-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
    }
    .blog-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .blog-card:hover img {
      transform: scale(1.08);
    }
    .card-body {
      padding: 1.75rem;
      flex-grow: 1;
    }
    .card-title {
      font-size: 1.4rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }
    .card-text {
      color: #b0b3b8;
      font-size: 1rem;
      margin-bottom: 1.5rem;
    }
    .btn-primary {
      background-color: #00aaff;
      border: none;
      border-radius: 10px;
      padding: 0.6rem 1.25rem;
      font-weight: 600;
      color: #ffffff;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-primary:hover {
      background-color: #0088cc;
      transform: translateY(-2px);
    }
    .card-footer {
      background-color: #2a2d35;
      padding: 1rem 1.75rem;
      font-size: 0.9rem;
      color: #b0b3b8;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      text-align: right;
    }

    /* Sidebar Styling */
    .sidebar {
      position: sticky;
      top: 130px;
    }
    .sidebar .card {
      background-color: #242830;
      border: none;
      border-radius: 16px;
      padding: 1.75rem;
      margin-bottom: 2.5rem;
    }
    .sidebar h3 {
      font-size: 1.75rem;
      margin-bottom: 1.75rem;
    }
    .recent-post {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
      transition: transform 0.3s ease;
    }
    .recent-post:hover {
      transform: translateX(5px);
    }
    .recent-post img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 10px;
      margin-right: 1.25rem;
      flex-shrink: 0;
    }
    .recent-post a {
      color: #e0e0e0;
      font-size: 1rem;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    .recent-post a:hover {
      color: #00aaff;
    }

    /* Featured Video Section */
    .featured-video {
      background-color: #242830;
      border-radius: 16px;
      padding: 1.75rem;
      margin-bottom: 2.5rem;
    }
    .featured-video h3 {
      font-size: 1.6rem;
      margin-bottom: 1.25rem;
    }
    .featured-video video {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Animations */
    .fade-in {
      opacity: 0;
      animation: fadeIn 1s ease forwards;
    }
    @keyframes fadeIn {
      to { opacity: 1; }
    }

    /* Footer */
    .footer {
      background-color: #1e2128;
      padding: 3rem 1.5rem;
      text-align: center;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    .footer p {
      font-size: 0.95rem;
      color: #b0b3b8;
      margin-bottom: 1rem;
    }
    .footer .social-links a {
      color: #e0e0e0;
      font-size: 1.2rem;
      margin: 0 0.75rem;
      transition: color 0.3s ease;
    }
    .footer .social-links a:hover {
      color: #00aaff;
    }
    .footer a {
      color: #00aaff;
      transition: color 0.3s ease;
    }
    .footer a:hover {
      color: #0088cc;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .main-header {
        padding: 1rem;
      }
      .nav-menu {
        gap: 1.25rem;
      }
      .container {
        padding-top: 5rem;
      }
      .blog-grid {
        grid-template-columns: 1fr;
      }
      .sidebar {
        position: static;
        margin-top: 3rem;
      }
    }

    /* Smooth Scroll */
    html {
      scroll-behavior: smooth;
    }

    /* Scroll-to-top button */
    .scroll-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #00aaff;
      color: #ffffff;
      border: none;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
      z-index: 1000;
    }
    .scroll-top.visible {
      opacity: 1;
    }
    .scroll-top:hover {
      background-color: #0088cc;
    }
  </style>
</head>
<body>
  <!-- Header with Navigation -->
  <header class="main-header d-flex justify-content-between align-items-center">
    <a href="/">
    <div class="nav-logo">TeamAvenue</div>
</a>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <!-- Blog Grid -->
      <div class="col-lg-8">
        <div class="blog-grid">
          <?php foreach ($blogs as $index => $blog): ?>
            <div class="blog-card fade-in" style="animation-delay: <?= $index * 0.2 ?>s;">
              <?php if ($blog['thumbnail']): ?>
                <img src="<?= base_url('uploads/blogs/' . $blog['thumbnail']) ?>" alt="<?= esc($blog['title']) ?>" loading="lazy">
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title"><?= esc($blog['title']) ?></h5>
                <p class="card-text"><?= substr(strip_tags($blog['content']), 0, 120) ?>...</p>
                <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="btn btn-primary">Read More</a>
              </div>
              <div class="card-footer">
                <small>Posted on <?= esc($blog['created_at']) ?></small>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <aside class="sidebar">
          <!-- Featured Video -->
          <?php if (!empty($blogs[0]) && isset($blogs[0]['video'])): ?>
            <div class="featured-video fade-in" style="animation-delay: 0.4s;">
              <h3>Featured Video</h3>
              <video controls preload="metadata">
                <source src="<?= base_url('uploads/blogs/' . $blogs[0]['video']) ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          <?php endif; ?>

          <!-- Recent Posts -->
          <div class="card fade-in" style="animation-delay: 0.6s;">
            <h3>Recent Posts</h3>
            <?php foreach (array_slice($blogs, 0, 5) as $recent): ?>
              <div class="recent-post">
                <?php if ($recent['thumbnail']): ?>
                  <img src="<?= base_url('uploads/blogs/' . $recent['thumbnail']) ?>" alt="<?= esc($recent['title']) ?>" loading="lazy">
                <?php endif; ?>
                <a href="<?= base_url('blog/' . $recent['slug']) ?>"><?= esc($recent['title']) ?></a>
              </div>
            <?php endforeach; ?>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2023 TeamAvenues. All rights reserved. | <a href="#privacy">Privacy Policy</a> | <a href="#terms">Terms of Service</a></p>
    <div class="social-links">
      <a href="#twitter" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
      <a href="#facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
      <a href="#instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
    </div>
  </footer>

  <!-- Scroll-to-Top Button -->
  <button class="scroll-top" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Smooth scroll for anchor links
    $('a[href*="#"]').on('click', function (e) {
      e.preventDefault();
      const target = $($(this).attr('href'));
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - 70
        }, 600);
      }
    });

    // Lazy loading images (already implemented via loading="lazy" attribute)
    // Scroll-to-top button visibility
    $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
        $('.scroll-top').addClass('visible');
      } else {
        $('.scroll-top').removeClass('visible');
      }
    });
    $('.scroll-top').click(function () {
      $('html, body').animate({ scrollTop: 0 }, 600);
    });
  </script>
</body>
</html>