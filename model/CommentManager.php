<?php

class CommentManager
{


public function getComments($postId)
{
    $db = $this-> dbConnect();
    $comments = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire ,\'%d/%m/%Y à %Hh%imin%ss\') AS date_creation  FROM commentaires WHERE id_billet= ? ORDER BY id DESC');
    $comments->execute(array($postId));

    return $comments;
}

private function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=manonform;charset=utf8', 'root', '');
    return $db;
}


public function postComment($postId, $author, $comment)
{
    $db =  $this->dbConnect();
    $comments = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}
public function changeComment($postId, $author, $comment)
{
    $db =  $this->dbConnect();
    $comments = $db->prepare( 'UPDATE commentaires SET auteur = ?, commentaire = ?, date_commentaire = NOW() WHERE id = ? AND post_id = ?');
    $affectedComment = $comments->execute(array($postId, $author, $comment));

    return $affectedComment;
}

}