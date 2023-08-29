<?php
    $cont = 0;
    $total = 0;

    while ($cont < 100) {
        $total += $cont;
        $cont++;
    }

    echo "O total da soma dos 100 primeiros números inteiros é: {$total}";
?>