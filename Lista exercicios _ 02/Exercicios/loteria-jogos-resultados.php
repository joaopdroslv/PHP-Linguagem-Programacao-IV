<?php
    $jogos = array(); // array de jogos
    $numeros = array(); // array de números do jogo

    for ($i = 0; $i < 10; $i++) { // laço dos jogos
        for ($j = 0; $j < 6; $j++) { // laço dos números do jogo
            $num = rand(1, 60);
            array_push($numeros, $num);

            if (sizeof($numeros) == 6) {
                $str_numeros = implode("-", $numeros); // transformando jogo em string para inseir no array de jogos
                array_push($jogos, $str_numeros);

                $numeros = array(); // zerando array de números do jogo
            } 
        }
    }

    $resultado = array(); // array resultado

    for ($comprimento = count($resultado); $comprimento < 6; $comprimento++) {
        $flag = "sim";
        $num = rand(1,60);

        foreach ($resultado as $res) {
            if ($num == $res) { // numero já existe dentro do array
                $flag = "nao"; // marca ele como "não pode ser inserido"
            }
        }

        if ($flag == "sim"){
            array_push($resultado, $num);
        }
    }

    $str_resultado = implode("-", $resultado); // transformando array resultado em string para exibir

    print_r("O resultado é: $str_resultado <br /><br />");

    $cont = 1;
    foreach ($jogos as $l) {
        $qtde_acertos = 0;
        $jogoSeparado = explode("-", $l); // array que recebe jogo separado
        foreach ($jogoSeparado as $m) {
            foreach ($resultado as $n) {
                if ($m == $n) {
                    $qtde_acertos++;
                }
            }
        }

        echo "O jogo {$cont} = {$l} | Acertou {$qtde_acertos} números! <br /> <br />";
        $cont++;
    }

?>