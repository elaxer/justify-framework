<?php

namespace justify\apps\index;

use justify\framework\core\system\Controller;
use justify\apps\index\IndexModel;
use justify\framework\modules\QE;

class IndexController extends Controller
{
    public function actionViewMainPage($args = array())
    {
         $this->render('index', [ //variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v0.1g',
            'title' => 'Justify Framework v0.1g', //HTML title
        ]);
    }

    public function actionViewPageItem($args = array())
    {
        $this->render('page', [
            'title' => 'Page ' . $args[1],
            'page' => $args[1],
        ]);
    }

}
