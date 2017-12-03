<?php

namespace App\Controllers;

use Justify;
use Justify\System\Controller;
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
            'frameworkVersion' => 'v' . Justify::getVersion(),
            'title' => 'Justify Framework v' . Justify::getVersion(), //HTML title
        ]);
    }

    /**
     * Renders file views/index/page.php
     *
     * preg_match in file framework/App.php
     * @access public
     * @return string
     */
    public function actionPageItem()
    {
        return $this->render('page', [
            'title' => 'Page ' . $this->matches[1],
            'page' => $this->matches[1],
        ]);
    }

    /**
     * Renders file views/index/about.html
     * 
     * @return string
     */
    public function actionAbout()
    {
        $this->fileExtension = '.html';

        return $this->render('about', [
            'title' => 'About'
        ]);
    }

    /**
     * Renders file views/index/contacts.html
     * 
     * @return string
     */
    public function actionContacts()
    {
        $this->fileExtension = '.html';

        return $this->render('contacts', [
            'title' => 'Contacts'
        ]);
    }
}
