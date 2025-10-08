<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method= "get">
        <input type = "number" name="num01" placeholder = "Number one">
        <select name="operator">
            <options value = "add">+</option>
            <options value = "subtract">-</option>
            <options value = "multiply">*</option>
            <options value = "divide">/</option>
        </select>
        <input type = "number" name="num02" placeholder = "Number two">
        <button>Calculate</button>
        
        <?php 
            if($_SERVER(["REQUEST_METHOD"] == "POST")){
                //Grab data from inputs
                $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);//?
                $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
                $operator = htmlspecialchars($POST["operator"]);

                //Error handlers
                $errors = false;
                if (empty($numb01) || empty($numb02) || empty($operator)){
                    echo "<p class='calc-error'>Fill in all fields!</p>";
                    $errors = true;
                }

                if(!is_numeric($num01) || !is_numeric($num02)){//is_numeric is an built-in fuction
                    echo "<p class='calc-error'>Only write numbers!</p>";
                    $errors = true;
                }
                
                //Calculate a number if no errors
                if(!$errors){
                    $value = 0;
                    switch($operator){
                       case "add":
                        $value = $num01 + $num02;
                        break;
                       case "subtract":
                        $value = $num01 - $num02;
                        break; 
                       case "multiply":
                        $value = $num01 * $num02;
                        break;
                       case "divide":
                        $value = $num01 / $num02;
                        break;
                       default:
                        echo "<p class='calc-error'>Something went HORRIBLY wrong!</p>";
                    }
                    echo "<p class='calc-results'>Results = " . $value . "</p>";
                }
            }
        ?>

    </form>
</body>
</html>