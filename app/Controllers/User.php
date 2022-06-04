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
        $MessageReport = session('messageReport');
        $data = [
            "messageReport" => $MessageReport
        ];
        if (!$session->has('role')) {
            echo view('master/header');
            echo view('user/LoginView', $data);
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
                if($session->get('role') == '1')
                {
                    $url = base_url('public/grade');
                    return redirect()->to($url);
                }
                else
                {
                    $url = base_url('public/');
                    return redirect()->to($url);
                }
                
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

    public function Activation($key)
    {
        //echo $key;
        $userModel = new UserModel();
        $userModel->UpdateVerified($key);
        $url = base_url('public/user/login');
        return redirect()->to($url)->with('messageReport','3');
    }
    public function SendMailForRecover()
    {
        $email = $this->request->getPost('Email');

        $userModel =new UserModel();
        $url = base_url('public/user/login');

        if ($userModel->EmailExists($email))
        {
            $key = $userModel->KeyConfirmation($email);

            $mail = \Config\Services::email();
            $mail->setFrom('autotestproy@gmail.com');
            $mail->setTo($email);
            $mail->setSubject('Recuperar contraseña');
            $mail->setMessage("
            <h1>Recuperacion de contraseña</h1>
            <p>Haga click en Recuperar para poder cambiar su contraseña</p>
            <br>           
            <a href='http://localhost/autotest/ProyectoTaller/public/user/recoverPassword/" . $key . "'>
            <button>Recuperar</button>
            </a>");
            $mail->send();
            return redirect()->to($url)->with('messageReport','1');
        }
        else
        {
            return redirect()->to($url)->with('messageReport','0');
        }
        
    }
    public function RecoverPassword($key)
    {
        $data = [
            "key" => $key
        ];
        echo view('master/header');
        echo view('user/RecoverPassword', $data);
        echo view('master/footer');
    }
    public function UpdatePassword()
    {
        //echo $key;
        $key = $this->request->getPost('key');
        $password = $this->request->getPost('password');
        $repeatPassword = $this->request->getPost('repeatPassword');
        $url = base_url('public/user/login');
        if($password==$repeatPassword)
        {
            $userModel =new UserModel();
            $userModel->UpdatePassword($key,$password);

            return redirect()->to($url)->with('messageReport','2');
        }
        else
        {
            echo "Nel";
        }
    }

}
