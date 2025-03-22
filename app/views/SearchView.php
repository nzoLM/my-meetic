
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/search.css">
    <script src="script/script.js" defer></script>
    <title>Explorer</title>
</head>
<body>
    <header>
        <h1>Explorer</h1>
        <nav class="dropdown">
            <button class="dropdown-btn">Menu &#9662;</button>
            <ul class="dropdown-menu">
                <li><a href="index.php?page=profile">Profile</a></li>
                <li><a href="index.php?page=logout">Logout</a></li>
            </ul>
        </nav>
        <form id="searchUsers" action="" method="POST">
            <div class="age-container">
                <label for="age">Age</label>
                <input type="number" name="minAge" min="18" value="18">
                <input type="number" name="maxAge" min="18" value="25">
            </div>
            <div class="loisirs-container">
                <label for="loisir">Hobbies</label>
                <div id="loisir">
                    <div class="loisir">
                        <input type="checkbox" name="loisir[3]" value=3 >
                        <label for="loisir[3]">Art</label>
                    </div>
                    <div class="loisir">
                        <input type="checkbox" name="loisir[4]" value=4>
                        <label for="loisir[4]">Cinema</label>
                    </div>
                    <div class="loisir">
                        <input type="checkbox" name="loisir[1]" value=1 >
                        <label for="loisir[1]">Sport</label>
                    </div>
                    <div class="loisir">
                        <input type="checkbox" name="loisir[5]" value=5 >
                        <label for="loisir[5]">Cuisine</label>
                    </div>
                    <div class="loisir">
                        <input type="checkbox" name="loisir[2]" value=2 >
                        <label for="loisir[2]">Musique</label>
                    </div>
                </div>
            </div>
            <div class="gender-container">
                <label for="gender">Gender</label>
                <div class="gender-box">
                    <input type="checkbox" name="gender[1]" value="1">
                    <label for="gender[1]">Masculine</label>
                </div>            
                <div class="gender-box">
                    <input type="checkbox" name="gender[2]" value="2">
                    <label for="gender[2]">Feminine</label>
                </div>            
                <div class="gender-box">
                    <input type="checkbox" name="gender[3]" value="3">
                    <label for="gender[3]">Other</label>
                </div>            
            </div>
            <div class="location container">
                <label for="city">City</label>  
                <input type="search" name="city">
            </div>
            <button type="submit">Search</button>
        </form>
    </header>
    <main>
    <?php var_dump($_SESSION["userList"]) ?>
        <div class="carrousel-container">
            <div class="carrousel">
                <?php foreach($_SESSION["userList"] as $user):?>
                        <div class="card">
                            <div class="card content">
                                <div class="picture">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                                </div>
                                <div class="user">
                                    <h1><?=$user["firstname"] ?> <?=$user["lastname"] ?></h1>
                                    <h2><?=$user["age"] ?></h2>
                                </div>
                            </div>
                            
                        </div>
                    <?php endforeach;?>
            </div>
            <div class="navigation">
                <button class="nav-button" id="prev">&#10094;</button>
                <button class="nav-button" id="next">&#10095;</button>
            </div>
        </div>
    </main>
</body>
</html>