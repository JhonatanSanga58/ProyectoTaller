<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    /**
     * ---
     * Select
     * ---
     * Returns the data of the student with the id received
     * 
     * @param int $id
     */
    public function SelectById($id)
    {
        $builder = $this->db->table('student');
        $builder->select("*");
        $builder->where('student_id', $id);
        $query = $builder->get();
        return $query;
    }

    /**
     * ---
     * Insert
     * ---
     * Insert the data of the Student
     * 
     * @param int $student_id
     * @param string $nick_name
     */
    public function InsertStudent($student_id, $nick_name)
    {
        $builder = $this->db->table('student');
        $data = [
            'student_id' => $student_id,
            'nick_name' => $nick_name,
        ];
        $query = $builder->insert($data);
        return $query;
    }
    public function InsertStudentParallel($studentId, $parallelId)
    {
        $builder = $this->db->table('student_parallel');
        $data = [
            'student_id' => $studentId,
            'parallel_id' => $parallelId,
        ];
        $query = $builder->insert($data);
        return $query;
    }

    /**
     * ---
     * Select
     * ---
     * Returns the parallel students
     * 
     * @param int $id
     */
    public function SelectByParallelId($id)
    {
        $builder = $this->db->table('student_parallel SP');
        $builder->select("U.user_id, CONCAT(U.user_first_surname,' ',IFNULL(U.user_second_surname,''),' ',U.user_name) AS name");
        $builder->join("user U", "U.user_id=SP.student_id", "inner");
        $builder->where('SP.parallel_id', $id);
        $query = $builder->get();
        return $query->getResult();
    }
}
