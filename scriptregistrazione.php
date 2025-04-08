<?php
  session_start();
  include("connessione.php");
  $nome = $_POST["nome"];
  $cognome = $_POST["cognome"];
  $email1 = $_POST["email1"];
  $email2 = $_POST["email2"];
  $username = $_POST["username"];
  $password = hash("sha256", $_POST["password"]);
  if ($email1 == $email2){
    if($conn->query("SELECT username FROM UTENTE where username = '$username'")->num_rows == 0){
      if($conn->query("SELECT email FROM UTENTE where email = '$email1'")->num_rows == 0){
        if ($conn->query("INSERT INTO UTENTE (username, passwd, nome, cognome, email) VALUES ('$username', '$password', '$nome', '$cognome', '$email1')")) {
          $_SESSION["erroreRegistrazione"] = 0;
          header("Location: index.php");
        }
      }else{
        $_SESSION["erroreRegistrazione"] = 1;
        header("Location: registrazione.php");
      }
    }else{
      $_SESSION["erroreRegistrazione"] = 2;
      header("Location: registrazione.php");
    } 
  }else{
    $_SESSION["erroreRegistrazione"] = 3;
    header("Location: registrazione.php");
  }
  
?>