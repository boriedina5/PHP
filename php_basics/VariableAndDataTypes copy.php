<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable and data types</title>
</head>
<body>
    

    <!--PARAGRAPH-->
    <p>This is a(n) <?php echo "awesome" ?> paragrahp</p><!--You can insert in a php code -->
    <?php echo "This is ALSO a paragraph"; ?> 
    

    <!--VARIABLES; Scalar types(data type that holds a single, indivisible value (not a collection))-->
    <?php
    $stringName = "Bori Edina"; //When we give a variable names and it's 1 one more words, we use this format
    echo $stringName; //Displays the variable's vaule --> Bori Edina

    $stringNumber = "123";//this is a string too
   
    $int = 123; 
    $float = 2.56; 

    $bool = false; // or true, with numbers 1 mean true and 0 means false

    $date = "2025-09-17";
    $otherDate = date(format: "yyyy-mm-dd"); //we set the format

    //This variabl types defaults
    $stringD = "";
    $intD = 0;
    $floatD = 0;
    $boolD = false; 
    ?>


    <!--VARIABLES; Non-scalar types(compound/complex types like arrays, objects, resources-->
    <?php
    $arrayNames = array("Edina", "Bella", "Frida");
    $arrayNames2 = ["Edina", "Bella", "Frida"]; // in 5.4 or lower php it doesn't work
    $arrayDefault = [];

    $object = new Car();
    $objectDefault = null;

    $dictionary = array("Harry" => "Potter", "Hermione" => "Granger"); //it called: associative array
    $dictionary["Harry"]; //It gives back: Potter
    ?>
    
    <!--EXAMPLE--> 
    <p>Hi! My name is <?php echo $stringName ?> </p>



    
</body>
</html>