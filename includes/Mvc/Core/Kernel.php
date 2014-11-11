<?php

namespace Mvc\Core;

use Mvc\Controllers\ArticleController;
use Mvc\Controllers\ArticlesController;
use Mvc\Controllers\PageController;
use Mvc\Models\ArticlesModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class Kernel
 * @package Mvc\Core
 */
abstract class Kernel implements KernelInterface
{

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request)
    {
        $routes = new RouteCollection();

        // routes
        $routes->add('page', new Route('page/{name}'));
        $routes->add('pages', new Route('page'));
        $routes->add('articles', new Route('articles'));
        $routes->add('article', new Route('articles/{id}'), ['id' => null]);
        $routes->add('api/article', new Route('api/article'));
        $routes->add('home', new Route('/'));
        $routes->add('home1', new Route('/{name}'), array('name' => 'home'));

        $context = new RequestContext();
        $context->fromRequest($request);
        $matcher = new UrlMatcher($routes, $context);
        $PageController = new PageController($request);

        try {
            $attributes = $matcher->match($request->getPathInfo());
        } catch (ResourceNotFoundException $e) {
            throw new RouteNotFoundException('Not Found');

        }

        switch ($attributes['_route']) {
            case 'articles' :
                $controller = new ArticlesController($request);
                $show = $controller->show($attributes['_route']);
                return new Response($show, Response::HTTP_OK);
                break;
            case 'api/article':
                $cont = new ArticlesController($request);
                return $cont->api($request);
                break;
        }

        $show = $controller->show('home');

        if ($show) {
            return new Response($show, Response::HTTP_OK);
        } else {
            goto error;
        }

        error:
        return new Response($PageController->show('error'), Response::HTTP_NOT_FOUND);
    }

}