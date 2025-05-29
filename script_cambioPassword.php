<?php
  session_start();
  include("connessione.php");
  $password = hash("sha256", $_POST["nuovaPassword"]);
  if ($result = $conn->query("SELECT passwd FROM utente WHERE username = '" . $_SESSION["usernamelog"] . "'")->fetch_assoc()["passwd"]) {
    if ($result == $nuovaPassword) {
      $_SESSION["erroreNuovaPassword"] = 0;
    }else if ($result = $conn->query("UPDATE utente SET passwd = '$password' WHERE username = '" . $_SESSION["usernamelog"] . "'" )){
      $_SESSION["erroreNuovaPassword"] = 2;
    }
  }else{
    $_SESSION["erroreNuovaPassword"] = 1;
  }
  header("Location: cambio_password.php");
  exit;
?>