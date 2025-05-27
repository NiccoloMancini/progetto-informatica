<?php
  session_start();
  include("connessione.php");
  $id = $_POST["id_tabella"];
  if($conn->query("DELETE FROM RECENSIONE where id_recensione = '$id'")){
    header("Location: benvenuto.php");
  }else{
    echo "<p class'text-danger'>Errore nella query</p>";
  }
?>