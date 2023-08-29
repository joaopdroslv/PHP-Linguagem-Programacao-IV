<?php
    for ($x = 0; $x <= 10000; $x++) {
        if ($x % 2 == 0) {
            echo "<b>$x</b>" . "&nbsp;";
        } else {
            echo $x . "&nbsp;";
        }

        if ($x % 10 == 0) {
            echo "<br />";
        }
    }
?>