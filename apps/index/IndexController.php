<?php

namespace justify\apps\index;

use Justify;
use justify\framework\system\Controller;
use justify\apps\index\IndexModel;

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
     * @param array $matches Unneccecary. Stores matches which returns function
     * preg_match in file framework/App.php
     * @access public
     * @return string
     */
    public function actionPageItem($matches = [])
    {
        //dump($matches)

        return $this->render('page', [
            'title' => 'Page ' . $matches[1],
            'page' => $matches[1],
        ]);
    }

    /**
     * Renders file views/index/about.php
     * 
     * Constant ACTION stores current action name
     * 
     * @return string
     */
    public function actionAbout()
    {
        return $this->render(ACTION, [
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
