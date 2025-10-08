<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feladatok</title>
</head>
<body>
<!--1. feladat-->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = htmlspecialchars($_POST["number"]);

    echo "<p>A megadott szám: $number</p>";

    if ($number % 3 === 0) {
        echo "<p>Osztható 3-mal.</p>";
    }
    if ($number % 4 === 0) {
        echo "<p>Osztható 4-gyel.</p>";
    }
    if ($number % 9 === 0) {
        echo "<p>Osztható 9-cel.</p>";
    }
    if ($number % 3 !== 0 && $number % 4 !== 0 && $number % 9 !== 0) {
        echo "<p>Nem osztható sem 3-mal, sem 4-gyel, sem 9-cel.</p>";
    }
}
?>

<form method="post"> 
    <label>Adj meg egy számot: 
        <input type="number" name="number">
    </label>
    <button type="submit">Ellenőrzés</button>
</form>

<!--2. feladat - Ai adott ki megoldást, de nem teljesen értem-->
<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $temp = htmlspecialchars($_POST["temperature"]);
    $convert = htmlspecialchars($_POST["convert"]);
    $result;
    if ($convert === "CtoF") {
        $result = "$temp °C = " . ($temp * 9/5 + 32) . " °F";
        echo $result;
    } elseif ($convert === "FtoC") {
        $result = "$temp °F = " . (($temp - 32) * 5/9) . " °C";
        echo $result;
    }
}
?>

<form method="post">
    <label>Hőmérséklet:
        <input type="number" name="temperature" >
    </label>
    <br>
    <label>
        <input type="radio" name="convert" value="CtoF" > Celsius → Fahrenheit
    </label>
    <br>
    <label>
        <input type="radio" name="convert" value="FtoC"> Fahrenheit → Celsius
    </label>
    <br><br>
    <button type="submit">Átváltás</button>
</form>



</body>
</html>

