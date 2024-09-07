<?php
//if(!isset($_POST['send-button'])) {header("Location:index.php");}

function exportComments()
{
    global $db;
    $sql = "SELECT `comment` FROM `Commentaries`";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

try {
    $db = new PDO('mysql:host=localhost;dbname=task-3', 'root', 'root');
}
catch (PDOException $e) {
    echo $e->getMessage();
}
$sql = "CREATE TABLE IF NOT EXISTS `Commentaries` (
        `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `comment` VARCHAR(255) NOT NULL)";
$db->query($sql);

if(isset($_POST['send__input']) and !empty(trim($_POST['send__input']))) {
    $comment = htmlspecialchars($_POST["send__input"]);
    $sql = "INSERT INTO `Commentaries` (`comment`) VALUES ( :comment )";
    $params = [
        "comment" => $comment
    ];
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    header("Location:index.php");
}


