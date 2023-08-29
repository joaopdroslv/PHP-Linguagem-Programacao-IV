<?php
    $numeros = array();
    for ($i = 0; $i < 20; $i++){
        $num = random_int(1, 60);
        array_push($numeros, $num);
    }

    $maximo = max($numeros);
    $minimo = min($numeros);
    $qtde_pares = 0;
    $perc_pares = 0;
    $soma = 0;
    $media = 0;

    foreach($numeros as $n) {
        echo "{$n} <br /><br />";

        if ($n % 2 == 0) {
            $soma += $n;
            $qtde_pares++;
        }
    }

    $media = $soma / 20;

    $perc_pares = ($qtde_pares / 20) * 100;

    echo "O maior número é: {$maximo}<br /><br />";
    echo "O menor número é: {$minimo}<br /><br />";
    echo "O percentual de pares é: {$perc_pares}<br /><br />";
    echo "A média aritimética é {$media}<br /><br />";
?>