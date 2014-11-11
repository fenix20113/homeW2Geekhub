<?php

namespace Mvc\Controllers;


use Mvc\Models\ArticlesModel;
use Mvc\Models\Model;
use Mvc\Views\ArticlesView;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
    /**
     * @var
     */
    protected $model;

    /**
     * @var
     */
    protected $view;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->setModel();
        $this->setView();
    }

    /**
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function api(Request $request)
    {
        switch ($request->getMethod()) {
            case 'GET':
            default:
                //  $this->getItem($request);
                break;
            case 'POST':

                return $this->createItem($request);
                break;
            case 'DELETE':

               return $this->deleteItem($request);
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
        $this->view = new ArticlesView();
    }

    /**
     * @return mixed
     */
    protected function setModel()
    {
        $this->model = new ArticlesModel();
    }

    /**
     * @param null $tpl
     * @return mixed|void
     */
    public function show($tpl = null)
    {
        $data = $this->model->getAll();
        return $this->view->render($tpl, $data->find());
    }


    public function createItem(Request $request)
    {
        try {
            $create = $this->model->create($request);
            $jsonResponse = new JsonResponse();
            return $jsonResponse->setData($create);
        } catch (\MongoException $e) {
            return new Response($e->getMessage(), Response::HTTP_METHOD_NOT_ALLOWED);
        }

    }

    public function deleteItem(Request $request)
    {

        try {
            $delete = $this->model->delete($request);
            $jsonResponse = new JsonResponse();
            return $jsonResponse->setData($delete);
        } catch (\MongoException $e) {
            return new Response($e->getMessage(), Response::HTTP_METHOD_NOT_ALLOWED);
        }




        return new Response($delete);
    }
}