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
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid d-flex flex-column align-items-center">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
        <li class="nav-item">
          <a class="nav-link active px-3" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="./tuttiRistoranti.php">Tutti i Ristoranti</a>
        </li>
      </ul>
      <form class="d-flex" action="./paginaLogin.php" method="post">
        <button class="btn btn-outline-success px-3" type="submit">Login</button>
      </form>
    </div>
  </div>
</nav>
  <div class="container">
    <div class="row">
        <?php
          if($result = $conn->query("SELECT nome, indirizzo, civico, citta FROM ristorante")){
              if ($result->num_rows>0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<div class='col-4 my-4'> <div class='card width:53%' style='width: 18rem;'> <div class='card-body p-3'> <img src='./images/piatto.jpg' class='card-img-top'>";
                    echo "<h5 class='card-title py-2'>" . $row["nome"] . "</h5>";
                    echo "<p class='card-text'><i><b>Indirizzo: </b>" . $row["indirizzo"] . " " . $row["civico"] . "<br><b>Località: </b>" . $row["citta"] .  "</i></p></div></div></div>";
                  }
              }
          }

        ?>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>