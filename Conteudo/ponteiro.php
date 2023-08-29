<?php
    $arr = array(1, 2, 3, 4);

    foreach ($arr as $valor) { // Não altera o valor do array

        $valor = $valor * 2;

    }

    var_dump(($arr));
?>

<?php
    $arr = array(1, 2, 3, 4);

    foreach ($arr as &$valor) { 
        // Altera valor do array, pois o & aponta o 
        //      endereço da memória para alterar a variável dentro do array

        $valor = $valor * 2;

    }

    var_dump(($arr));
?>