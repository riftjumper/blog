<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Article Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <?php if (!empty($article)): ?>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?php echo isset($article->title) ? $article->title : ''; ?>
                    </h2>
                    <img src="<?php echo isset($article->photo) ? $article->photo : ''; ?>" alt="Article Image"
                        class="img-fluid mb-3" style="max-width: 100%; max-height: 300px;">
                    <p class="card-text">
                        <?php echo isset($article->content) ? $article->content : ''; ?>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Created at:
                            <?php echo isset($article->created_at) ? $article->created_at : ''; ?>
                        </small>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Updated at:
                            <?php echo isset($article->updated_at) ? $article->updated_at : ''; ?>
                        </small>
                    </p>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-3" role="alert">
                <p>Article not found</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>