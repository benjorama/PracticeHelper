<?php 
mysql://:@/?reconnect=true
class Dao {
    private $host = 'us-cdbr-iron-east-05.cleardb.net'; 
    private $db = 'heroku_1eb096f091c2554';
    private $user = 'ba6088760b9110';
    private $pass = '7a33c204';
    
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
    public function save_session($name, $message, $start_time) {
        $conn = $this->getConnection();
        $query = $conn->prepare("INSERT INTO entries (username, start_time, message)
                                    VALUES (:username, :start_time, :message)");
        $query->bindParam(':username', $name);
        $query->bindParam(':message', $message);
        $query->bindParam(':start_time', $start_time);
        $query->execute();
    }

    //save session stop time
    public function save_stop_time($start_time) {
        $stop_time = date("Y-m-d H:i:s");
        $conn = $this->getConnection();
        $query = $conn->prepare("UPDATE entries SET stop_time=timediff(:stop_time, :start_time) WHERE start_time=:start_time");
        $query->bindParam(':start_time', $start_time);
        $query->bindParam(':stop_time', $stop_time);
        $query->execute();
    }

    //return all sessions by user.  Most resent posts first.
    public function get_sessions($name) {
        $conn = $this->getConnection();
        $query = $conn->prepare("select * from entries where username=:name order by start_time desc");
        $query->bindParam(':name', $name);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }
}
?>