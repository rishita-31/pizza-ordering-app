<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .top a:hover{
            color: yellow;
        }
    </style>
</head>
    <body>
    <div class="top" style="color: #fff; padding:10px 30px;"><a href="index.html">Home</a></div>
    <div class="loginbox" style="background-color: #b30000;">
    <img src="pic20.webp" alt="login" class="avatar">
    <h1>Login Here</h1>
    <form action="login_process.php" method="POST">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username" required>
        <p>Password</p>
        <input type="password" name="pass" placeholder="Enter Password"required>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>