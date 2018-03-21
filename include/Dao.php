<?php 

class Dao {
    private $host = 'localhost'; 
    private $db = 'practice_helper';
    private $user = 'root';
    private $pass = '';
    
    public function getConnection() {
        return 
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
    }

    public function saveUser ($username, $password) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $q = $conn->prepare($saveQuery);
        $q->execute();
    }

    public function getUser($user) {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM users WHERE username = '$user'");
    }
}
?>