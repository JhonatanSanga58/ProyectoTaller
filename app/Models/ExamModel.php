<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
    /**
     * ---
     * Select
     * ---
     * Returns the enabled exams to which a student belongs
     * 
     * @param int $id
     */
    public function SelectByIdParallel($id)
    {
        $builder = $this->db->table('exam_score ES');
        $builder->select("ES.score, ES.feedback,E.exam_name, ES.student_id, ES.exam_id");
        $builder->join("exam E","E.exam_id=ES.exam_id","RIGHT");
        //$builder->join("exam_score ES","E.exam.id=ES.exam_id","INNER");
        $builder->where('E.parallel_id', $id);
        //$builder->where('ES.state', 1);
        $builder->orderBy('E.create_date','desc');
        $query = $builder->get();
        return $query->getResult();
    }
         
    /**
     * ---
     * Select
     * ---
     * Returns the score of an exam
     * 
     * @param int $id
     */
    public function SelectScores($id)
    {
        $builder = $this->db->table('exam_score ES');
        $builder->select("ES.score,ES.feedback, U.user_id, CONCAT(U.user_first_surname,' ',IFNULL(U.user_second_surname,''),' ',U.user_name) AS name");
        $builder->join("user U", "U.user_id = ES.student_id", "INNER");
        $builder->where('exam_id', $id);
        $query = $builder->get();
        return $query->getResult();
    }
}
