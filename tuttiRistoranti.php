<?php
  session_start();
  include("connessione.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutti i Ristoranti - Icchesimangia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index">
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
  <div class="container-fluid position-relative">
    <div class="d-flex align-items-center">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="./images/logo.png" alt="Logo" width="50" height="44" class="me-2 rounded" />
        <span class="fs-4 fw-bold">ICCHESIMANGIA</span>
      </a>
    </div>
    <div class="d-none d-lg-flex position-absolute start-50 translate-middle-x">
      <a href="./tuttiRistoranti.php" class="btn d-flex align-items-center gap-2">
        <i class="bi bi-shop fs-5"></i>
        <span class="fw-semibold">Tutti i Ristoranti</span>
      </a>
    </div>
    <div class="d-flex align-items-center gap-2 ms-auto">
      <form class="d-flex" action="./paginaLogin.php" method="post">
        <button class="btn btn-outline-success px-3 d-flex align-items-center gap-2" type="submit">
        <i class="bi bi-box-arrow-in-right"></i>
        Login
        </button>
      </form>
    </div>
  </div>
</nav>
    <div class="container py-5">
      <h1 class="text-center mb-5">Ristoranti disponibili</h1>
      <div class="row g-4">
        <?php
          if($result = $conn->query("SELECT nome, indirizzo, civico, citta FROM ristorante")){
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "
                      <div class='col-sm-10 col-md-6 col-lg-4 d-flex justify-content-center'>
                        <div class='card shadow-sm rounded-4' style='width: 100%; max-width: 20rem;'>
                          <img src='./images/piatto.jpg' class='card-img-top rounded-top-4' alt='Immagine piatto'>
                          <div class='card-body'>
                            <h5 class='card-title fw-bold'>" . $row["nome"] . "</h5>
                            <p class='card-text text-muted'>
                              <b>Indirizzo:</b> " . $row["indirizzo"] . " " . $row["civico"] . "<br>
                              <b>Località:</b> " . $row["citta"] . "
                            </p>
                          </div>
                        </div>
                      </div>
                    ";
                  }
              } else {
                echo "<p class='text-center text-muted'>Nessun ristorante trovato.</p>";
              }
          } else {
            echo "<p class='text-center text-danger'>Errore nella query al database.</p>";
          }
        ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
