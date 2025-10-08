<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Built-In superglobal variables in PHP</title>
</head>
<body>
<!--Superglobal variable: it can be accessed anywhere inside our code-->
    <?php 
    
    echo $_SERVER["DOCUMENT_ROOT"];//give us information about the root path of this paticular website here | echo is nessesary to access it inside the browser --> It will display the location of this root folder in a browser
    echo "<br>";//linebreak, because echo will display the text in the same line
    echo $_SERVER["PHP_SELF"]; //-->It will display the location of this file in a browser
    echo $_SERVER["SERVER_NAME"]; //-->It will display the server name in a browser, which is localhost
    echo $_SERVER["REQUEST_METHOD"]; //-->It will display the how this page was accessed --> GET/POST/...
    
    
    /*
    //Ez mi ez?
    echo $_GET["name"];//access the name data? and display on the website
    //POST methid won't be visible on your website
    echo $_REQUEST["name"];//this method is goint to be looking for GET, POST and Cookies when looking for a data inside this website here
    
 
    $_FILES["name"]; //this will get data about a file and uploaded to your server
    $_COOKIE["name"]; // gab information about cookies on the website
    $_SESSION["name"]; //Browser's hidden storage
    $_ENV[""] // Access inside our PHP code, very sensitive data, user work with it, but don't access it
    */
    ?>

</body>
</html>