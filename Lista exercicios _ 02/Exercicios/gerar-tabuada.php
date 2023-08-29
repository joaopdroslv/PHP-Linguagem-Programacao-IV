<?php
    for ($i = 0; $i < 100; $i++) { // Loop primeiro elemento
        for ($contador = 0; $contador <= 100; $contador++){ // Loop para determinar em qual elemento está
            while ($i == $contador) {
                    echo "<br /><br /> Tabuada do $contador <br />";
                    break;
                }
            }
            
            for ($num = 0; $num <= 10; $num ++){ // Loop para determinar o segundo elemento e realizar a multiplicação
                $calc = $i * $num;
                echo "$i X $num = $calc <br />";
            }
    }
?>  