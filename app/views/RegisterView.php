<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="script/script.js" defer></script>
    <title>Sign in</title>
</head>
<body>
    <div class="main">
        <h1 class="title">Sign in</h1>
        <div class="sign-in">
            <form action="index.php?page=register" method="POST">
                <?php if(isset($_GET["minor"]) && $_GET["minor"] ==="true"):?>
                    <h3 class="minor-title">You can't yet register because of your age</h3>
                    <?php endif;?>
                <div class="input-container">
                    <input type="text" name="firstname" placeholder="Firstname" >
                    <input type="text" name="lastname" placeholder="Lastname" >
                    <input type="date" name="birthdate">
                    <input type="tel" name="phone" placeholder="Phone number" pattern="+33[0-9]{1}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}">
                    <input type="text" name="city" placeholder="City">
                    <input type="text" name="country" placeholder="Country">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                </div>
                
                <button type="submit">Sign in</button>
            </form>
            
            <a href="index.php?page=login" class="login">Already member ?<br>Log in here.</a>
        </div>
    </div>
</body>
</html>
