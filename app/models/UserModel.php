<?php

class UserModel extends Database
{
    private $table = 'users';
    public $data =
        [
            "username" => "admin2",
            "email" => "admin2@admin.com",
            "password" => "123456"
            // [
            //     "username" => "admin2",
            //     "email" => "admin2@admin.com",
            //     "password" => "456456"
            // ]
        ];
    public function addUser($data)
    {
        $this->insert($this->table, $data);
        return mysqli_affected_rows($this->conn);
    }
    public function deleteUser()
    {

    }
    public function getAllUser()
    {
        $query = $this->select($this->table);
        // $query = $this->result;
        $result = $this->result($query);
        mysqli_close($this->connect());

        // return mysqli_num_rows($query);
        return $result;
    }
    public function getUserById($id)
    {
        $query = $this->select($this->table, "id = '" . $id . "'");
        $result = $this->result($query);
        mysqli_close($this->connect());

        return $result;
    }
    public function getUserByUsername($username)
    {
        $query = $this->select($this->table, "username = '" . $username . "'");
        $result = $this->result($query);
        mysqli_close($this->connect());

        return $result;
    }
}