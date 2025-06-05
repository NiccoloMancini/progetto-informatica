<?php
    session_start();
    if ($_SESSION["erroreLogin"] == -1) {
        header("Location: paginaLogin.php");
    }
    if ($_SESSION["admin"]!=1) {
        header("Location: logout.php");
    }

    include("connessione.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index" class="bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="./images/logo.png" alt="Logo" width="50" height="44" class="me-2 rounded">
      <span class="fs-4 fw-bold">ICCHESIMANGIA</span>
    </a>
    <div class="d-flex align-items-center gap-2 ms-auto">
      <a href="./pannelloAdmin.php" class="btn btn-outline-primary d-flex align-items-center gap-1">
        <i class="bi bi-house fs-5"></i>
      </a>
      <a href="./profilo.php" class="btn btn-outline-primary d-flex align-items-center gap-1">
        <i class="bi bi-person fs-5"></i>
      </a>
      <a href="./cambio_password.php" class="btn btn-outline-primary d-flex align-items-center gap-1">
        <i class="bi bi-gear-wide-connected fs-5"></i>
      </a>
      <button type="button" class="btn btn-outline-danger d-flex align-items-center gap-1" onclick="ApriFinestra()">
        <i class="bi bi-box-arrow-right fs-5"></i> Logout
      </button>
    </div>
  </div>
</nav>
  <div class="container my-5">
    <div class="card shadow-sm p-4">
      <h1 class="display-5 fw-bold text-primary mb-4">Benvenuto, <?php echo $_SESSION["usernamelog"]; ?></h1>
      <?php
        $result = $conn->query("SELECT r.*, COUNT(re.id_recensione) as tot_recensioni FROM ristorante as r LEFT JOIN recensione as re on r.id_ristorante = re.id_ristorante GROUP BY r.id_ristorante");
        if ($result->num_rows > 0) {
          echo '<div class="table-responsive">';
          echo '<table class="table table-striped table-hover text-center align-middle">';
          echo "<thead class='table-primary'><tr><th>ID</th><th>Nome</th><th>Indirizzo</th><th>Civico</th><th>CAP</th><th>Città</th><th>Latitudine</th><th>Longitudine</th><th>Recensioni</th></tr></thead>";
          include("tabella.php");
          echo '</table></div>';
        } else {
          echo "<p class='text-danger fs-5 text-center'>Nessun ristorante presente!</p>";
        }
      ?>

      <div class="text-center mt-4">
        <button type="button" class="btn btn-success btn-lg" onclick="nuovoRistorante()">
          <i class="bi bi-plus-circle me-2"></i> Inserisci Ristorante
        </button>
      </div>

      <div class="d-none mt-5" id="nuovoRistorante">
        <h2 class="mb-4 text-center text-success">Aggiungi un nuovo ristorante</h2>
        <form action="./inserisciRistorante.php" method="post" class="row g-3 justify-content-center">
          <?php
            $campi = [
              "nome" => "Nome",
              "indirizzo" => "Indirizzo",
              "civico" => "Civico",
              "CAP" => "CAP",
              "citta" => "Città",
              "latitudine" => "Latitudine",
              "longitudine" => "Longitudine"
            ];
            foreach ($campi as $name => $label) {
              echo '
                <div class="col-md-4">
                  <label class="form-label fw-semibold">' . $label . '</label>
                  <input type="text" class="form-control" name="' . $name . '">
                </div>';
            }
          ?>
          <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary px-5">
              <i class="bi bi-send me-2"></i> Invia
            </button>
            <?php
              if (isset($_SESSION["esitoRecensioneAdmin"])) {
                echo "<p class='text-success mt-3'>" . $_SESSION["esitoRecensioneAdmin"] . "</p>";
                unset($_SESSION["esitoRecensioneAdmin"]);
              }
            ?>
          </div>
        </form>
      </div>
      <div id="apriChiudiFinestra" class="divInTheMiddle d-none bg-white p-5 rounded-3 shadow-lg text-center">
      <button type="button" class="btn-close float-end" onclick="ChiudiFinestra()" aria-label="Chiudi"></button>
      <p class="fs-4 fw-bold">Vuoi effettuare il logout?</p>
      <form action="./logout.php">
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/script.js"></script>
  </body>
</html>
