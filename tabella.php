<table class="table text-center w-50 mx-auto">
  <tr>
  <?php
    echo "<th>nome</th> <th>indirizzo</th> <th>voto</th> <th>data</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      foreach($row as $column){
        echo "<td>". $column. "</td>";
        }
      }
    echo "</tr>";
  ?>
</table>
