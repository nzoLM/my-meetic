<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/profile.css">
    <script src="./script/script.js" defer></script>
    <title>Profile</title>
</head>
<body>
    <header>
        <div class="profile-header">
            <h2><?php if(isset($_SESSION["user"]["firstname"])) echo $_SESSION["user"]["firstname"]?> <?php if(isset($_SESSION["user"]["lastname"])) echo $_SESSION["user"]["lastname"]?></h2>
            
        </div>
        <nav class="dropdown">
            <button class="dropdown-btn">Menu &#9662;</button>
            <ul class="dropdown-menu">
                <li><a href="index.php?page=explorer">Explorer</a></li>
                <li><a href="index.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        
        <section class="profile-content">
            <h2 class="section-h2"></h2>
            <form action="index.php?page=profile" method="post"> 
                <div class="gender-container">
                    <h2>Gender</h2>
                    
                    <select name="gender" id="gender">
                        <option value="">Select a gender</option>
                        <option value="1" <?php if(isset($_SESSION["gender"]["gender"]) && $_SESSION["gender"]["gender"] === "1") echo "selected"?>>Masculine</option>
                        <option value="2" <?php if(isset($_SESSION["gender"]["gender"]) && $_SESSION["gender"]["gender"] === "2") echo "selected"?>>Feminine</option>
                        <option value="3" <?php if(isset($_SESSION["gender"]["gender"]) && $_SESSION["gender"]["gender"] === "3") echo "selected"?>>Other</option>
                    </select>
                </div>
                <div class="description-container">
                    <h2>Description</h2>
                    <textarea cols="100" rows="10" name="description" placeholder="Describe your profile..." id="description"><?php if(isset($_SESSION["description"]["description"])) echo $_SESSION["description"]["description"]?></textarea>
                    
                </div>
                <div>
                    <h2>Hobbies</h2>
                    <h4>(Maximum of 5 hobbies)</h4>
                    <div id="loisir">
                        <input type="checkbox" name="loisir[3]" value=3 <?php if(isset($_SESSION["Art"]) && $_SESSION["Art"]["active"] === 1) echo "checked" ?> >Art</input>
                        <input type="checkbox" name="loisir[4]" value=4 <?php if(isset($_SESSION["Cinema"]) && $_SESSION["Cinema"]["active"] === 1) echo "checked" ?>>Cinema</input>
                        <input type="checkbox" name="loisir[1]" value=1 <?php if(isset($_SESSION["Sport"]) && $_SESSION["Sport"]["active"] === 1) echo "checked" ?>>Sport</input>
                        <input type="checkbox" name="loisir[5]" value=5 <?php if(isset($_SESSION["Cuisine"]) && $_SESSION["Cuisine"]["active"] === 1) echo "checked" ?>>Cuisine</input>
                        <input type="checkbox" name="loisir[2]" value=2 <?php if(isset($_SESSION["Musique"]) && $_SESSION["Musique"]["active"] === 1) echo "checked" ?>>Musique</input>
                    </div>
                </div>
                <input type="submit" value="Confirm">
            </form>
        </section>
        <section class="profile-informations">
            <h2>Email</h2>
            <form method="POST" class="email-change">
                <input type="email" name="email" placeholder="Current email">
                <input type="email" name="newemail" placeholder="New email">
                <input type="submit" value="Confirm">
            </form>
            <h2>Password</h2>
            <form method="POST" class="password-change">
                <input required type="password" name="password" placeholder="Current password">
                <input required type="password" name="newpassword" placeholder="New password">
                <input type="submit" value="Confirm">
            </form>
            <form method="POST">
                <input type="hidden" name="delete" value="0">
                <input type="submit" value="Supprimer le compte">
            </form>
        </section>
    </main>
</body>
</html>