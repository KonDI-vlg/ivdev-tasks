<?php

function countSisters(int $n, int $m): int{
    if($n < 0 || $m < 0){
        throw new Exception("Отрицательное значение.");
    }
    return $n + 1;
}

// Посчитаем сколько сестер у рандомно взятого брата Алисы

$sisters = countSisters(2, 3);

echo $sisters." sister(s)";