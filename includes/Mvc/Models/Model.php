<?php

namespace Mvc\Models;

use Mvc\Config;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Model
 * @package Mvc\Models
 */
class Model
{

    public $connection ;

    public function __construct()
    {
        $this->connection = $this->connect();
    }


    public function connect()
    {
        try {
          $con = new \MongoClient();
          $db = $con->mvcdb;
          return $db->createCollection('articles');

        } catch (\MongoException $e) {

            echo 'error: ' . $e->getMessage() . '<br />';
            echo 'error: ' . $e->getFile() . '<br />';
            die();

        }

    }

    /**
     * @return Request
     */
    public function getInfo()
    {

    }
}