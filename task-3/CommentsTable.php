<?php
require_once 'Database.php';

class CommentsTable
{

    public static function insertComment($comment)
    {
        $query = Database::prepare("INSERT INTO `Commentaries` (comment) VALUES(:comment)");
        $query->bindValue(':comment', $comment);

        if (!$query->execute()) {
            throw new PDOException("При добавлении комментария возникла ошибка");
        }
    }

    public static function getAllComments()
    {
        $query = Database::prepare("SELECT * FROM `Commentaries`");
        if (!$query->execute()) {
            throw new PDOException("При выводе комментариев произошла ошибка");
        }
        return $query->fetchAll();
    }
}