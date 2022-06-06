<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
    /**
     * ---
     * Select
     * ---
     * Returns the exams of a parallel
     * 
     * @param int $id
     */
    public function SelectByParallelId($id)
    {
        $builder = $this->db->table('exam');
        $builder->select("*");
        $builder->where('parallel_id', $id);
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
