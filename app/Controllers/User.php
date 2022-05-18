<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TeacherModel;
use App\Models\StudentModel;
use Config\App;

class User extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('MainPage');
        echo view('master/footer');
    }

    public function Login()
    {
        $session = session();

        if (!$session->has('role')) {
            echo view('master/header');
            echo view('user/LoginView');
            echo view('master/footer');
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }


    public function LoginValidate()
    {
        $session = session();

        if (!$session->has('role')) {
            $email = $this->request->getPost('email');
            $pswd = $this->request->getPost('pswd');

            $UserModel = new UserModel();
            $data = $UserModel->SelectLoginByEmail($email, $pswd);

            if ($data->getResult()) {
                foreach ($data->getResult() as $row) {
                    if ($row->state == 0) {
                        $url = base_url('public/user/login');
                        return redirect()->to($url);
                    } else {
                        $TeacherModel = new TeacherModel();
                        $dataTeacher = $TeacherModel->SelectById($row->user_id);
                        $StudentModel = new StudentModel();
                        $dataStudent = $StudentModel->SelectById($row->user_id);
                        if ($dataTeacher->getResult())
                            $session->set('role', 1);
                        if ($dataStudent->getResult())
                            $session->set('role', 2);
                    }
                }
                $url = base_url('public/home');
                return redirect()->to($url);
            } else {
                $url = base_url('public/user/login');
                return redirect()->to($url);
            }
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }

    public function Logout()
    {
        $session = session();
        $session->remove('role');
        $url = base_url('public/');
        return redirect()->to($url);
    }

    public function ConfirmMessage()
    {
        echo view('master/header');
        echo view('user/ConfirmMessage');
        echo view('master/footer');
    }

    public function Activation($key)
    {
        //echo $key;
        $userModel =new UserModel();
        $userModel->UpdateVerified($key);
        echo view('master/header');
        echo view('user/ActivationMessage');
        echo view('master/footer');
        echo $key;
    }
}
