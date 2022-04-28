<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('main_page');
        echo view('master/footer');
    }
}
