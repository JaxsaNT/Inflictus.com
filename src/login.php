<?php
namespace SSFTH;

class login {
    private $username;
    private $password;
    private $steamID;
    private $ip;
    protected $connection;
    
    function __construct(\mysqli $connection, $table_name) {
        $this->connection = $connection;
        $this->table_name = $table_name;
    }
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getSteamID() {
        return $this->steamID;
    }

    function getIp() {
        return $this->ip;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    function setSteamID($steamID) {
        $this->steamID = $steamID;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }

    public function login(){
        $sql = "SELECT `id`, `username`, `password` FROM `$this->table_name` WHERE `username` = '$this->username'";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_object();
            if (password_verify($this->password, $row->password)){
                $_SESSION["inflictus_loggedin"] = TRUE;
                $_SESSION["inflictus_username"] = $row->username;
                $_SESSION["inflictus_roleID"] = $row->roleID;
                $_SESSION["inflictus_userID"] = $row->id;
            } else {
                return 'Wrong Password or Username';
            }
        } else {
            return "Wrong Password or Username";
        }
    }
    public function create(){
        $fields_and_values = array(
            'username' => $this->username,
            'password' => $this->password,
            'steamID' => $this->steamID,
            'ip' => $this->ip
        );
            $fields = array_keys($fields_and_values);
            $fields = implode(',', $fields);
            $this->connection->real_escape_string($fields);
            $values = "'" . implode("','", $fields_and_values) . "'";

            $sql = "INSERT INTO $this->table_name ($fields) VALUES ($values)";
            $this->connection->query($sql);
    }
    
}
