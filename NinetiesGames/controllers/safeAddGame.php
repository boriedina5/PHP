<?php //if you use only php you don't have to use the end of the tag
session_start();//It is have to run every subpage

echo "Datas that in POST request";
var_dump($_POST);//global constant variable

//collect errors
$errors = array();

//Did the user press the button?------------------------------------------------------------------------------------------------------------
if(isset($_POST["submit"])){
    echo"The submit button was pressed";
    //verification of data existence
    if(isset($_POST["name"])  == false){
        array_push($errors, "NoName");
    }
     if(isset($_POST["description"]) == false){
        array_push($errors, "NoDescription");
    }
     if(isset($_POST["genre"]) == false){
        array_push($errors, "NoGenre");
    }
     if(isset($_POST["price"]) == false){
        array_push($errors, "NoPrice");
    }

    //verification existing data isn't empty
    if(empty($_POST["name"])){
        array_push($errors, "NoName");
    }
     if(empty($_POST["description"])){
        array_push($errors, "NoDescription");
    }
     if(empty($_POST["genre"])){
        array_push($errors, "NoGenre");
    }
     if(empty($_POST["price"])){
        array_push($errors, "NoPrice");
    }

    //If it is something wrong, I send back the datas to the user
    if(count($errors) != 0){
        //I send back the user to the form with an error msg.
        echo "</br>";
        var_dump($errors);
        die("Something is missing");
        //header("Location:../index.php?status=error");
    }

    // Saving datas, because it is easier to use by the server 
    // Server-created variable = user-created variable
    $name = $_POST["name"];
    $description = $_POST["description"];
    $genre = $_POST["genre"];
    $price = $_POST["price"];
    //Developer help - output the datas
    echo "</br>{$name}</br>";
    echo "</br>{$description}</br>";
    echo "</br>{$genre}</br>";
    echo "</br>{$price}</br>";

    //TODO: Upload to the database
    echo "The datas upload to database was successful, redirect the view back to the user";
    //Save datas to a SESSION variable
        // - When the page opens, we can launch the browser and until I close the browser, until then, the browser stores all data
    
    $_SESSION["AddedGameData"] = $_POST;
    //Go back where I came
    header("Location:../index.php?status=success");
}
else{
    die("Please press the button");
}