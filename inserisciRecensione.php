<?php
    session_start();
    include("connessione.php");
    $id_utente = $conn->query("SELECT id_utente as id FROM utente WHERE username = '". $_SESSION["usernamelog"]."'")->fetch_assoc()["id"];
    $id_ristorante = $_POST["ristorante"];
    $voto = $_POST["voto"];
    if ($conn->query("SELECT * FROM recensione WHERE id_utente = $id_utente AND id_ristorante = $id_ristorante")->num_rows>0) {
        $_SESSION["esitoRecensione"] = "Numero massimo recensioni raggiunto per questo ristorante";
    } else {
        $conn->query("INSERT INTO recensione (voto, id_utente, id_ristorante) VALUES ($voto, $id_utente, $id_ristorante)");
        $_SESSION["esitoRecensione"] = "Recensione avvenuta con successo!";
    }
    header("Location: benvenuto.php");
    exit;
?>