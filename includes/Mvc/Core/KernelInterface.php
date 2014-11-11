<?php

namespace Mvc\Core;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface KernelInterface
 * @package Mvc\Core
 */
interface KernelInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request);
}