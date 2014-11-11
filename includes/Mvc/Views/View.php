<?php

namespace Mvc\Views;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class View
 * @package Mvc\Views
 */
class View
{
    /**
     * @param $html
     * @param string $data
     * @return string|Response
     */
    public function render($html, $data = '')
    {
        \Twig_Autoloader::register();
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/templates');
        $twig = new \Twig_Environment($loader, array(
            'cache' => 'compilation_cache',
            'debug' => true
        ));
        $twig->addExtension(new \Twig_Extension_Debug());

        try {
            $template = $twig->loadTemplate(sprintf('%s.html.twig', $html));
        } catch (\Twig_Error_Loader $e) {
            return false;
        }

        return $template->render(array('items' => $data));

    }
}
