<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2>Edit Article</h2>

        <!-- Article Form -->
        <form id="editArticleForm" action="<?php echo site_url('article/update/') . $article->id; ?>" method="post">
            <input type="hidden" id="editId" name="id" value="<?php echo $article->id; ?>">
            <div class="form-group">
                <label for="editPhoto">Photo (Image URL):</label>
                <input type="text" class="form-control" id="editPhoto" name="photo"
                    value="<?php echo $article->photo; ?>" required>
            </div>
            <div class="form-group">
                <label for="editTitle">Title:</label>
                <input type="text" class="form-control" id="editTitle" name="title"
                    value="<?php echo $article->title; ?>" required>
            </div>
            <div class="form-group">
                <label for="editContent">Content:</label>
                <textarea class="form-control" id="editContent" name="content" rows="4"
                    required><?php echo $article->content; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Article</button>
            <a class="btn btn-danger" href="<?php echo site_url('article') ?>" role="button">Cancel</a>
        </form>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>