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
  <body id="index">
    <div class="mx-auto w-75 rounded-3 p-4 bg-white mt-5">
      <?php
        echo "<h1>Benvenuto " . $_SESSION["usernamelog"] . "</h1>";
        $result = $conn->query("SELECT r.*, COUNT(re.id_recensione) as tot_recensioni FROM ristorante as r LEFT JOIN recensione as re on r.id_ristorante = re.id_ristorante GROUP BY r.id_ristorante");
        ?>
        <table class="table text-center w-75 mx-auto">
        <tr>
        <?php
        if ($result->num_rows>0){
            echo "<th>id_ristorante</th> <th>nome</th> <th>indirizzo</th> <th>civico</th> <th>CAP</th> <th>città</th> <th>latitudine</th> <th>longitudine</th> <th>tot_recensioni</th>";
            include("tabella.php"); 
        }else{
            echo "<p class='text-danger'>Nessuna ristorante presente!</p>";
        }
      ?>
      <div class="d-none text-center" id="nuovoRistorante">
        <h2>Inserisci nuovo ristornate</h2>
        <form action="./inserisciRistorante.php" method="post" class="mb-3">
          <label for="lname" class="fw-bold">Nome</label>
          <div>
            <div class="input-group mb-3 w-25 mx-auto">
              <input type="text" class="form-control" aria-describedby="basic-addon1" name="nome">
            </div>
          </div>
          <label for="lname" class="fw-bold">Indirizzo</label>
          <div>
            <div class="input-group mb-3 w-25 mx-auto">
              <input type="text" class="form-control" aria-describedby="basic-addon1" name="indirizzo">
            </div>
          </div>
          <label for="lname" class="fw-bold">Civico</label>
          <div>
            <div class="input-group mb-3 w-25 mx-auto">
              <input type="text" class="form-control" aria-describedby="basic-addon1" name="civico">
            </div>
          </div>
          <label for="lname" class="fw-bold">CAP</label>
          <div>
            <div class="input-group mb-3 w-25 mx-auto">
              <input type="text" class="form-control" aria-describedby="basic-addon1" name="CAP">
            </div>
          </div>
          <label for="lname" class="fw-bold">Città</label>
          <div>
            <div class="input-group mb-3 w-25 mx-auto">
              <input type="text" class="form-control" aria-describedby="basic-addon1" name="citta">
            </div>
          </div>
          <label for="lname" class="fw-bold">Latitudine</label>
          <div>
            <div class="input-group mb-3 w-25 mx-auto">
              <input type="text" class="form-control" aria-describedby="basic-addon1" name="latitudine">
            </div>
          </div>
          <label for="lname" class="fw-bold">Longitudine</label>
          <div>
            <div class="input-group mb-3 w-25 mx-auto">
              <input type="text" class="form-control" aria-describedby="basic-addon1" name="longitudine">
            </div>
          </div>
          <button type="submit" class="btn btn-success">Invia</button>
          <?php
          if (isset($_SESSION["esitoRecensioneAdmin"])) {
                  echo "<p>".$_SESSION["esitoRecensioneAdmin"]."</p>";
                  unset($_SESSION["esitoRecensioneAdmin"]);
              }
          ?>
        </form>
      </div>
      <div class="text-center">
        <button type="button" class="btn btn-success" onclick="nuovoRistorante()">Inserisci ristornate</button>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-danger" onclick="ApriFinestra()">Logout</button>
      </div>
      <div id="apriChiudiFinestra" class=" divInTheMiddle d-none bg-white p-5 rounded-3 op-1" >
        <button type="button" class="btn btn-danger fw-bold" onclick="ChiudiFinestra()">X</button>
        <p class="fs-1 fw-bold">EFFETTUA LOGOUT?</p>
        <form action="./logout.php">
          <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
      </div>
                

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/script.js"></script>
  </body>
</html>
