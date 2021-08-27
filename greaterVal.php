<?php

function minValue(int $a, int $b) {
    if ($a < $b) {
        $min = $a;
    }
    else {
        $min = $b;
    }
    return $min;
}

$c = minValue(2, 5);
echo $c;

?>
