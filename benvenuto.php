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
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body>
    <div id="background">
      <?php
          if($result = $conn->query("SELECT username, nome, cognome, email FROM UTENTE WHERE username = '" . $_SESSION["usernamelog"] . "'")){
            $row = $result->fetch_assoc();
            echo "<ul>";
            echo "<li> username: " . $row["username"] . "</li>";
            echo "<li> nome: " . $row["nome"] . "</li>";
            echo "<li> cognome: " . $row["cognome"] . "</li>";
            echo "<li> email: " . $row["email"] . "</li>";
            echo "</ul>";
          }
      ?>
      <button type="submit" class="btn btn-danger" onclick="ApriFinestra()">Logout</button>
    </div>
    <div id="apriChiudiFinestra" class=" divInTheMiddle d-none bg-secondary-subtle p-5 rounded-3">
      <button type="button" class="btn btn-danger fw-bold" onclick="ChiudiFinestra()">X</button>
      <p class="fs-1 fw-bold">EFFETTUA LOGOUT?</p>
      <form action="./logout.php">
        <button type="submit" class="btn btn-outline-danger">Logout</button>
      </form>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>