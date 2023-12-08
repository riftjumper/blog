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
                <label for="id">ID :</label>
                <input type="text" class="form-control" id="articleId" name="articleId" value="" required>
            </div>
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

        <hr>


        <table id="articleTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTable content will be loaded here -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var dataTable = $('#articleTable').DataTable({
                "ajax": {
                    "url": "<?php echo site_url('article/get_articles'); ?>",
                    "type": "POST",
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "photo",
                        "render": function(data, type, row) {
                            return '<img src="' + data + '" alt="Article Image" style="max-width: 100px; max-height: 100px;">';
                        }
                    },
                    {
                        "data": "title",
                        "render": function(data, type, row) {
                            return '<a href="<?php echo site_url('article/view/') ?>' + row.id + '">' + data + '</a>';
                        }
                    },
                    {
                        "data": "content"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<button type="button" class="btn btn-warning btn-sm" onclick="editArticle(\'' + row.id + '\')">Edit</button> ' +
                                '<button type="button" class="btn btn-danger btn-sm" onclick="deleteArticle(\'' + row.id + '\')">Delete</button>';
                        }
                    }
                ]
            });

            window.saveArticle = function() {
                var formData = $('#articleForm').serialize();
                console.log(formData);
                var articleId = $('#articleId').val();
                console.log(articleId);

                var url = articleId ? '<?php echo site_url('article/update') ?>' : '<?php echo site_url('article/add') ?>'

                if (articleId) {
                    formData += '&id=' + articleId;
                }

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function() {
                        dataTable.ajax.reload();
                        $('#articleForm')[0].reset();
                        $('#articleId').val('');
                    }
                });
            };

            window.deleteArticle = function(id) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('article/delete/'); ?>' + id,
                    success: function() {
                        dataTable.ajax.reload();
                    },
                    error: function(error) {
                        console.error('Error deleting article:', error);
                    }
                })
            }

            window.editArticle = function(id) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url(('article/edit/')) ?>' + id,
                    success: function(data) {
                        var article = JSON.parse(data);
                        console.log(article);
                        $('#articleId').val(article.id);
                        $('#photo').val(article.photo);
                        $('#title').val(article.title);
                        $('#content').val(article.content);
                    },
                    error: function(error) {
                        console.error('Error retrieving data:', errror);
                    }
                })
            }
        });
    </script>

</body>

</html>