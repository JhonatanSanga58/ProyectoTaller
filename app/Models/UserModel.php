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
     * @param string $user
     * @param string $pswd no need to encrypt
     */
    public function SelectLoginByName($user, $pswd)
    {
        $builder = $this->db->table('user');
        $builder->select("*");
        $builder->where('user_name', $user);
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
}
