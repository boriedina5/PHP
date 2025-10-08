<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operátorok</title>
</head>
<body>
    <?php 
        //String operator
        $a = "Hello";
        $b = "World";
        $c = $a . $b; //space is need, because of syntax
        echo $c; // There won't be space beetwen the worlds
        $cWithSpace = $a . " " . $b;

        //Arithmetic operator
        echo 1 + 2;
        echo 1 * 2;
        echo 1 / 2;
        echo 1 * 2;
        echo 10 % 3;
        echo 10 ** 3; // It gives back 1000
        echo 1 + 2 * 4; //It gives back 9
        echo (1 + 2 ) * 4 ;//It gives back 12

        //Assignment operator
        $d = 2;
        $e += 4; // = $a = $a + 4

        //Comparison operator
        $f = 2;
        //$g = 4; - false
        //$g = 2; - true
        $g = "2";//true
        if($f == $g){//There's no data type checking
            echo "This statement is true";
        };


        if($f === $g){//There's data type checking
            echo "This statement is true"; //false
        };
        if($f != $g){//There's data type checking
            echo "This statement is true"; //false
        };
        if($f != $g){//There's type checking
            echo "This statement is true"; //true
        };

        //Logical operators
        $h = 3;
        $i = 6;

        if($f == $g and $h == $i){
            echo "This statement is true";
        }
        if($f == $g or $h == $i){
            echo "This statement is true";
        }

        //Incrementing/decrementing operators
        $a = 1;
        echo ++$a;
        echo --$a;

        echo $a++;
        echo $a--;
        


    ?>
</body>
</html>