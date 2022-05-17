<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('student_register');
        echo view('master/footer');
    }
    public function register()
    {
    	
    }
}