<?php

/**
 * Class PageController
 */
class PageController extends Mvc\Controllers\Controller
{
    /**
     * @param null $tpl
     */

    public function Show($tpl = null)
    {
        $data = $this->setModel()->getInfo();
        $this->view->render($tpl, $data);
    }

    public function setModel()
    {
        return new \Mvc\Models\PageModel();
    }
}