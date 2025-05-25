<?php
    session_start();
    include("connessione.php");
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
    if($conn->query("SELECT username FROM UTENTE where username = '$username'")->num_rows>0){
      if($conn->query("SELECT username FROM UTENTE where username = '$username' AND passwd = '$password'")->num_rows>0){
        $_SESSION["erroreLogin"] = 0;
        $_SESSION["usernamelog"] = $username;
        if ($username=="admin") {
          $_SESSION["admin"]=1;
          header("Location: pannelloAdmin.php");
        }else{
          $_SESSION["admin"]=0;
          header("Location: benvenuto.php");
        }
      }else{
        $_SESSION["erroreLogin"] = 1;
        header("Location: paginaLogin.php");
      }
    }else{
      $_SESSION["erroreLogin"] = 2;
      header("Location: paginaLogin.php");
    } 
?>