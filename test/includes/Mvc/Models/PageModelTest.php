<?php

namespace Mvc\Models;

use PHPUnit_Framework_TestCase;
use Mvc\Models\PageModel;


class ArticlesModelTest extends PHPUnit_Framework_TestCase
{
    public function testGetInfo()
    {
        $model = new PageModel();
        $this->assertInternalType('array',$model->getInfo());
    }
}