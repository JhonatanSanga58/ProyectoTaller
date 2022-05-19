<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TeacherModel;
use CodeIgniter\Email\Email;

class Teacher extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->has('role') && $session->get('role') == '1') {
            echo view('master/header');
            echo view('MainPage');
            echo view('master/footer');
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }

    public function Register()
    {
        $session = session();

        if (!$session->has('role')) {
            echo view('master/header');
            echo view('teacher/RegisterView');
            echo view('master/footer');
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }

    public function RegisterInsert()
    {
        $session = session();

        if (!$session->has('role')) {
            $names = $this->request->getPost('names');
            $firstLastName = $this->request->getPost('firstLastName');
            $secondLastName = $this->request->getPost('secondLastName');
            $password = $this->request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');
            $email = $this->request->getPost('email');
            $photo = $this->request->getFile('photo');

            $userModel = new UserModel();
            $teacherModel = new TeacherModel();
            if (!$userModel->EmailExists($email) && ($password == $repeatPassword)) {
                $id = $userModel->SelectNext();

                $hasPhoto = 0;
                if ($photo != "") {

                    $file = $this->validate([
                        'file' => [
                            'rules' => 'uploaded[photo]'
                                . '|is_image[photo]'
                                . '|mime_in[photo,image/jpg,image/jpeg]'
                        ]
                    ]);
                    if (!$file) {
                        echo ('El archivo está dañado o no tiene el formato correcto, solo se aceptan archivos con extención .jpg');
                    } else {
                        $target_dir = '../sources/images/users/';
                        $file = $_FILES['photo']['name'];
                        $path = pathinfo($file);
                        $filename = $id;
                        $ext = $path['extension'];
                        $temp_name = $_FILES['photo']['tmp_name'];
                        $path_filename_ext = $target_dir . $filename . "." . $ext;
                        move_uploaded_file($temp_name, $path_filename_ext);

                        $hasPhoto = 1;
                    }
                }

                $number = random_int(1000000, 9999999);
                $key = md5($number);

                /*
                LOGICA PARA ENVIAR CORREO USANDO EL $key
                el correo redirigirá a /public/user/activation/daas34d7as34d5asdasd4as4d5sa6d4as
                */

                $mail = \Config\Services::email();
                $mail->setFrom('autotestproy@gmail.com');
                $mail->setTo($email);
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
                //echo $mail->printDebugger(['headers']);

                $userModel->InsertUser($id, $names, $firstLastName, $secondLastName, $email, $password, $key);
                $teacherModel->InsertTeacher($id, $hasPhoto);
            } else {
                $url = base_url('public/teacher/register');
                return redirect()->to($url);
            }

            $url = base_url('public/user/ConfirmMessage');
            return redirect()->to($url);
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
}
