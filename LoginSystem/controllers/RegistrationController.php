<?php /*
session_start(); 
//Extracting Values (easier way)
$username;
$password;
$password_confirm;
$email;

if(isset($_POST['submit'])){//A gomb benne van-e a POST metódusú form kérésben, ha nincs, akkor nem lett megnyomva
    echo "A kérés tartalma: </br>";
    var_dump($_POST);//Post is a global variable, which contains Request (which sent by a POST method)

    $error = array(); //We collect the errors here
    if(empty($_POST["f_username"])//if anything is empty we put in the errors array (19-22)
       || empty($_POST["f_password"])
       || empty($_POST["f_password_confirm"])
       || empty($_POST["f_email"])
    ){
        $error['f_username'] = 'empty';
        $error['f_password'] = 'empty';
        $error['f_password_confirm'] = 'empty';
        $error['f_email'] = 'empty';
        echo "<strong>Error tömb tartalma</strong></br>";
        var_dump($error);
    }else{
        //Extracting Values (easier way)
        $username = $_POST["f_username"]; 
        $username = $_POST["f_password"]; 
        $username = $_POST["f_password_confirm"]; 
        $username = $_POST["f_email"]; 
    }  
}
else{
    exit('Valami gond van a form-ot elküldő gombbal');
}


session_start();
//1. lépés ERROR KEZELÉS
if (isset($_POST['submit'])) { //A gomb benne van-e a POST metódusú form kérésben, ha nincs, akkor nem lett megnyomva
    echo "A kérés tartalma:<br>";
    var_dump($_POST); //$_POST az egy Globális Változó, ami a POST metódussal elküldött kéréseket tartalmazza

    $username;
    $password;
    $password_confirm;
    $email;

    $error = array(); //Ide gyűjtöm az errorokat.
    //Method 1 (csak a userre, ha az f_username üres akkor errorba szólok, hanem akkor változóba) (Specifikusan meg tudod mondani melyik üres)
    /*empty($_POST['f_username']) ? $error['f_username'] = 'empty' : $username = $_POST['f_username'];
    empty($_POST['f_password']) ? $error['f_password'] = 'empty' : $username = $_POST['f_password'];
    empty($_POST['f_password_confirm']) ? $error['f_password_confirm'] = 'empty' : $username = $_POST['f_password_confirm'];
    empty($_POST['f_email']) ? $error['f_email'] = 'empty' : $username = $_POST['f_email'];
    //Method 2 (Ha bármelyik input mező üresen jön vissza, akkor szólunk hogy van üres mező) (Általánosságban meg tudod mondani, hogy van üres mező)
    if (
        empty($_POST['f_username']) ||
        empty($_POST['f_password']) ||
        empty($_POST['f_password_confirm']) ||
        empty($_POST['f_email'])
    ) {
        $error['emptyFields'] = true;
        //Method 2 vége
    } else {
        //Változók átvétele egyszerűsítés végett
        $username = $_POST["f_username"];
        $password = $_POST["f_password"];
        $password_confirm = $_POST["f_password_confirm"];
        $email = $_POST["f_email"];
    }
    //2. lépés EGYEZNEK-E A JELSZAVAK + JELSZÓ VALIDÁCIÓ
    if ($password !== $password_confirm) { {
            $error["password"] = "notTheSame";
        }
        //TODO: jelszó validáció

        //3. lépés email validáció
        if (filter_var($email, FILTER_VALIDATE_EMAIL == false)) { //basic validation (Is the field contains anything@anything )
            $error["email"] = "Wrong format";
        }
        //4. lépés - ha nincs error, akkor regisztrálok
        if(count($error) > 0) {//ha van error, akkor megállítom a kódot és szólok a felhasználónak
            $_SESSION["error"] = $error; //ha a script error tömbjét belerakom egy errors nevű SESSIONben futó változóba
            header("Location:../views/f.register.php?status-badnews");
            die("User has some errors, redirect and make him/her/they solve it");
            
        }
    }
    else {
        die("Valami gond van a form-ot elküldő gombbal.");
    }
}*/




session_start();

if (isset($_POST['submit'])) { //A gomb benne van-e a POST metódusú form kérésben, ha nincs, akkor nem lett megnyomva
    echo "A kérés tartalma:<br>";
    var_dump($_POST); //$_POST az egy Globális Változó, ami a POST metódussal elküldött kéréseket tartalmazza

    $username;
    $password;
    $password_confirm;
    $email;

    /* ELSŐ LÉPÉS : ERROR KEZELÉS - KI VAN-E TÖLTVE MINDEN */

    $error = array(); //Ide gyűjtöm az errorokat.
    //Method 1 (csak a userre, ha az f_username üres akkor errorba szólok, hanem akkor változóba) (Specifikusan meg tudod mondani melyik üres)
    /* empty($_POST['f_username']) ? $error['f_username'] = 'empty' : $username = $_POST['f_username'];
    empty($_POST['f_password']) ? $error['f_password'] = 'empty' : $username = $_POST['f_password'];
    empty($_POST['f_password_confirm']) ? $error['f_password_confirm'] = 'empty' : $username = $_POST['f_password_confirm'];
    empty($_POST['f_email']) ? $error['f_email'] = 'empty' : $username = $_POST['f_email']; */

    //Method 2 (Ha bármelyik input mező üresen jön vissza, akkor szólunk hogy van üres mező) (Általánosságban meg tudod mondani, hogy van üres mező)
    if (
        empty($_POST['f_username']) ||
        empty($_POST['f_password']) ||
        empty($_POST['f_password_confirm']) ||
        empty($_POST['f_email'])
    ) {
        $error['emptyFields'] = true;
        //Method 2 vége
    } else {
        //Változók átvétele egyszerűsítés végett, ha a method 2-t választod, akkor itt a változókat át kell adni.
        //Regisztráció - adatbázis
        require "../database/connection.php";//Lényegében bemásolok mindent a fájlból mindent ide
        $username = mysqli_real_escape_string($con, $_POST["f_username"] );
        $password = mysqli_real_escape_string($con, $_POST["f_password"] );
        $password_confirm = mysqli_real_escape_string($con, $_POST["f_password_confirm"] );
        $email = mysqli_real_escape_string($con, $_POST["f_email"] );
        
        /*$password = $_POST["f_password"];
        $f_password_confirm = $_POST["f_password_confirm"];
        $email = $_POST["f_email"];*/
    }

    /* MÁSODIK LÉPÉS - EGYEZNEK-E A JELSZAVAK, és JELSZÓ VALIDÁCIÓ*/

    if ($password !== $f_password_confirm) {
        $error["password"] = "notTheSame";
    }

    /* TODO: Jelszóvalidáció és jelszó hash */
    if (strlen($password) < 8) {
        $error["password_1"] = "short"; // Minimum 8 characters
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $error["password_2"] = "noCapital"; // At least one uppercase letter 
    }
    if (!preg_match('/[a-z]/', $password)) {
        $error["password_3"] = "noLower";// At least one lowercase letter
    }
    if (!preg_match('/\d/', $password)) {
        $error["password_4"] = "noNumber"; // At least one number
    }
    if (!preg_match('/[!?%&@#]/', $password)) {
        $error["password_5"] = "noSpecial"; // At least one special character
    }
    //Password hash
    $password_hash = password_hash($password, PASSWORD_DEFAULT);    //titkosítás mi szintünk md5

    /* HARMADIK LÉPÉS - E-MAIL validáció */
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $error["email"] = "WrongFormat";
    }

    /* NEGYEDIK LÉPÉS - HA nincs error, akkor regisztrálok */
    if (count($error) > 0) {
        $_SESSION["errors"] = $error; //A php script error tömbjét belerakom egy errors nevű SESSIONBEN futó változóba.
        header("Location:../views/f_register.php?status=badnews");
        die("User has some errors, redirect and make him//her/they/whatever solve it.");
    }
    
   

    //Mysql basics
    $query = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('{$username}', '{$password_hash}', '{$email}')"; //berakja az adatbázisba //hash-elt jelszót kell feltölteni
    echo $query;
    mysqli_query($con, $query);//első paramétert megkeresi a másodikat lefutatja

    //egyből bejelentkezik
    //TÖMBNEVE[kulcsneve] = "tömben a kulcs értéke"
    $_SESSION['user'] = $username; //ez utal arra, hogy az alapból létező sessionbe elmentem. Super globalok mindig jelen vannak, de üresek. ezek tömbök get, post, session
    header("Location:../index.php?status=registeredAndLoggedIn");

} 
else {
    die("Valami gond van a form-ot elküldő gombbal.");
}








