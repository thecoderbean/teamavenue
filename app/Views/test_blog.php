<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Blog Data</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Test Blog Data</h1>
    <?php if (!empty($posts) && is_array($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div>
                <h2><?php echo isset($post['title']) ? $post['title'] : 'No title'; ?></h2>
                <p><?php echo isset($post['content']) ? $post['content'] : 'No content'; ?></p>
                <p>Slug: <?php echo isset($post['slug']) ? $post['slug'] : 'No slug'; ?></p>
                <p>Created: <?php echo isset($post['created_at']) ? $post['created_at'] : 'No date'; ?></p>
                <p>Thumbnail: <?php echo isset($post['thumbnail']) ? $post['thumbnail'] : 'No thumbnail'; ?></p>
                <p>Video: <?php echo isset($post['featured_video']) ? $post['featured_video'] : 'No video'; ?></p>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No data found in the blogs table.</p>
    <?php endif; ?>
</body>
</html>