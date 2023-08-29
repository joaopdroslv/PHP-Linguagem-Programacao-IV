<?php
for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>";
}
?>

<?php
for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    continue; // Ignora o que estiver a baixo e volta pro laço para mais 1 repetição
  }
  echo "The number is: $x <br>";
}
?>