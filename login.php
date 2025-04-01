<?php
    session_start();
    include("connessione.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($conn->query("SELECT username FROM UTENTE where username = '$username'")->num_rows>0){
      if($conn->query("SELECT username FROM UTENTE where username = '$username' AND passwd = '$password'")->num_rows>0){
        $_SESSION["erroreLogin"] = 0;
        $_SESSION["usernamelog"] = $username;
        header("Location: benvenuto.php");
      }else{
        $_SESSION["erroreLogin"] = 1;
        header("Location: index.php");
      }
    }else{
      $_SESSION["erroreLogin"] = 2;
      header("Location: index.php");
    } 
?>