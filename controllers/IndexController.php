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
        $this->title = 'Justify Framework v' . Justify::getVersion();

        return $this->render('index', [ //Variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v' . Justify::getVersion()
        ]);
    }

    /**
     * Renders file views/index/example.php
     *
     * preg_match in file framework/App.php
     * @access public
     * @return string
     */
    public function actionExample()
    {
        $pagination = new SimplePagination(1, 100);
        $this->title = 'Page ' . $pagination->currentPage;

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
        $this->title = 'About';

        return $this->render('about');
    }

    /**
     * Renders file views/index/contacts.php
     * 
     * @return string
     */
    public function actionContacts()
    {
        $this->title = 'Contacts';

        return $this->render('contacts');
    }
}
