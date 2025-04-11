<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= isset($blog['title']) ? esc($blog['title']) : 'Blog Post' ?> - TeamAvenues.com</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #0d1117;
      color: #c9d1d9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .hero-header {
      background-color: #161b22;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(255,255,255,0.05);
    }
    .blog-title {
      font-size: 2.5rem;
      font-weight: 600;
      color: #58a6ff;
    }
    .blog-meta {
      font-size: 0.9rem;
      color: #8b949e;
    }
    .blog-thumbnail {
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 1.5rem;
    }
    .blog-content {
      font-size: 1.1rem;
      line-height: 1.8;
    }
    .btn-custom {
      background-color: #238636;
      color: white;
      border: none;
    }
    .btn-custom:hover {
      background-color: #2ea043;
    }
    .sidebar {
      background-color: #161b22;
      padding: 1.5rem;
      border-radius: 12px;
      margin-top: 2rem;
    }
    .sidebar h5 {
      color: #58a6ff;
    }
    iframe {
      border-radius: 8px;
      border: none;
      width: 100%;
      height: 315px;
    }
    @media (min-width: 992px) {
      .sidebar {
        position: sticky;
        top: 80px;
      }
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row g-5">
      <!-- Main Blog Content -->
      <div class="col-lg-8">
        <div class="hero-header">
          <h1 class="blog-title mb-3"><?= isset($blog['title']) ? esc($blog['title']) : 'Untitled Post' ?></h1>
          <div class="blog-meta mb-4">Posted on <?= isset($blog['created_at']) ? esc($blog['created_at']) : 'Unknown date' ?></div>
          <?php if (!empty($blog['thumbnail'])): ?>
            <div class="blog-thumbnail">
              <img src="<?= base_url('uploads/blogs/' . $blog['thumbnail']) ?>" class="img-fluid" alt="<?= esc($blog['title']) ?>">
            </div>
          <?php endif; ?>
          <div class="blog-content mb-4">
            <?= isset($blog['content']) ? $blog['content'] : '<p>No content available.</p>' ?>
          </div>
          <a href="<?= base_url('blog') ?>" class="btn btn-custom"><i class="fas fa-arrow-left me-2"></i>Back to Blog</a>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="sidebar">
          <h5>Featured Video</h5>
          <?php if (!empty($blog['featured_video'])): ?>
            <iframe src="<?= esc($blog['featured_video']) ?>" allowfullscreen></iframe>
          <?php else: ?>
            <p class="text-muted">No featured video available.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>