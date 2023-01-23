<?php

class Database
{
    private $conn;
    
    public function connect()
    {
        $host = DB_HOST;
        $user = DB_USER;
        $pass = DB_PASS;
        $db = DB_NAME;
        $conn = mysqli_connect($host, $user, $pass, $db);

        return $conn;
    }

    public function __construct()
    {
        $this->conn = $this->connect();
        if(!$this->conn)
        {
            die("Unable to Connect database: " . mysqli_connect_error());
        }
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
}