<?php

namespace apps\index;

use framework\core\system\Controller;
use apps\index\IndexModel;
use Debug;
use QE;

class IndexController extends Controller
{
    public function actionViewMainPage($args = array())
    {
        IndexModel::version();
         $this->render('index', [ //variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v0.1g',
            'title' => 'Justify Framework v0.1g', // HTML title
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
