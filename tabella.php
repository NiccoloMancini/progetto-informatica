<table class="table text-center w-75 mx-auto">
    <tr>
    <?php
      
        if ($result->num_rows > 0) {
          foreach($result->fetch_fields() as $columnName){
            echo "<th>". $columnName->name. "</th>";
          }
          echo "</tr>";
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $column){
              echo "<td>". $column. "</td>";
            }
            echo "</tr>";
          }
        }else{
          echo "<h1 class='text-center'>Nessun attore trovato con anno di nascita compreso tra " . $_GET["annominimo"] . " e " . $_GET["annomassimo"] . "</h1>";
        }
      
    ?>
    </table>
