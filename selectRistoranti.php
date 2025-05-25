<?php
    if ($result = $conn->query("SELECT nome, id_ristorante FROM ristorante")) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["id_ristorante"]."'>".$row["nome"]."</option>";
            }
        } else {
            echo "<p style='color:red'>Nessun ristorante trovato!</p>";
        }
    } else {
        echo "<h1 style='color:red'>Errore nella query</h1>";
    }
?>
