<?php require_once 'logic.php' ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Оценки</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <h1>Оценки</h1>
    <table class="col table table-hover">
        <thead>
            <tr class="row">
                <th scope="col" class="col">#</th>
                <?php foreach ($allUniqueLessons as $uniqueLesson): ?>
                    <th scope="col" class="col"><?= $uniqueLesson ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentsWithMarks as $student => $stats): ?>
                <tr class="row">
                    <td class="col"><?= $student ?></td>
                    <?php foreach ($allUniqueLessons as $uniqueLesson):
                        if (empty($stats[$uniqueLesson])): ?>
                            <td class="col"><?= 0 ?></td>
                        <?php else: ?>
                            <td class="col"><?= $stats[$uniqueLesson] ?></td>
                        <?php endif;
                    endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>

