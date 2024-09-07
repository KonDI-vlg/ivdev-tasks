<?php
require_once __DIR__ . '/server.php';

$comments = exportComments();
$cnt = count($comments);
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Комментарии</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div>
        <div>
            <h1>
                Комментарии
            </h1>
            <span>Всего комментариев:<?= $cnt ?></span>
        </div>
        <div>
            <div class="send">
                <form method="post" action="server.php">
                <input name="send__input" required>
                <button class="send__button" type="submit" name="send-button">Отправить</button>
                </form>
            </div>
            <div>
                <table>
                    <tbody>
                    <?php foreach ($comments as $comment):
                        echo '<tr><td>'.$comment['comment'].'</td></tr>';
                    endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>
