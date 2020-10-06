<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

    <form action="../controller/main.php" method="POST">
        <fieldset>
            <legend>Register</legend>
            <input type="text" placeholder="first name" name="fname" required><br><br>
            <input type="text" placeholder="last name" name="lname" required><br><br>
            <input type="email" placeholder="email" name="email" required><br><br>
            <input type="password" placeholder="password" name="pass" required><br><br>
            <button name="register" type="submit">Register</button>
        </fieldset>
    </form>
        
</body>
</html>