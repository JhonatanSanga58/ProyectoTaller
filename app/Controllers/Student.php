<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('student/student_register');
        echo view('master/footer');
    }
    public function register()
    {
        $session = session();

        if (!$session->has('role')) 
        {
        	echo view('master/header');
            echo view('student/student_register');
            echo view('master/footer');
        }
        else 
        {
            $url = base_url('public');
            return redirect()->to($url);
        }
    }
    public function registerModel()
    {
        echo view('master/header');
        echo view('student/student_register');
        echo view('master/footer');
    }
}