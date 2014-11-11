<?php

namespace Mvc\Controllers;

use Mvc\Models\PageModel;
use Mvc\Views\View;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PageController
 */
class PageController extends Controller
{

    /**
     * @param null $tpl
     * @return mixed|string|\Symfony\Component\HttpFoundation\Response
     */
    public function show($tpl = null)
    {
        $data = $this->setModel()->getInfo();
        return $this->setView()->render($tpl, $data);
    }

    /**
     * @return mixed|void
     */
    protected function setView()
    {
        return new View();
    }

    /**
     * @return mixed|PageModel
     */
    protected function setModel()
    {
        return new PageModel();
    }

    /**
     *  create new Item
     */
    public function createItem()
    {

    }

    /**
     *
     * if execute this method without $id get all Items
     * if $id is exists get Item by $id
     * @param null $id
     */
    public function getItem($id = null)
    {

    }

    /**
     * update Item
     * @param $id
     */
    public function updateItem($id)
    {

    }

    /**
     * delete Item
     * @param $id
     */
    public function deleteItem($id)
    {

    }


}