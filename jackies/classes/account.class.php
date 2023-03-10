<?php

require_once 'database.php';

class Account{

    public $id;
    public $username;
    public $email;
    public $password;
    public $user_type;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //customer login
    function sign_in(){
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }

    //admin login
    function sign_in_admin(){
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password AND user_type != 'cust';";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }

    //forgot password
    function get_account_info($id=0){
        if($id == 0){
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password;";
            $query=$this->db->connect()->prepare($sql);
            $query->bindParam(':email', $this->email);
            $query->bindParam(':password', $this->password);
        }else{
            $sql = "SELECT * FROM account WHERE id = :id;";
            $query=$this->db->connect()->prepare($sql);
            $query->bindParam(':id', $id);
        }
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function sign_add(){
        $sql = "INSERT INTO users (username, email, password, user_type) VALUES 
        (:username, :email, :password, :user_type);";
    
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':user_type', $this->user_type);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }
}

?>