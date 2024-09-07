<?php

$data = [
    ['Петров', 'Математика', 5],
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];

$studentsWithMarks = [];
$allUniqueLessons = [];

foreach ($data as $line){
    if(empty($studentsWithMarks[$line[0]][$line[1]])) $studentsWithMarks[$line[0]][$line[1]] =  0;
    $studentsWithMarks[$line[0]][$line[1]] +=  $line[2];
    $allUniqueLessons[] = $line[1];
}
/*
 * $students_stats = [ "Ученик-1" => [ "Предмет-1" => int(Оценка), ...,"Предмет-N" => int(Оценка) ],
 *                     ...,
 *                     "Ученик-N" => [ "Предмет-1" => int(Оценка), ...,"Предмет-N" => int(Оценка) ]
 *                    ];
 */
$allUniqueLessons = array_unique($allUniqueLessons);
array_multisort($studentsWithMarks, SORT_DESC);
sort($allUniqueLessons);

?>


