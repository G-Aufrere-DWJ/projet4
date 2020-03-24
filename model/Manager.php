<?php 

namespace Guillaume\projet4\model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=gaufrere_projet4;charset=utf8', 'gaufrere_guillaume', 'U}*3MLXzcM12');
        return $db;
    }
}