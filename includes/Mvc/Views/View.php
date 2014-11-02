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
        include sprintf('templates/%s.php', $html);
    }
} 