<?php
    $numeros = array();

    for ($i = 0; $i < 50; $i++) {
        $num = rand(1, 50);
        array_push($numeros, $num);
    }

    $qtde_pares = 0;
    $qtde_primos = 0;
    
    foreach ($numeros as $n) {
        $divisores = 0;
        for($count=2; $count < $n; $count++) {
            if($n % $count == 0){
                $divisores++;
            }
        }

        if ($divisores == 0) {
            $qtde_primos++;
        }

        if ($n % 2 == 0) {
            $qtde_pares++;
        }
    }
   
    sort($numeros);

    echo "A quantidade de números pares é: {$qtde_pares} <br />";
    echo "A quantidade de números primos é: {$qtde_primos} <br /><br />";

    foreach ($numeros as $k) {
        echo "{$k} <br />";
    }
?>