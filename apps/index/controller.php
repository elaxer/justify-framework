<?php

class IndexController extends Controller
{
    public function actionViewMainPage($args = array())
    {
    	//use key 'title' for HTML title
        render('index', [ //variables
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v0.1g',
            'title' => 'Justify Framework v0.1g',
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
