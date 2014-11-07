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
        $this->connection = $this->connect(new Config());
    }

    /**
     * @param Config $config
     * @return PDO
     */
    public function connect(Config $config)
    {
        try {

          return new \PDO('mysql:host=' . $config->host . ';dbname=' . $config->db , $config->user ,  $config->password);

        } catch (\PDOException $e) {

            echo 'error' . $e->getMessage() . '<br />';
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