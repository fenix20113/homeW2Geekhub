<?php

namespace Mvc\Controllers;


use Mvc\Models\ArticlesModel;
use Mvc\Models\Model;
use Mvc\Views\ArticlesView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
    protected $articleModel;

    public function __construct(Request $request)
    {

        parent::__construct($request);

        switch ($request->getMethod()) {
            case 'GET':
            default:
              //  $this->getItem($request);
                break;
            case 'POST':
                $this->createItem();
                break;
            case 'DELETE':
            //    $this->deleteItem($request->query->get('id'));
                break;
            case 'PUT':
            //    $this->updateItem($request);
        }
    }

    /**
     * @return mixed
     */
    protected function setView()
    {
        $view = new ArticlesView();

        return $this->articleModel = $view;
    }

    /**
     * @return mixed
     */
    protected function setModel()
    {


       return new ArticlesModel();
    }

    /**
     * @param null $tpl
     * @return mixed|void
     */
    public function show($tpl = null)
    {
        $model = $this->setModel();

//        $model->create();
        $data = $model->getAll();
        return $this->setView()->render($tpl, $data);
    }



    public function createItem()
    {

       $model = $this->setModel();
       $create = $model->create();
echo '<pre>';
var_dump($create);
echo '</pre>';
//exit;
        return new Response($create);
    }
} 