<?php

namespace Mvc\Models;


class ArticlesModel extends Model
{

    /**
     * @return mixed
     */
    public function getAll()
    {
        $db = $this->connection;
        $res = $db->query('SELECT * from articles');
        return $res->fetchAll();
    }

    public function create()
    {
        $db = $this->connection;
        $db->exec("INSERT INTO  `articles` (`title`, `text`, `timestamp`)
            VALUES ('Courses - Tutorials', 'education', '2316546')");
        return $db->lastInsertId();
    }
} 