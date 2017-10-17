<?php

namespace justify\apps\index;

use Justify;
use justify\framework\system\Controller;
use justify\apps\index\IndexModel;

class IndexController extends Controller
{
    public function actionViewMainPage()
    {
        $this->render('index', [ //Variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v' . Justify::getVersion(),
            'title' => 'Justify Framework v' . Justify::getVersion(), //HTML title
        ]);
    }

    //Array $matches stores matches which returns function
    //preg_match in file /framework/App.php
    public function actionViewPageItem($matches = [])
    {
        $this->render('page', [
            'title' => 'Page ' . $matches[1],
            'page' => $matches[1],
        ]);
    }

    public function actionAbout()
    {
        //Renders file "about.php"
        $this->render(ACTION, [
            'title' => 'about'
        ]);
    }

    public function actionContacts()
    {
        $this->render('contacts', [
            'title' => 'Contacts'
        ]);
    }

}
