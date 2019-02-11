<?php

$inputList = array(4, 7, 1, 3, 2, 6);
$str = 0;
$fin = count($inputList) - 1;


function arrSort(&$inputList, $str, $fin)
{

    if ($str < $fin) {
        $mid = (int)(($str + $fin) / 2);

        arrSort($inputList, $str, $mid);
        arrSort($inputList, $mid + 1, $fin);

        merge($inputList, $str, $mid, $fin);
    }

}

function merge(&$inputList, $str, $mid, $fin)
{
    $arrLeft = [];
    $arrRight = [];

    $n1 = $mid - $str + 1;
    $n2 = $fin - $mid;

    for ($i = 1; $i <= $n1; $i++) {
        $arrLeft[$i] = $inputList[$str + $i - 1];
    }

    for ($i = 1; $i <= $n2; $i++) {
        $arrRight[$i] = $inputList[$mid + $i];
    }
    $arrLeft[] = -INF;
    $arrRight[] = -INF;

    $l = 1;
    $r = 1;

    for ($i = $str; $i <= $fin; $i++) {
        if ($arrLeft[$l] >= $arrRight[$r]) {
            $inputList[$i] = $arrLeft[$l];
            $l++;
        } else {
            $inputList[$i] = $arrRight[$r];
            $r++;
        }
    }

}

arrSort($inputList, 0, count($inputList) - 1);
echo  json_encode($inputList), PHP_EOL;
