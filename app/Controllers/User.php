<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TeacherModel;
use App\Models\StudentModel;

class User extends BaseController
{
    public function index()
    {
        echo view('master/header');
        echo view('main_page');
        echo view('master/footer');
    }

    public function login()
    {
        echo view('master/header');
        echo view('user/login_view');
        echo view('master/footer');
    }


    public function login_validate()
    {
        $session = session();

        if (!$session->has('role')) {
            $email = $this->request->getPost('email');
            $pswd = $this->request->getPost('pswd');

            $UserModel = new UserModel();
            $data = $UserModel->SelectLoginByEmail($email, $pswd);

            if ($data->getResult()) {
                foreach ($data->getResult() as $row) {
                    $TeacherModel = new TeacherModel();
                    $dataTeacher = $TeacherModel->SelectById($row->user_id);
                    $StudentModel = new StudentModel();
                    $dataStudent = $StudentModel->SelectById($row->user_id);
                    if ($dataTeacher->getResult())
                        $session->set('role', 1);
                    if ($dataStudent->getResult())
                        $session->set('role', 2);
                }
                $url = base_url('public/home');
                return redirect()->to($url);
            } else {
                $url = base_url('public/user/login');
                return redirect()->to($url);
            }
        } else {
            $url = base_url('public/departure');
            return redirect()->to($url);
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('role');
        $url = base_url('public/');
        return redirect()->to($url);
    }
}
