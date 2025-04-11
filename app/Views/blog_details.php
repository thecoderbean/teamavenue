<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= esc($post['title']) ?> - Team Avenue Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= esc(word_limiter(strip_tags($post['content']), 25)) ?>">
    <meta name="author" content="Team Avenue">
    <link rel="stylesheet" href="<?= base_url('assets/css/blog.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<header>
    <h1><a href="<?= base_url('/blog') ?>">← Back to Blog</a></h1>
</header>

<div class="container">
    <div class="blog-post">
        <?php if (isset($post['thumbnail']) && !empty($post['thumbnail'])): ?>
            <img src="<?= base_url($post['thumbnail']) ?>" alt="<?= esc($post['title']) ?>">
        <?php endif; ?>
        
        <h2><?= esc($post['title']) ?></h2>
        
        <div class="meta">
            Published on <?= date('F d, Y', strtotime($post['created_at'])) ?>
        </div>

        <div class="content">
            <?= isset($post['content']) ? $post['content'] : '' ?>
        </div>

        <?php if (isset($post['featured_video']) && !empty($post['featured_video'])): ?>
            <div class="video">
                <?php
                    // Convert watch URL to embed URL if necessary
                    $embedUrl = (strpos($post['featured_video'], 'watch?v=') !== false) 
                        ? preg_replace('/watch\?v=([a-zA-Z0-9_-]+)/', 'embed/$1', $post['featured_video']) 
                        : $post['featured_video'];
                ?>
                <iframe width="100%" height="400" src="<?= esc($embedUrl) ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php endif; ?>
    </div>

    <aside>
        <div class="widget">
            <h3>Featured Video</h3>
            <div class="youtube">
                <?php if (isset($post['featured_video']) && !empty($post['featured_video'])): ?>
                    <?php
                        $embedUrl = (strpos($post['featured_video'], 'watch?v=') !== false) 
                            ? preg_replace('/watch\?v=([a-zA-Z0-9_-]+)/', 'embed/$1', $post['featured_video']) 
                            : $post['featured_video'];
                    ?>
                    <iframe 
                        width="100%" 
                        height="200" 
                        src="<?= esc($embedUrl) ?>?autoplay=1&mute=1" 
                        frameborder="0" 
                        allow="autoplay; encrypted-media" 
                        allowfullscreen>
                    </iframe>
                <?php else: ?>
                    <p>No featured video available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="widget">
            <h3>Recent Posts</h3>
            <ul>
                <?php if (!empty($recentPosts)): ?>
                    <?php foreach (array_slice($recentPosts, 0, 3) as $recentPost): ?>
                        <li>
                            <a href="<?= base_url('blog/' . $recentPost['slug']) ?>">
                                <?= esc($recentPost['title']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No recent posts available.</li>
                <?php endif; ?>
            </ul>
        </div>
    </aside>
</div>

</body>
</html>