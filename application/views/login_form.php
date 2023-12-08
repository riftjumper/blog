<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Login</h3>
            </div>
            <div class="card-body">
                <!-- Login Form -->
                <form id="loginForm" method="post" action="<?= base_url('auth/login')?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" >Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    // Function to handle login
    // function login() {
    //     var username = $('#username').val()
    //     var password = $('#password').val()
    //     $.ajax({
    //         type: 'POST',
    //         url: '<?php echo site_url('auth/login'); ?>', // Adjust the URL based on your controller method
    //         data: {username,password},
    //         success: function (response) {
    //             // Handle the login response
    //             console.log(response);
    //             // You might redirect or perform additional actions based on the response
    //         }
    //     });
    // }
</script>

</body>
</html>
