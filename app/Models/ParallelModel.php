<?php

namespace App\Models;

use CodeIgniter\Model;

class ParallelModel extends Model
{
    /**
     * ---
     * Select
     * ---
     * Returns the enabled parallels of a grade
     * 
     * @param int $id
     */
    public function SelectById($id)
    {
        $builder = $this->db->table('parallel');
        $builder->select("*");
        $builder->where('grade_id', $id);
        $builder->where('state', 1);
        $builder->orderBy('create_date','desc');
        $query = $builder->get();
        return $query->getResult();
    }













    
    /**
     * ---
     * Insert
     * ---
     * Insert a new grade
     * 
     * @param string $gradeName
     * @param int $teacherid
     */
    public function InsertGrade($gradeName, $teacherId)
    {
        $builder = $this->db->table('grade');
        $data = [
            'grade_name' => $gradeName,
            'teacher_id' => $teacherId,
        ];
        $query = $builder->insert($data);
        return $query;
    }

    /**
     * ---
     * Update
     * ---
     * Changes the state to 0 for a grade
     * 
     * @param int $teacherid
     */
    public function UnableGrade($gradeId)
    {
        $builder = $this->db->table('grade');
        $builder->set('state', 0);
        $builder->where('grade_id', $gradeId);
        return $builder->update();
    }

    /**
     * ---
     * Update
     * ---
     * Changes the name for a grade
     * Changes the name for a grade
     * 
     * @param int $teacherid
     */
    public function UpdateGrade($gradeId, $gradeName)
    {
        $builder = $this->db->table('grade');
        $builder->set('grade_name', $gradeName);
        $builder->where('grade_id', $gradeId);
        return $builder->update();
    }
}
