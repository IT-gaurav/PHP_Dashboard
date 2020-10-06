<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/index.css">
</head>

<body>



    <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form action="./controller/main.php" method="POST">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="email" name="email" required class="form-control" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" required class="form-control" placeholder="Password">
                    </div>
                    <button name="login" type="submit" class="btn btn-black">Login</button>
                </form>
            </div>
            <div class="register-form">
                <form action="./controller/main.php" method="POST">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" required class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" required class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" required class="form-control" placeholder="Password">
                    </div>
                    <button name="register" type="submit" class="btn btn-black">Register</button>
                </form>
            </div>
        </div>
    </div>





</body>

</html>