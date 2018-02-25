<?php
session_start();

require 'database.php';

$email = $_POST["email"];
$password = $_POST["password"];

$statement = $pdo->prepare("SELECT * FROM artists WHERE email = :email");
$statement->execute(array(
  ":email" => $email
));
$fetched_user = $statement->fetch(PDO::FETCH_ASSOC);


if(password_verify($password, $fetched_user["password"])){
  $_SESSION["user"] = $fetched_user;
  $_SESSION["loggedIn"] = true;


  header("Location: ../index.php");

} else {

  header("Location: ../login_form.php?wrong_password=true");
  
}