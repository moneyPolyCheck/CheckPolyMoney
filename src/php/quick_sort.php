<?php
function quickSort(&$mas, $s, $f, &$symb, &$way)
{
    if ($s < $f) {
        $q = partition($mas, $s, $f, $symb, $way);
        quickSort($mas, $s, $q - 1, $symb, $way);
        quickSort($mas, $q + 1, $f, $symb, $way);
    }
}

function partition(&$mas, $s, $f, &$symb, &$way)
{

    $q = $s;

    for ($i = $s; $i < $f; $i++) {
        if ($mas[$i] <= $mas[$f]) {
            $buf = $mas[$i];
            $tmp = $symb[$i];
            $tmp_way = $way[$i];
            $mas[$i] = $mas[$q];
            $symb[$i] = $symb[$q];
            $way[$i] = $way[$q];
            $mas[$q] = $buf;
            $symb[$q] = $tmp;
            $way[$q] = $tmp_way;
            $q++;
        }
    }

    $buf = $mas[$q];
    $tmp = $symb[$q];
    $tmp_way = $way[$q];
    $mas[$q] = $mas[$f];
    $symb[$q] = $symb[$f];
    $way[$q] = $way[$f];
    $mas[$f] = $buf;
    $symb[$f] = $tmp;
    $way[$f] = $tmp_way;
    return $q;
}

?>