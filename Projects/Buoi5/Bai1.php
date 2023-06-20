<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bảng</title>
</head>

<style>
    table {
      border-collapse: collapse;
    }
    td{
      padding: 20px;
    }
</style>

<body>
  <table border="1">
    <?php
      $counter = 1;
      for ($i = 0; $i < 5; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 5; $j++) {
          echo "<td>" . $counter . "</td>";
          $counter++;
        }
        echo "</tr>";
      }
    ?>
  </table>
</body>

</html>

