<?php

namespace App\Controllers;

use Core\Justify;

class IndexController extends Controller
{
    public function index()
    {
        return render('index', [
            'frameworkName' => 'Justify Framework',
            'frameworkVersion' => 'v' . Justify::getVersion()
        ]);
    }
}
