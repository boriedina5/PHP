<?php 
//Is the request coming from the right place?----------------------------------------------------------------------------
//Cross-Site Reference Token (CSRF) kellene
    //- Website  generates a token  -> server check and identify with this token
        //- if we send the datas, we send this token aswell
    

//Did the user press the button?-------------------------------------------------------------------------------------------------------------------

//REQUEST datas request(lekérése)
var_dump($_GET);//var_dump is a DEBUG fuction, which shows the variable's value. 


//Extracting Values(érték kinyerése) - Associative array request($_GEt $POST)

$name = $_GET["name"];
$description = $_GET["description"];
$genre; // we don't give value, because we have to check
$price = $_GET["price"];

    //if you allow the empty value, but you want to handle if somebody sent something
    if(empty($_GET["genre"])){
        $genre = "No genre";
    }
    else{
        $genre = $_GET["genre"];
    }
    
    //If you don't allow the "empty data" and you force the user to fill it out
        //The "name" variable is empty in a request, or it isn't existing (isset)
    if (empty($_GET["name"]) || isset($_GET["name"]) == false) {
        //You send back the user to the form.
        header("Location:../index.php?status=NoName");
        exit();
        //die() - exit the script, more radical
        //exit() - exit the script
    }
    else
    {
        $name = $_GET["name"];
    }

    if (empty($_GET["description"]) || !isset($_GET["description"]))
    {
        header("Location:../index.php?status=NoDescription");
        exit();
    }
    else
    {
        $description = $_GET["description"];
    }

    if (empty($_GET["genre"]) || !isset($_GET["genre"]))
    {
        header("Location:../index.php?status=NoGenre");
        exit();
    }
    else
    {
        $genre = $_GET["genre"];
    }

    if (empty($_GET["price"]) || !isset($_GET["price"]))
    {
        header("Location:../index.php?status=NoPrice");
        exit();
    }
    else
    {
        $price = $_GET["price"];
    }

    // actual price > 20$ too expensive, 0 < actual price < 10 too cheap
    if($price > 20){
        echo"It is too expensive";
        $price_result = "It is too expensive";
    }
    elseif($price < 10){
       echo"It is too cheap";
        $price_result = "It is too cheap";
    }
    elseif($price > 10 && $price < 20){
        echo "It is optimal";
        $price_result = "It is optimal";
    }
    //header("Location:../index.php?result=".$price_result);


//Output
echo $name;
echo "<br>";
echo $description;
echo "<br>";
echo $genre;
echo "<br>";
echo $price;
echo "<br>";

?>