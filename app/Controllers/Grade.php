<?php

namespace App\Controllers;

use App\Models\GradeModel;
use App\Models\ParallelModel;
use Config\App;

class Grade extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == '1') {

            $gradeModel = new GradeModel();
            $parallelModel = new ParallelModel();

            $list = [];
            $grades = $gradeModel->SelectById($session->get('role'));
            foreach ($grades as $row) {
                $parallels = $parallelModel->SelectById($row->grade_id);
                $grade = [
                    'name' => $row->grade_name,
                    'id' => $row->grade_id,
                    'parallels' => $parallels
                ];
                array_push($list, $grade);
            }
            $data['grades'] = $list;
            echo view('master/header');
            echo view('grade/GradesView', $data);
            echo view('master/footer');
        } else {
            $url = base_url('public/');
            return redirect()->to($url);
        }
    }
}
