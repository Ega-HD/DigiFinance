<?php

class Database
{
    protected $conn;
    
    public function __construct()
    {
        $this->conn = $this->connect();
        if(!$this->conn)
        {
            // echo "Berhasil konek ke database";
            die("Unable to Connect database: " . mysqli_connect_error());
        }
        // else 
        // {
        //     echo "Gagal koneksi";
        // }
    }
    public function connect()
    {
        $host = DB_HOST;
        $user = DB_USER;
        $pass = DB_PASS;
        $db = DB_NAME;
        $conn = mysqli_connect($host, $user, $pass, $db);
        
        return $conn;
    }
    public function insert($table, $data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        
        $sql = "INSERT INTO $table 
                (username, email, password)
                VALUES 
                ('$username','$email','$password')";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }
    public function select($table, $where='')
    {
        if($where != '')
        {
            $where = ' where ' . $where;
        }

        $sql = "SELECT * FROM   " . $table . $where;
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        
        return $result;
    }
    public function result($query)
    {
        if(mysqli_num_rows($query) > 0)
        {
            // fetch all records
            if(mysqli_num_rows($query) > 1)
            {
                while($row = mysqli_fetch_assoc($query))
                {
                    $result[] = $row;
                }
            }
            // fetch single record
            else
            {
                $result = mysqli_fetch_assoc($query);
            }
        } 
        // else die(mysqli_error($query));
        
        return $result;
    }
}