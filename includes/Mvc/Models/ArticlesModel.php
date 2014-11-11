<?php

namespace Mvc\Models;


use Symfony\Component\HttpFoundation\Request;

class ArticlesModel extends Model
{

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->connection->articles;
    }

    /**
     * Add new Article
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {

        return $this->getAll()->insert(
            [
                "title" => $request->request->get('title'),
                "description" => $request->request->get('description')
            ]
        );
    }

    /**
     * Delete Article from db
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {

        return $this->getAll()->remove(array("title" => ""));
    }
} 