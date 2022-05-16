<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    /**
     * ---
     * Select
     * ---
     * Returns the data of the teacher with the id received
     * 
     * @param int $id
     */
    public function SelectById($id)
    {
        $builder = $this->db->table('teacher');
        $builder->select("*");
        $builder->where('teacher_id', $id);
        $query = $builder->get();
        return $query;
    }
    
    /**
     * ---
     * Insert
     * ---
     * Insert the data of the Teacher
     * 
     * @param int $teacher_id
     * @param int $has_photo
     */
    public function InsertTeacher($teacher_id, $has_photo)
    {
        $builder = $this->db->table('teacher');
        $data = [
            'teacher_id' => $teacher_id,
            'has_photo' => $has_photo,
        ];
        $query = $builder->insert($data);
        return $query;
    }
    
    /**
     * ---
     * Update
     * ---
     * Update the Verified state of a user to 1
     * 
     * @param int $teacher_id
     * @param int $has_photo
     */
    public function UpdateVerified($user_id)
    {
        $builder = $this->db->table('user');
        $builder->set('verified', 1);
        $builder->where('user_id', $user_id);
        return $builder->update();
    }
}
