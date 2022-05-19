<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\StudentModel;
use CodeIgniter\Email\Email;

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
        $Message = session('message');
        if (!$session->has('role')) 
        {
            $data = [
                "message" => $Message
            ];
        	echo view('master/header');
            echo view('student/RegisterView', $data);
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
        $session = session();

        if (!$session->has('role'))
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

            if (!$UserModel->EmailExists($Email))
            {
                $UserId = $UserModel->SelectNext();
                
                $number = random_int(1000000, 9999999);
                $key = md5($number);

                $UserModel->InsertUser($UserId, $Names, $FirstLastSurame, $SecondLastSurname, $Email, $Password, $key);
                $Response = $StudentModel->InsertStudent($UserId, $NickName);
                if ($Response > 0 )
                {
                    /*LOGICA PARA ENVIAR CORREO USANDO EL $key
                    el correo redirigirá a /public/user/activation/daas34d7as34d5asdasd4as4d5sa6d4as
                    */
    
                    $mail = \Config\Services::email();
                    $mail->setFrom('autotestproy@gmail.com');
                    $mail->setTo($Email);
                    $mail->setSubject('Activación de correo');
                    $mail->setMessage("
                    <h1>Gracias por registrarse en Autotest</h1>
                    <p>haga click en Activar para poder usar su cuenta</p>
                    <br>           
                    <a href='http://localhost/autotest/ProyectoTaller/public/user/activation/" . $key . "'>
                    <button>Activar</button>
                    </a>");
                    /*if (mail('tanjhosan58@gmail.com', 'sub', 'mensaje', 'autotestproy@gmail.com'))
                        echo "si";
                    else
                        echo "no";*/
                    $mail->send();
                    $url = base_url('public/student/register');
                    return redirect()->to($url)->with('message','1');
                }
                else
                {
                    $url = base_url('public/student/register');
                    return redirect()->to($url)->with('message','0');
                }
            }
            else
            {
                $url = base_url('public/student/register');
                return redirect()->to($url)->with('message','2');
            }

            
        }
        else
        {
            $url = base_url('public/');
            return redirect()->to($url);
        }
        
    } 
}