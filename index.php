<?php session_start(); ?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">

    <title>ADB</title>
</head>

<body>
    
<?php
    if(!(isset($_SESSION["user"]))){
?>

    <div class="left_field">
      Register:
        <form action="partials/register.php" method="POST">
            <div class="form-group">
              <label for="artistname"> Artistname </label>
              <input id="artistname" type="text" name="artistname" class="form-control">
            </div>
            
            <div class="form-group">
              <label for="email"> Email </label>
              <input id="email" type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label for="password"> Password </label>
              <input id="password" type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
              <input type="submit" value="Registrera dig" class="btn button-green">
            </div>
      </form>
    </div>
    
    <div class="right_field">
    
       <?php
            require 'login_form.php';
        ?>

    </div>
<?php
    }


    if(isset($_SESSION["user"])){
        require 'profile.php';
    }
    
?>






</body>
</html>