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

    public function actionViewPageItem($args = [])
    {
        $this->render('page', [
            'title' => 'Page ' . $args[1],
            'page' => $args[1],
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
