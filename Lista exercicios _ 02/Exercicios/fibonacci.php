<?php
    $n = 25;
    
    $a = 0;
    $b = 1;
    $c = 1;

    for ($i = 1; $i < $n ; $i++) { 
        $c = $a + $b;
        $a = $b;
        $b = $c;
        echo "{$c} <br />";
    }
?>