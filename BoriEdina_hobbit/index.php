<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The Hobbit Journey Planner</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('https://wallpapercave.com/wp/wp14124768.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Georgia', serif;
      color: #2c1d0e;
    }

    .container {
      background-color: rgba(255, 248, 220, 0.95);
      max-width: 500px;
      margin: 5% auto;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    h1 {
      text-align: center;
      font-family: 'Georgia', serif;
      font-size: 28px;
      margin-bottom: 20px;
      color: #4b3b2a;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    select {
      width: 95%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #8b7e74;
      border-radius: 8px;
      font-size: 16px;
      background-color: #fdf6e3;
      color: #3e2f21;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin-top: 25px;
      background-color: #6b8e23;
      color: #fff;
      font-size: 18px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #556b2f;
    }

    .footer {
      text-align: center;
      margin-top: 40px;
      color: #f5f0e1;
      font-size: 14px;
    }

    button {
        width: 100%;
      padding: 12px;
      margin-top: 25px;
      background-color: #6b8e23;
      color: #fff;
      font-size: 18px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
              background-color: #556b2f;
    }
  </style>
</head>
<body>
  <div class="container">
    
    <h1 class="h1">Hobbit Journey Planner</h1>
    <form action="controllers/hobbitDatas.php" method="POST">
      <label for="hobbit_name">Your Hobbit Name:</label>
      <input type="text" name="hobbit_name" id="hobbit_name" />
      <label for="hobbit_where">Where to go:</label>
      <input type="text" name="hobbit_where" id="hobbit_where" />
      <label for="hobbit_far">How far it is:</label>
      <input type="number" name="hobbit_far" id="hobbit_far" />
      <label for="hobbit_rations">Rations:</label>
      <input type="number" name="hobbit_rations" id="hobbit_rations" />
      <label for="hobbit_speed">Speed (miles/day):</label>
      <input type="number" name="hobbit_speed" id="hobbit_speed" step="0.1" />
      <button class="button" type="submit" id="submit">Begin Adventure</button>
    </form>
    <?php 
      echo $_SESSION["name"]." ".$_SESSION["where"]."-ba/be indul, ami Zsáklaktól körülberül ".$_SESSION["far"]." mérföld távolságra van. ".$_SESSION["name"]." ".$_SESSION["speed"]." mph sebességgel halad. ".$_SESSION["rations"]." adag élelmet visz magával. Körülberül ".$_SESSION["time"]." óra alatt ér le ".$_SESSION["where"]."-ba/be. Mivel 4 óránként megáll enni, ezért ".$_SESSION["food"]." adag élelemre lenne szüksége ahhoz, hogy ne legyen éhes, mire megérkezik (bár egy hobbit mindig éhes). Így az élelem nem elég az útra";
      
    ?>
  </div>

  <div class="footer">
    &copy; 2025 The Shire Travel Co. | Safe travels, little adventurer!
  </div>
</body>
</html>
