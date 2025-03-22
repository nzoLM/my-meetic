<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="script/script.js" defer></script>
    <title>Log in</title>
</head>
<body>
    <div class="main">
        <h1 class="title">Log in</h1>
        <div class="login">
            <form method="POST" action="index.php?page=profile">
                <input type="email" name="email" id="" placeholder="Email">
                <input type="password" name="password" placeholder="Password" id="">
                <button type="submit">Log in</button>
            </form>
            <a href="index.php?page=register" class="sign-in">New account ?<br>Sign in here.</a>
        </div>
    </div>
</body>
</html>