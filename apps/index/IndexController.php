<?php

namespace justify\apps\index;

use justify\framework\core\system\Controller;
use justify\apps\index\IndexModel;
use justify\framework\modules\QE;

class IndexController extends Controller
{
    public function actionViewMainPage($args = array())
    {
        $this->render('index', [ //Variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v1.0',
            'title' => 'Justify Framework v1.0', //HTML title
        ]);
    }

    public function actionViewPageItem($args = array())
    {
        $this->render('page', [
            'title' => 'Page ' . $args[1],
            'page' => $args[1],
        ]);
    }

    public function actionAbout()
    {
        $this->render();
    }

}
