<?php
require_once "CommentsTable.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location:index.php");
    exit();
}

if (isset($_POST['send__input']) && !empty(trim($_POST['send__input']))) {
    $comment = htmlspecialchars($_POST["send__input"]);
    CommentsTable::insertComment($comment);

    header("Location:index.php");
    exit();
}
