<?php // Void
    function writeMsg() : void {

        echo "Hello world!";

    }

    writeMsg(); // Chamada da função
?>

<?php // Com parametro
    function addNumbers(int $a, int $b) { // Declarou tipo #NÃO É OBRIGATÓRIO#

        return $a + $b;

    }

    echo addNumbers(5, 30);
?>

<?php // Com return
    function sum(int $x, int $y) {

        $z = $x + $y;

        return $z;

    }

    echo "5 + 10 = " . sum(5, 10) . "<br>";

    echo "7 + 13 = " . sum(7, 13) . "<br>";

    echo "2 + 4 = " . sum(2, 4);
?>

<?php
    $y = 10;

    function sum2(int $x, int &$y) { //y sendo passado por referência, ou sejá, ao ser alterado dentro da função, seu valor alterado pode ser acessado fora

        $y++;

        $z = $x + $y;

        return $z;

    }

    echo "5 + 10 = " . sum2(5, 10) . "<br>";

    echo "$y";
?>