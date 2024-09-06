<?php
require_once __DIR__ . '/logic.php';
?>
<body>
<table>
    <tr>
        <th>#</th>
        <?php foreach ($lessons as $lesson){
            echo '<th>'.$lesson.'</th>';
        }
        ?>
    </tr>
    <?php foreach ($students_stats as $student => $stats){
        echo '<tr>';
        echo '<td>'.$student.'</td>';
        foreach ($lessons as $lesson){
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