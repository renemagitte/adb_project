<?php
    require 'database.php';

/* Email statement */
$checkEmail = $_POST["email"];

$emailStatement = $pdo->prepare("SELECT email FROM artists WHERE email = :email");
$emailStatement->bindParam(':email', $checkEmail);
$emailStatement->execute();

/* Email doublet check */
if(($emailStatement->rowCount() > 0) && (!empty($_POST["email"]))){
    header("Location: ../register_form.php?email_already_taken=true");
    
//IF THE USERNAME AND EMAIL IS NOT BEING USED AND ALL THE FIELDS ARE FILLED IN CORRECTLY THE DATABASE WILL BE UPDATED WITH THE USER INFORMATION.     
}elseif((!empty($_POST["artistname"])) && (!empty($_POST["password"])) && (!empty($_POST["email"]))){
    
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $artistname = $_POST["artistname"];
    $email = $_POST["email"];

    $statement = $pdo->prepare("
      INSERT INTO artists (artistname, password, email)
      VALUES (:artistname, :password, :email)
      ");

    $statement->execute(array(
      ":artistname" => $artistname,
      ":password" => $password,
      ":email" => $email
    ));

    header("Location: ../index.php?register_success=Grattis! Du är nu registrerad och kan logga in:");
    
}else{
        //header("Location: ../register_form.php?registration_error=true");

}
