<?php

namespace Mvc;

use Mvc\Controllers\Controller;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Route
 * @package Mvc
 */
class Route
{
    public function __construct()
    {
        $request = Request::createFromGlobals();
        $routes = new RouteCollection();
        $context = new RequestContext();
        $matcher = new UrlMatcher($routes, $context);

        // routes
        $routes->add('page', new \Symfony\Component\Routing\Route('/page/{name}'));
        $routes->add('home', new \Symfony\Component\Routing\Route('/'));
        $routes->add('home1', new \Symfony\Component\Routing\Route('/{name}'),array('name' => 'home'));

        $context->fromRequest($request);
        $attributes = $matcher->match($request->getPathInfo());
        $route = $attributes['_route'];

        if ($route == 'home' || $route == 'home1') {
            $file = __DIR__ . '/Controllers/Controller.php';

            if (file_exists($file)) {

                require_once $file;

                $actController = new Controller();
                $actController->getHome();

            }
        }

        $controller = ucfirst($route) . 'Controller';
        $file = __DIR__ . '/Controllers/' . $controller . '.php';

        if (file_exists($file)) {

            require_once $file;

            $actController = new $controller;

            if (isset($attributes['name'])) {
                $actController->show($attributes['name']);
            }
        }
    }
}