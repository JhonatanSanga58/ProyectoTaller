<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TeacherModel;
use App\Models\StudentModel;

class Teacher extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('main_page');
        echo view('master/footer');
    }
    
    public function register()
    {
        $session = session();

        if (!$session->has('role')) {
            echo view('master/header');
            echo view('teacher/register_view');
            echo view('master/footer');
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
}
