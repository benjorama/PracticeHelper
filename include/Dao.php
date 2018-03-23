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

    //save a user to users table
    public function saveUser ($name, $password) {
        $conn = $this->getConnection();
        $query = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $query->bindParam(':username', $name);
        $query->bindParam(':password', $password);
        $query->execute();
     }

    //returns all users from users table. 
    public function getUsers() {
        $conn = $this->getConnection();
        $query = $conn->prepare("select * from users");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    //returns true if username is present in the user table.
    public function userExists($username){
        $conn = $this->getConnection();
        $query = $conn->prepare("select username from users where username = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        
        foreach ($query as $row) {
            if ($username == $row['username']) {
                return true;
            }
        }
        return false;
    }

    //return a user password.
    public function getPassword($username) {
        $conn = $this->getConnection();
        $query = $conn->prepare("select password from users where username = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        $results = $query->fetchColumn(0);
        return $results;
    }

    //save user session;
    public function save_session($name, $message) {
        $conn = $this->getConnection();
        $query = $conn->prepare("INSERT INTO entries (username, start_time, message)
                                    VALUES (:username, NOW(), :message)");
        $query->bindParam(':username', $name);
        $query->bindParam(':message', $message);
        $query->execute();
    }

    //return all sessions by user. 
    public function get_sessions($name) {
        $conn = $this->getConnection();
        $query = $conn->prepare("select * from entries where username=:name");
        $query->bindParam(':name', $name);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }
}
?>