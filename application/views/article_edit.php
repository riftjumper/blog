<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Article Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Article Dashboard</h2>

        <!-- Article Form -->
        <form id="articleForm">
            <div class="form-group">
                <label for="photo">Photo (Image URL):</label>
                <input type="text" class="form-control" id="photo" name="photo" value="" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="saveArticle()">Save Article</button>
        </form>
    </div>

</body>