<?php

namespace Justify\System;

/**
 * Class Controller
 *
 * System class Controller consists of methods for work with app controller
 *
 * @package Justify\System
 */
abstract class Controller extends BaseObject
{
    /**
     * Stores matches of preg_match function
     *
     * @var array
     */
    public $matches;

    /**
     * Request object
     *
     * @since 2.0
     * @var Request
     */
    public $request;

    /**
     * Response object
     *
     * @since 2.3.0
     * @var Response
     */
    public $response;

    /**
     * Controller constructor
     *
     * Sets default name of template if template equals false
     *
     * Default value of file extension and template you can find
     * in config/settings.php
     *
     * @param array $matches matches of preg_match function
     */
    public function __construct(array $matches = [])
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->matches = $matches;
    }
}
