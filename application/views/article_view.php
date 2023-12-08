<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Article Details</title>
</head>

<body>

    <?php if (!empty($article)): ?>
        <h2>
            <?php echo isset($article->title) ? $article->title : ''; ?>
        </h2>
        <img src="<?php echo isset($article->photo) ? $article->photo : ''; ?>" alt="Article Image"
            style="max-width: 300px; max-height: 300px;">
        <p>
            <?php echo isset($article->content) ? $article->content : ''; ?>
        </p>
        <p>Created at:
            <?php echo isset($article->created_at) ? $article->created_at : ''; ?>
        </p>
        <p>Updated at:
            <?php echo isset($article->updated_at) ? $article->updated_at : ''; ?>
        </p>
    <?php else: ?>
        <p>Article not found</p>
    <?php endif; ?>

</body>

</html>