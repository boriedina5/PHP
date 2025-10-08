<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions And Control Structure</title>
</head>
<body>
    <?php 
        $bool = true;
        $a = 1;
        $b = 4;
        if ($a < $b){
            "First condition is true";
        }

        switch ($a) {
          case 1:  
            echo "The first case is correct";
            break;
         //case 2:.....
            default:
            echo "None of the conditions were true";
        }
    ?>
</body>
</html>