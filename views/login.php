<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="bg-login">
        <form class="form-login" method="POST" autocomplete="off">
            <h3 style="text-align: center; letter-spacing: 4px;">LOGIN</h3>
            <input type="text" class="input-login" name="username" placeholder="Username">
            <input type="password" class="input-login" name="password" placeholder="Password">
            <input type="submit" class="btn-login" value="Login">
        </form>
        <?php 
            if(isset($error)) {
                echo "<p style='margin-top: 10px; text-align: center; color: red;'>$error</p>";
            }
        ?>
    </div>
</body>
</html>