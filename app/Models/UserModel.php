<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    /**
     * ---
     * Select
     * ---
     * Returns the data of the user with the given name and password
     * 
     * @param string $email
     * @param string $pswd no need to encrypt
     */
    public function SelectLoginByEmail($email, $pswd)
    {
        $builder = $this->db->table('user');
        $builder->select("*");
        $builder->where('email', $email);
        $builder->where('password', md5($pswd));
        $query = $builder->get();
        return $query;
    }
    
    /**
     * ---
     * Select
     * ---
     * Returns the next id
     */
    public function select_next()
    {
        $builder = $this->db->table('user');
        $builder->select("IFNULL(MAX(user_id) + 1, 1) AS next");
        $query = $builder->get();
        return $query;
    }

    /**
     * ---
     * Insert
     * ---
     * Insert the data of the user
     * 
     * @param int $user_id
     * @param string $user_name
     * @param string $user_first_surname
     * @param string $user_second_surname
     * @param string $email
     * @param string $password no need to encrypt
     */
    public function InsertUser($user_id, $user_name, $user_first_surname, $user_second_surname, $email, $password)
    {
        $builder = $this->db->table('user');
        $data = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_first_surname' => $user_first_surname,
            'user_second_surname' => $user_second_surname,
            'email' => $email,
            'password' => md5($password)
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
