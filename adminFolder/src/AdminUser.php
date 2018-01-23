<?php
namespace Normann;
    class adminUser extends crud {
    private $table_name = '';
    private $id_field = 'id';
    private $id;
    private $email; 
    private $username;
    private $password;
    private $name;
    private $lastname;
    private $roleID;
    
    /*****       __Constructor function       *****/
    public function __construct($connection, $table_name) {
        parent::__construct($connection);
        $this->table_name = $table_name;
    }
    /*****       __Constructor function       *****/
    
    /*****       Getter & Setters       *****/
    
    function getTable_name() {
        return $this->table_name;
    }

    function getId_field() {
        return $this->id_field;
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getName() {
        return $this->name;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getRoleID() {
        return $this->roleID;
    }

    function setTable_name($table_name) {
        $this->table_name = $table_name;
    }

    function setId_field($id_field) {
        $this->id_field = $id_field;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setRoleID($roleID) {
        $this->roleID = $roleID;
    }

        
    /*****       Getter & Setters       *****/
    
    /*****       Create function       *****/
    public function create(array $fields_and_values = null, $table_name = null)
    {
        $fields_and_values = array(
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'roleID' => $this->roleID
        );
        return parent::create($fields_and_values, $this->table_name);
    }
    /*****       Create function       *****/
    
    /*****       Update function       *****/
    public function update($fields_and_values = null, $table_name = null, array $clause = null)
    {
        $fields_and_values = array(
            'roleID' => $this->roleID
        );
        $clause = array('id' => $this->id);
        return parent::update($fields_and_values, $this->table_name, $clause);
    }
    /*****       Update function       *****/
    
    /*****       Delete function       *****/
    public function delete($table_name = null, $id_field = null, $id_value = null) 
    {
        return parent::delete($this->table_name, $this->id_field, $this->id);
    }
    /*****       Delete function       *****/
    
}
