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
        $builder->orderBy('create_date','asc');
        $query = $builder->get();
        return $query->getResult();
    }

    /**
     * ---
     * Insert
     * ---
     * Insert a new parallel into a grade
     * 
     * @param string $name
     * @param int $gradeId
     */
    public function InsertParallel($name, $gradeId)
    {
        $builder = $this->db->table('parallel');
        $data = [
            'name' => $name,
            'grade_id' => $gradeId,
        ];
        $query = $builder->insert($data);
        return $query;
    }

    /**
     * ---
     * Update
     * ---
     * Changes the state to 0 for a parallel
     * 
     * @param int $parallelid
     */
    public function UnableParallel($parallelId)
    {
        $builder = $this->db->table('parallel');
        $builder->set('state', 0);
        $builder->where('parallel_id', $parallelId);
        return $builder->update();
    }

    /**
     * ---
     * Update
     * ---
     * Changes the name for a Parallel
     * Changes the name for a Parallel
     * 
     * @param int $id
     * @param string $name
     */
    public function UpdateParallel($id, $name)
    {
        $builder = $this->db->table('parallel');
        $builder->set('name', $name);
        $builder->where('parallel_id', $id);
        return $builder->update();
    }
}
