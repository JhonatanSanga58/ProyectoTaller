<?php

namespace App\Controllers;

use App\Models\GradeModel;
use App\Models\ParallelModel;
use App\Models\StudentModel;
use App\Models\ExamModel;
use Config\App;

class Parallel extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '1') {

            $studentModel = new StudentModel();
            $examModel = new ExamModel();

            $id = $this->request->getPost('val');
            $data['students'] = $studentModel->SelectByParallelId($id);
            $data['exams'] = $examModel->SelectByParallelId($id);
            $data['name'] = $this->request->getPost('name');
            echo view('master/header');
            echo view('parallel/ParallelStudentsView', $data);
            echo view('master/footer');
            print_r($data['exams']);
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
    //creo que no estoy usando este REVISAR :v
    public function SelectParallelExam()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '2') {

            $gradeModel = new GradeModel();
            $parallelModel = new ParallelModel();
            $examModel = new ExamModel();

            $list = [];
            $parallels = $parallelModel->SelectByStudent($session->get('id'));
            foreach ($parallels as $row) {
                $exams = $examModel->SelectByIdParallel($row->parallel_id);
                $parallels = [
                    'name' => $row->name,
                    'id' => $row->parallel_id,
                    'examen' => $exams
                ];
                array_push($list, $parallels);
            }
            $data['parallels'] = $list;
            echo view('master/header');
            echo view('student/parallelView', $data);
            echo view('master/footer');
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }

    public function UpdateParallel()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '1') {
            $parallelModel = new ParallelModel();
            $name = $this->request->getPost('name');
            $id = $this->request->getPost('val');
            $parallelModel->UpdateParallel($id, $name);
            $url = base_url('public/grade');
            return redirect()->to($url);
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }

    public function DeleteParallel()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '1') {
            $parallelModel = new ParallelModel();
            $id = $this->request->getPost('val');
            $parallelModel->UnableParallel($id);
            $url = base_url('public/grade');
            return redirect()->to($url);
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }

    public function CreateParallel()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '1') {
            $parallelModel = new ParallelModel();
            $id = $this->request->getPost('val');
            $name = $this->request->getPost('name');
            $parallelModel->InsertParallel($name, $id);
            $url = base_url('public/grade');
            return redirect()->to($url);
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
}
