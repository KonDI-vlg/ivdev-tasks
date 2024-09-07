<?php
require_once __DIR__ . '/logic.php';
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Оценки</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<table>
    <tr>
        <th>#</th>
        <?php foreach ($allUniqueLessons as $lesson){
            echo '<th>'.$lesson.'</th>';
        }
        ?>
    </tr>
    <?php foreach ($studentsWithMarks as $student => $stats){
        echo '<tr>';
        echo '<td>'.$student.'</td>';
        foreach ($allUniqueLessons as $lesson){
            if (empty($stats[$lesson])){
                echo '<td>0</td>';
            }
            else{
                echo '<td>'.$stats[$lesson].'</td>';
            }
        }
        echo '</tr>';
    }
    ?>
</table>
</body>