<?php
  session_start();
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
                <li class="nav-item">
                    <a class="nav-link px-3" href="#">Scrivi una Recensione</a>
                </li>
            </ul>
            <form class="d-flex" action="./paginaLogin.php" method="post">
                <button class="btn btn-outline-success px-3" type="submit">Login</button>
            </form>
        </div>
    </div>
  </nav>
  <div class="mx-auto w-75 rounded-3 p-4 bg-white mt-5">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <p>Benvenuto su <strong>[Nome del sito]</strong>, la piattaforma dedicata a chi ama scoprire nuovi ristoranti e condividere la propria esperienza culinaria! <br>Il nostro obiettivo è offrire uno spazio libero e trasparente dove ogni utente può leggere e scrivere recensioni sincere sui ristoranti che ha visitato. Che si tratti di una cena romantica, di un pranzo di lavoro o di una semplice uscita tra amici, ogni opinione conta e può aiutare altri a scegliere il locale perfetto. Siamo un team appassionato di buon cibo, qualità e condivisione. Crediamo che una recensione autentica valga più di mille pubblicità, ed è per questo che mettiamo al centro le esperienze reali dei nostri utenti.</p>
      </div>
      <div class="col-6 d-flex justify-content-center align-items-center">
        <img src="./images/logo.png" class="w-100" alt="Logo Icchesimangia?">
      </div>
    </div>
  </div>
</div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>