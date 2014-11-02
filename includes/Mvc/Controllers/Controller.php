<?php

namespace Mvc\Controllers;

use Mvc\Models\Model;
use Mvc\Views\View;

interface SetModel
{
    public function setModel();
}

/**
 * Class Controller
 * @package Mvc\Controllers
 */
class Controller implements SetModel
{
    /**
     * @var View
     */
    protected $view;
    protected $model;


    public function __construct()
    {
        $this->setView();
        $this->setModel();
    }

    private function setView()
    {
        $this->view = new View();
    }

    public function setModel()
    {
        $this->model = new Model();
    }

    public function get_home()
    {
        $data = $this->model->getInfo();
        $this->view->render($tpl = 'home', $data);
    }

}
