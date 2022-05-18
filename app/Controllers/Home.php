<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('MainPage');
        echo view('master/footer');
    }
}
