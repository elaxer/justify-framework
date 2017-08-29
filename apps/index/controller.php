<?php
require_once 'model.php';

class IndexController extends Base\Controller
{
    public function actionViewMainPage($args = array())
    {
        render('index', [ //variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v0.1g',
            'title' => 'Justify Framework v0.1g', // HTML title
        ]);
    }

    public function actionViewPageItem($args = array())
    {
        render('page', [
            'title' => 'Page',
            'page' => $args[1],
        ]);
    }

}
