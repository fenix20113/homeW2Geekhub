<?php

namespace Mvc\Views;

/**
 * Class View
 * @package Mvc\Views
 */
class View
{
    /**
     * @param $html
     * @param string $data
     */
    public function render($html, $data = '')
    {
        switch ($html) {
            case 'news':
                include "templates/news.php";
                break;
            case 'home':
                include "templates/home.php";
                break;
            default:
                include "templates/error.php";
        }
    }
} 