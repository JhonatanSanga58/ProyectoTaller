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
            $data['id'] = $id;

            echo view('master/header');
            echo view('exam/Scores', $data);
            echo view('master/footer');
            echo $data['name'];
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
    public function UpdateScore()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '1') {
            $examModel = new ExamModel();

            $idEst = $this->request->getPost('valEst');
            $idExam = $this->request->getPost('valExam');
            $score = $this->request->getPost('score');
            $feedback = $this->request->getPost('feedback');
            $examModel->UpdateScore($idEst, $idExam, $score, $feedback);
echo 'est:'.$idEst.'-score:'.$score.'-exam:'.$idExam.'-feed:'.$feedback;
            $url = base_url('public/grade');
            return redirect()->to($url);
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
}
