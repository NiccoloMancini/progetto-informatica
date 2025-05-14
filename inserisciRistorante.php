<?php
    session_start();
    include("./connessione.php");
    $nome = $_POST["nome"];
    $indirizzo = $_POST["indirizzo"];
    $civico = $_POST["civico"];
    $CAP = $_POST["CAP"];
    $citta = $_POST["citta"];
    if($conn->query("INSERT INTO ristorante (nome, indirizzo, civico, CAP, citta) VALUES ('$nome', '$indirizzo', '$civico', '$CAP', '$citta')")) {
        $_SESSION["esitoRecensioneAdmin"] = "Ristornate Inserito!";
    }else{
        $_SESSION["esitoRecensioneAdmin"] = "Ristornate non inserito!";
    }
    header("Location: pannelloAdmin.php");
    exit;
?>