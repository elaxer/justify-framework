<?php

class IndexController extends Controller
{
    public function actionViewMainPage()
    {
    	//use 'title' key for HTML title
        render('index', [
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v0.1g',
            'title' => 'Welcome!',
        ]);
    }
}
