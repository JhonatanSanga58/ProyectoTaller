<?php

namespace App\Controllers;

use App\Models\ExamModel;
use Config\App;

class Exam extends BaseController
{
    public function index()
    {
    }

    public function Scores()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '1') {
            $examModel = new ExamModel();

            $id = $this->request->getPost('val');
            $data['name'] = $this->request->getPost('name');
            $data['scores'] = $examModel->SelectScores($id);

            echo view('master/header');
            echo view('exam/Scores', $data);
            echo view('master/footer');
            echo $data['name'];
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
}
