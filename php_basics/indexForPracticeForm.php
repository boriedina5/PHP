<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cv</title>
</head>
<body>
    <main>
        <form action = "TheBasicsOfPHPFormHandlingTutorial.php" method="post"><!-- in docu.: The Basics of PHP Form Handling -->
            <label for ="firstname">Firstname?</label>
            <input id = "firstname" type= text name ="fistname" placeholder = "Firstname...">

            <label for ="lasttname">Lastname?</label>
            <input id = "lastname" type= text name ="lastname" placeholder = "Lastname...">

            <label for ="favouritepet">Favourite Pet?</label>
            <select id = "favouritepet" name= "favouritepet">
                <option value = "none">None</option>
                <option value = "dog">Dog</option>
                <option value = "cat">Cat</option>
                <option value = "bird">Bird</option>
            </select>

            <button type="submit">Sumbmit</button>

        </form>
    </main>
</body>
</html>