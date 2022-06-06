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
        $builder->orderBy('create_date', 'asc');
        $query = $builder->get();
        return $query->getResult();
    }
    /**
     * ---
     * Select
     * ---
     * Returns parallel that has the code
     * 
     * @param int $code
     */
    public function SelectByCode($code)
    {
        $builder = $this->db->table('parallel');
        $builder->select("*");
        $builder->where('code', $code);
        $builder->where('state', 1);
        $builder->orderBy('create_date', 'asc');
        $query = $builder->get();
        return $query;
    }

    /**
     * ---
     * Insert
     * ---
     * Insert a new parallel into a grade and search a unique code
     * 
     * @param string $name
     * @param int $gradeId
     */
    public function InsertParallel($name, $gradeId)
    {
        $builder = $this->db->table('parallel');

        $number = random_int(1000000000, 9999999999);
        $found = false;
        while ($this->HasCode($number)) {
            $number = random_int(1000000000, 9999999999);
        }
        $data = [
            'name' => $name,
            'grade_id' => $gradeId,
            'code' => $number
        ];
        $query = $builder->insert($data);
        return $query;
    }

    /**
     * ---
     * Select
     * ---
     * Returns false if a parallel has the code
     * 
     * @param int $code
     */
    public function HasCode($code)
    {
        $builder = $this->db->table('parallel');
        $builder->select("*");
        $builder->where('code', $code);
        $query = $builder->get();
        return $query->getResult();
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
