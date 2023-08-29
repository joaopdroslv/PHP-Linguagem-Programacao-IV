<?php
    $string = "Ola mundo, o dia esta incrivel hoje";

    $arrayString = array(explode(" ",$string));
    $arrayStringLetras = array(str_split($string));

    $palavra = "dia";

    echo "Texto usado: 'Olá mundo, o dia esta incrível hoje'.<br /><br />";
    echo "Buscando a palavra 'dia' no texto.<br /><br />";

    $qtde_palavras = 0;
    foreach($arrayString as $i) {
        if ($i == $palavra) {
            echo "A palavra {$palavra} foi encontrada no texto!<br /><br />";
        }
        $qtde_palavras++;
    }

    echo "Existem {$qtde_palavras} palavras no texto.<br /><br />";

    $qtde_letras = 0;
    foreach($arrayStringLetras as $j) {
        if ($j != " ") {
            $qtde_letras++;
        }
    }

    echo "Existem {$qtde_letras} letras no texto.<br /><br />";

    echo "NÃO CONSEGUI TERMINAR!";
?>