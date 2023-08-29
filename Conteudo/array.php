<?php //ARRAY com FOR
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
  echo $cars[$x];
  echo "<br>";
}
?>

<?php //ARRAY
    $array = array(

                "a",
                "b",
        6 =>    "c", // Chave => valor dela
                "d", // Indice 7, o php vai incrementar o ultimo indice

    )
?>

<?php //FOREACH
    $cars = array("Volvo", "Bmw", "Toyota");

    var_dump($cars); // Ver conteúdo de um array
    echo "<hr />";

    print_r($cars); // Outra forma de ver o conteúdo de um array
    echo "<hr />";

    foreach ($cars as $x) {
        echo $x . "<br />";
    }
?>