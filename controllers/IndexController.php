<?php

namespace App\Controllers;

use Justify;
use Justify\System\Controller;
use Justify\Components\SimplePagination;
use App\Models\IndexModel;

class IndexController extends Controller
{
    /**
     * Renders main page in file views/index/index.php
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [ //Variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v' . Justify::getVersion()
        ]);
    }

    /**
     * Renders file views/index/example.php
     *
     * @return string
     */
    public function actionExample()
    {
        $pagination = new SimplePagination(1, 100);

        return $this->render('example', [
            'pagination' => $pagination
        ]);
    }

    /**
     * Renders file views/index/about.php
     * 
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Renders file views/index/contacts.php
     * 
     * @return string
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }
}
