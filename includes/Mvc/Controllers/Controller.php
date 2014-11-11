<?php

namespace Mvc\Controllers;

use Mvc\Models\Model;
use Mvc\Views\View;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class Controller
 * @package Mvc\Controllers
 */
abstract class Controller
{
    /**
     * @var View
     */
    protected $view;
    /**
     * @var model
     */
    protected $model;

    /**
     * @var $request
     */
    protected $request;

    /**
     * @var $twig
     */
    protected $twig;


    public function __construct(Request $request)
    {
        $this->request = $request;

//        $this->twig = $twig;
//        $this->getView();
//        $this->getModel();
    }

    private function getModel()
    {
        $this->model = new Model();
    }

    private function getView()
    {
        $this->view = new View();
    }

    /**
     * @return mixed
     */
    abstract protected function setView();

    /**
     * @return mixed
     */
    abstract protected  function setModel();

    /**
     * @param null $tpl
     * @return mixed
     */
    abstract public function show($tpl = null);

}
