<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Benvenuto | ICCHESIMANGIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index" class="bg-light">
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
  <div class="container-fluid position-relative">
    <div class="d-flex align-items-center">
      <a class="navbar-brand d-flex align-items-center" href="#">
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
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="bg-white rounded-4 shadow p-4 p-md-5">
            <div class="row align-items-center g-4">
              <div class="col-md-6">
                <h2 class="mb-4">Benvenuto su <span class="text-primary fw-bold">ICCHESIMANGIA</span>!</h2>
                <p class="fs-5">
                  La piattaforma dedicata a chi ama scoprire nuovi ristoranti e condividere la propria esperienza culinaria! Il nostro obiettivo è offrire uno spazio libero e trasparente dove ogni utente può leggere e scrivere recensioni sincere sui ristoranti che ha visitato.
                </p>
                <p class="fs-5">
                  Che si tratti di una cena romantica, di un pranzo di lavoro o di una semplice uscita tra amici, ogni opinione conta e può aiutare altri a scegliere il locale perfetto.
                </p>
                <p class="fs-5">
                  Siamo un team appassionato di <strong>buon cibo, qualità e condivisione</strong>. Crediamo che una recensione autentica valga più di mille pubblicità: mettiamo al centro le esperienze reali dei nostri utenti.
                </p>
              </div>
              <div class="col-md-6 text-center">
                <img src="./images/logo.png" alt="Logo Icchesimangia?" class="img-fluid rounded-4 shadow-sm">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
