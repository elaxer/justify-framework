<?php

namespace App\Index;

use Justify;
use Justify\System\Controller;
use Justify\Modules\Dump;

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
            'frameworkVersion' => 'v' . Justify::getVersion(),
            'title' => 'Justify Framework v' . Justify::getVersion(), //HTML title
        ]);
    }

    /**
     * Renders file views/index/page.php
     * 
     * @param array $matches is optional. Stores matches which returns function
     * preg_match in file framework/App.php
     * @access public
     * @return string
     */
    public function actionPageItem($matches = [])
    {
        //Dump::dump($matches)

        return $this->render('page', [
            'title' => 'Page ' . $matches[1],
            'page' => $matches[1],
        ]);
    }

    /**
     * Renders file views/index/about.php
     * 
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about', [
            'title' => 'About'
        ]);
    }

    /**
     * Renders file views/index/contacts
     * 
     * @return string
     */
    public function actionContacts()
    {
        return $this->render('contacts', [
            'title' => 'Contacts'
        ]);
    }

}
