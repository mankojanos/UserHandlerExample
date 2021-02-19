<?php
define ('HOST', 'localhost');
define ('USER_NAME', 'root');
define ('PASSWORD', '');
define ('DB_NAME', 'userProject');

class Database {
    private $conn;

    public function __construct {
            $this->db_connect();
    }

    private function db_connect() {
        $this->conn = mysqli_connect(HOST, USER_NAME, PASSWORD, DB_NAME);
        if (mysqli_connect_error()) {
            die('connection error: ' . mysqli_connect_error());
        }
    }

    public function queri($sql) {
            $result = $this->conn->query($sql);
            if(!$result) {
                die('query failed');
            }
            return $result;
    }

    public function fetch_array($result) {
        if($result->num_rows > 0) {
            $resultArray = [];
            while($record = $result->fetch_assoc()) {
                $resultArray[] = $record;
            }
            return $resultArray;
        }
    }

    public function fetch_record($result) {
        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    public function data_clear($value) {
        return $this->conn->real_escape_string($value);
    }

    public function close_connect() {
        $this->conn->close();
    }
}

$databes = new Database();