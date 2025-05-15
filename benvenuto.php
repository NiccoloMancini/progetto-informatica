<?php
    session_start();
    if ($_SESSION["erroreLogin"] == -1) {
      header("Location: index.php");
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
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index">
    <div class="mx-auto w-75 rounded-3 p-4 bg-white mt-5">
      <?php
        echo "<h1>Benvenuto " . $_SESSION["usernamelog"] . "</h1>";
        echo "<h4>Numero di recensioni effettuate: " . $conn->query("SELECT COUNT(*) as tot FROM recensione AS r JOIN utente AS u ON r.id_utente = u.id_utente WHERE u.username = '" . $_SESSION["usernamelog"] ."'")->fetch_assoc()["tot"] . "</h4>";
        $result = $conn->query("SELECT ri.nome, ri.indirizzo, re.voto, re.data FROM ristorante AS ri JOIN recensione AS re ON ri.id_ristorante = re.id_ristorante JOIN utente AS u ON re.id_utente = u.id_utente WHERE u.username = '" . $_SESSION["usernamelog"] . "'");
        ?>
        <table class="table text-center w-50 mx-auto">
        <tr>
        <?php
        if ($result->num_rows>0){
          echo "<th>nome</th> <th>indirizzo</th> <th>voto</th> <th>data</th>";
          include("tabella.php"); 
        }else{
          echo "<p class='text-danger'>Nessuna recensione effettuata!</p>";
        }
      ?><br>
      <div>
        <h2>Specifiche ristorante</h2>
        <form action="info_ristorante.php" method="post">
          <?php include("selectRistoranti.php");?><br>
          <button type="submit" class="btn btn-success">Invia</button>
        </form>
      </div>
      <div class="d-none" id="nuovoRistorante">
      <h2>Lascia una nuova recensione</h2>
      <form action="./inserisciRecensione.php" method="post" class="mb-3">
          <div class="stelleValutazione">
              <input id="voto-5" type="radio" name="voto" value="5" required/>
              <label for="voto-5" title="5 stelle">
                  <svg viewBox="0 0 576 512" height="1em">
                      <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                  </svg>
              </label>
              <input id="voto-4" type="radio" name="voto" value="4" required/>
              <label for="voto-4" title="4 stelle">
                  <svg viewBox="0 0 576 512" height="1em">
                      <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                  </svg>
              </label>
              <input id="voto-3" type="radio" name="voto" value="3" required/>
              <label for="voto-3" title="3 stelle">
                  <svg viewBox="0 0 576 512" height="1em">
                      <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                  </svg>
              </label>
              <input id="voto-2" type="radio" name="voto" value="2" required/>
              <label for="voto-2" title="2 stelle">
                  <svg viewBox="0 0 576 512" height="1em">
                      <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                  </svg>
              </label>
              <input id="voto-1" type="radio" name="voto" value="1" required/>
              <label for="voto-1" title="1 stella">
                  <svg viewBox="0 0 576 512" height="1em">
                      <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                  </svg>
              </label>
          </div> <br>
          <?php include("selectRistoranti.php");?><br>
          <button type="submit" class="btn btn-success">Invia</button>
          <?php
              if (isset($_SESSION["esitoRecensione"])) {
                  echo "<p>".$_SESSION["esitoRecensione"]."</p>";
                  unset($_SESSION["esitoRecensione"]);
              }
          ?>
      </form>
      </div>
      <div class="text-end">
        <button type="button" class="btn btn-success" onclick="nuovoRistorante()">Nuova Recensione</button><br><br>
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
