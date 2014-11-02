<?php

namespace Mvc\Models;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class Model
 * @package Mvc\Models
 */
class PageModel extends Model
{
    /**
     * @return Request
     */
    public function getInfo()
    {
        $url = 'http://api.ihackernews.com/page';
        $json = file_get_contents($url);
        $content = json_decode($json);
        return $content->items;
    }
}