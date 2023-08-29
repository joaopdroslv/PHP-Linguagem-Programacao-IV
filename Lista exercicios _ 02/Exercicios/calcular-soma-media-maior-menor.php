<?php
    echo "São 50 elementos capturados com uma função randomize()<br /><br />";

    $numeros = array();

    for ($i = 0; $i < 50; $i++) {
        $num = rand(1, 1000);
        array_push($numeros, $num);
    }

    $soma = 0;
    foreach ($numeros as $j) {
        $soma += $j;
    }
    echo "A soma dos números do array é: {$soma}<br /><br />";

    $media = $soma / 50;
    echo "A média dos números do array é: {$media}<br /><br />";

    $maior = max($numeros);
    echo "O maior número do array é: {$maior}<br /><br />";
    $menor = min($numeros);
    echo "O menor número do array é: {$menor}<br /><br />";

    echo "Exibindo todo o array!<br /><br />";
    foreach($numeros as $k => $valor) {
        echo "Posição {$k} = {$valor}<br />";
    }
?>