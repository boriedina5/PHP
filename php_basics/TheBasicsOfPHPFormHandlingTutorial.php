<?php 
//var_dump($_SERVER["REQUEST_METHOD"]);//var_dump is method, built-in fuctin; show the variable's type and value 
if ($_SERVER("REQUEST_METHOD" == "POST")){
    $firstname = htmlspecialchars($_POST["firstname"]); 
    //$_POST["firstname"] - from form's firstname inpute field's name
    //htmlspecialchars() - we don't trust in the users, help to precede from any malicious purpose
    //htmlentities() - Similar to htmlspecialchars(), but taking characters and converting into a HTML entity
    $lastname = htmlspecialchars($_POST["lastname"]); 
    $favouritepet = htmlspecialchars($_POST["favouritepet"]); 
    
    if(empty($firstname)){ //it's a fuction; if it's returns true it means there is no data inside the variable, so the user didn't sumbit a first name
        exit();//it's a fuction; exit the script, because I don't want the rest of the script to run -> STOP EVERYTHING    --> else branch will be run
    }
    echo "These are the data, that the usser submitted";
    echo "</br>";
    echo $firstname;
    echo "</br>";
    echo $lastname;
    echo "</br>";
    echo $favouritepet;
    echo "</br>";

    header("Location: ../video_6_Index.php"); //after we sent back the data to the front page and jump back?
}
else{
    header("Location: ../video_6_Index.php"); //after we sent back the data to the front page and send back the user to the front page?
}
