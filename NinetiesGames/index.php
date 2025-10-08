<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Nineties Games</title>
</head>

<body>
    <div class="navbar"><!--Shortcut: .element -> with class and tags will appear -->
        <h1>Videogame Registration Platform</h1>
    </div>
    <div class="container">
        <div class="registrationForm">
            <h4>Add new game to the database</h4>
            <form action="controllers/addGame.php" method="POST">
                <!--action - where we send the data
                GET - if we don't work with sensitive data, datas will appears in the URL
                POST it is safer because it sends the data on the server-->
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="Metal Gear Solid"> <!--You have to give a name to send the datas-->
                <label for="description">Description</label>
                <textarea name="description" id="description" row="4" col="50">First 3D stealth espionage action game for the Playstation one.</textarea>
                <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                    <option disabled selected value="">Please choose one...</option>
                    <option value="action">Action</option>
                    <option value="rpg">Role-Playing Game</option>
                    <option value="platformer">Platformer</option>
                </select>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" step=".01" value="19.89"> <!--step = "" because of the decimal format, if it isn't there we can't enter decimal number-->

                <button type="submit" name="button" id="button">Add game</button>
            </form>
            <div class="resultsContainer">
                <h5>
                    <?php 
                    echo isset($_GET["result"]) ? $_GET["result"] : "";
                    ?>
                </h5>
                <p>
                    <?php 
                    if(empty($_SESSION["AddedGameData"]) == false){
                        echo $_SESSION["AddedGameData"]["name"]. "was added successfully to the database";

                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>