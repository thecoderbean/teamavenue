<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - TeamAvenues.com</title>
    <link href="<?= base_url('asset/assets/css/bootstrap.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('asset/assets/css/font-awesome.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('asset/assets/css/custom.css') ?>" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="my-4">Blog</h1>
        <div class="row">
            <?php foreach ($blogs as $blog): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if ($blog['thumbnail']): ?>
                            <img src="<?= base_url('uploads/blogs/' . $blog['thumbnail']) ?>" class="card-img-top" alt="<?= esc($blog['title']) ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($blog['title']) ?></h5>
                            <p class="card-text"><?= substr(strip_tags($blog['content']), 0, 100) ?>...</p>
                            <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="btn btn-primary">Read More</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Posted on <?= esc($blog['created_at']) ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="<?= base_url('asset/assets/js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('asset/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset/assets/js/custom.js') ?>"></script>
</body>
</html>