<?php

$data = [
    ['Петров', 'Математика', 5],
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
    ['Петров', 'Физ-ра', 4],
    ['Петров', 'Биология', 4],
];

$studentsWithMarks = [];
$allUniqueLessons = [];

foreach ($data as $line) {
    if (empty($studentsWithMarks[$line[0]][$line[1]])) {
        $studentsWithMarks[$line[0]][$line[1]] = 0;
    }
    $studentsWithMarks[$line[0]][$line[1]] += $line[2];
    if (in_array($line[1], $allUniqueLessons))
    {
        $allUniqueLessons[] = $line[1];
    }
}

ksort($studentsWithMarks);
sort($allUniqueLessons);
