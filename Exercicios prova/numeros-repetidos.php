<?php
    $vet1 = array();
    $vet2 = array();
    $vet3 = array();

    for ($i = 0; $i < 20; $i++) {
        $num1 = random_int(1, 100);
        array_push($vet1, $num1);
    }

    for ($j = 0; $j < 20; $j++) {
        $num2 = random_int(1, 100);
        array_push($vet2, $num2);
    }

    for ($k = 0; $k < 20; $k++) {
        $num3 = random_int(1, 100);
        array_push($vet3, $num3);
    } 

    $repetidos = array();

    echo "Exibindo primeiro array de números: <br /><br />";
    foreach ($vet1 as $n) {
        echo "{$n} - \t";
        if (in_array($n, $vet2) == true) { 
            if (in_array($n, $repetidos) == false){
                array_push($repetidos, $n);
            }
        }
    }

    echo "<br /><br /> Exibindo segundo array de números: <br /><br />";
    foreach ($vet2 as $m) {
        echo "{$m} - \t\t";
        if (in_array($m, $vet3) == true) { 
            if (in_array($m, $repetidos) == false){
                array_push($repetidos, $m);
            }
        }
    }

    echo "<br /><br /> Exibindo terceiro array de números: <br /><br />";
    foreach ($vet3 as $o) {
        echo "{$o} - \t\t";
        if (in_array($o, $vet1) == true) { 
            if (in_array($o, $repetidos) == false){
                array_push($repetidos, $o);
            }
        }
    }

    echo "<br /><br /> Exibindo array de números repetidos: <br /><br />";
    foreach($repetidos as $n) {
        echo "{$n} é repetido! <br /><br />";
    }
?>