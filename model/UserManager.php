<?php

namespace Guillaume\projet4\model;

require_once('Manager.php');

class UserManager extends Manager 
{
public function insertUser($pseudo, $motdepasse)
{
    $db = $this->dbConnect();
    $pass_hache = password_hash($motdepasse, PASSWORD_DEFAULT);
    $req = $db->prepare('INSERT INTO user (pseudo, motdepasse) VALUES(?, ?)');
    $affectedLines = $req->execute(array($pseudo, $pass_hache));
    return $affectedLines;
}

public function checkPseudo($pseudo)
{
    $db = $this->dbConnect();

    $req = $db->prepare('SELECT pseudo FROM user WHERE pseudo = ?');
    $req->execute(array($pseudo));

    if ($req->rowCount() == 0)
    {
        return true;
    }
    else {
        return false;
    }
}

public function userExists($pseudo)
{
    $db = $this->dbConnect();

    $req = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    return $req;
}

}