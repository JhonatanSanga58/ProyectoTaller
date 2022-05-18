<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\StudentModel;

class Student extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('student/RegisterView');
        echo view('master/footer');
    }
    public function register()
    {
        $session = session();

        if (!$session->has('role')) 
        {
        	echo view('master/header');
            echo view('student/RegisterView');
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
        $Names = $this->request->getPost('Names');
        $FirstLastSurame = $this->request->getPost('FirstLastSurame');
        $SecondLastSurname = $this->request->getPost('SecondLastSurname');
        $Email = $this->request->getPost('Email');
        $Password = $this->request->getPost('Password');

        //Student date
        $NickName = $this->request->getPost('NickName');

        $StudentModel = new StudentModel();

        $UserModel = new UserModel();

        $UserId = $UserModel->SelectNext();
        $number = random_int(1000000, 9999999);
        $key = md5($number);

        $UserModel->InsertUser($UserId, $Names, $FirstLastSurame, $SecondLastSurname, $Email, $Password, $key);
        $StudentModel->InsertStudent($UserId, $NickName);
        $url = base_url('public/');
        return redirect()->to($url,1);
    } 
}