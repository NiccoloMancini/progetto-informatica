<?php
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
