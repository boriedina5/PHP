<?php
session_start();
echo "A login form kérésének adatai</br>";
var_dump($_POST);

if (isset($_POST["submit"])) {
    require_once "..database/connection.php";

    $username;
    $password;

    $errors = array();

    empty($_POST[""]) ? $errors["f_username"] = "Username mistake" : $username;
    mysqli_real_escape_string($con, $_POST["f_username"]);
    //Ha au ÜRES? vizsgálat igazat ad vissza a POST metódussal küldött username inputra 
    //akkor az error tömbe visszaadom hogy a username kulcsot értéke (ha nincs létrehozva)
    //mistake legyen, ha hamisat ad vissza (tehát nem üres az érték, akkor saját változóm felveszi az értéket, szöketetve minden karaktert, h
    //hogy lehessen injektálni)

    empty($_POST[""]) ? $errors["f_password"] = "Password mistake" : $password;
    mysqli_real_escape_string($con, $_POST["f_password"]);

    //Lépések a Loginhoz
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    echo "</br>" . $query;
    $result = mysqli_query($con, $query);
    //Lefuttatom a conn változóban definiált (másik fájl) adatbázisban a query-met és a visszakapott eredmény elmentem
    echo "</br>";
    var_dump($result);
    if (mysqli_num_rows($result) == 0) {
        echo "Nincs ilyen felhasználó";
        $errors["user"] = "No user";
        //header(..index..)
        die();
    } else if (mysqli_num_rows($result) != 1) { //nem nulla, de nem is egy gáz van
        echo "valami gáz van";
        die();
    }
    //Ha egyik se akkor pontosan egy van
    //Ha pontosan egy az eremény egyezik-e a beírt jelszó a hashelt jelszóval
    //1. Lekérem a user adatait
    //user adatai egy asszociativ tömbe kerülnek bele (result változó lekérése)
    $user = mysqli_fetch_assoc($result);
    //2. lépés
    //jelszó validáció
    $password_match = password_verify($password, $user["password"]);
    //megnézi, hogy a felhasználó által beírt jelszó [password] egyezik-e az adatbázisból lekért
    //és megtalált felhasználó hash-elt jelszavával user["password"]
    if($password_match == true){
        $_SESSION["user"] = $user["username"];
        //SESSION user változóba berakom az adatbázisból a tömbe mentett és megtalált user oszlopának adatit
        echo "</br>User bejelentkeztetve";
        header("Location:../index.php?status=loggedIN");
    }
    else{
        die("Nem jó valami");
    }
    
   


} else {
    die("Valami nem oké a gomboddal");
}
