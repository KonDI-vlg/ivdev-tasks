<?php
require_once 'CommentsTable.php';

$comments = CommentsTable::getAllComments();
$cnt = count($comments);
?>

<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Комментарии</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="pb-3">
        <h1>
            Комментарии
        </h1>
        <span>Всего комментариев:<?= $cnt ?></span>
    </div>
    <div>
        <div class="send">
            <form class="row" method="post" action="server.php">
                <label for="send__input" hidden>Комментарий:</label>
                <textarea class="form-control col me-2" name="send__input" required></textarea>
                <button class="send__button btn btn-primary col-2" type="submit" name="send-button">Отправить</button>
            </form>
        </div>
        <div>
            <table class="d-flex table table-hover table-bordered">
                <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr class="row mb-1">
                        <td class="col"><?= nl2br(htmlspecialchars($comment['comment'] ))?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
