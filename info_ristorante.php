<?php
  session_start();
  include("connessione.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index">
    <div class="mx-auto w-75 rounded-3 p-4 bg-white mt-5">
      <h1 class="mb-5 mt-3">Specifiche ristorante</h1>
      <?php
        $ristorante = $_POST["ristorante"];
        $result2 = $conn->query("SELECT * FROM ristorante WHERE id_ristorante = $ristorante");
        $row = $result2->fetch_assoc();
        echo "<ul>";
        echo "<li>Nome: " . $row["nome"] . "</li>";
        echo "<li>Indirizzo: " . $row["indirizzo"] . " " . $row["civico"] . "</li>";
        echo "<li>CAP: " . $row["CAP"] . "</li>";
        echo "<li>Città: " . $row["citta"] . "</li>";
        echo "</ul>";
        ?>
        <h1 class="my-3">Recensioni ristorante</h1>
        <table class="table text-center w-50 mx-auto">
        <tr>
        <?php
        $result = $conn->query("SELECT id_utente, voto, `data` FROM recensione WHERE id_ristorante = $ristorante");
        if ($result->num_rows>0){
          echo "<th>id_utente</th> <th>voto</th> <th>data</th>";
          include("tabella.php"); 
        }else{
          echo "<p class='text-danger'>Nessuna recensione effettuata!</p>";
        }
      ?>
       <div id="map"></div>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="./js/script.js"></script>
  </body>
</html>