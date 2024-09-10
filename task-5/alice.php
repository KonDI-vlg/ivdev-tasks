<?php

/**
 * @param int $n Количество сестер Алисы
 * @param int $m Количество братьев Алисы
 * @return int Возвращает количество сестер у произвольного брата Алисы
 * @throws Exception Отрицательное значение братьев или сестер
 */
function getCountSisters(int $n, int $m): int
{
    if ($n < 0 || $m < 0) {
        throw new Exception("Отрицательное значение.");
    }
    return $n + 1;
}

try {
    $sisters = getCountSisters(2, 3);
    echo $sisters . " sister(s)";
} catch (Exception $e) {
    echo 'Error: '.$e->getMessage();
}
