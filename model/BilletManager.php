<?php

class BilletManager
{


    public function getBillets()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

        return $req;
    }


    public function getBillet($billetId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation  FROM billets WHERE id = ?');
        $req->execute(array($billetId));
        $billet = $req->fetch();

        return $billet;
    }

    private function dbConnect()
    {
    $db = new PDO('mysql:host=localhost;dbname=manonform;charset=utf8', 'root', '');
    return $db;
    }

}
