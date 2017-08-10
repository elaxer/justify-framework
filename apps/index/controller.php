<?php

class IndexController extends Controller
{
    public function actionViewMainPage()
    {
        render('index', array());
        return true;
    }
}
