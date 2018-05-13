<?php

namespace App\Controllers;

use Justify;
use Justify\Components\SimplePagination;
use App\Models\Test;

class IndexController extends Controller
{
    /**
     * Renders main page in file views/index/index.php
     */
    public function actionIndex()
    {
        consoleLogArray(['a', 'b', 'c']);
        return $this->render('index', [
            //Variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v' . Justify::getVersion()
        ]);
    }

    /**
     * Renders file views/index/example.php
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
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Renders file views/index/contacts.php
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }
}
