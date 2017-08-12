<?php

class IndexController extends Controller
{
    public function actionViewMainPage()
    {
        render('index', [
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v0.1b'
        ]);
        return true;
    }
}
