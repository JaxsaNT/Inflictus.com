<?php
namespace SSFTH;
/*****       Main Crud Function       *****/
class crud
{
    protected $connection;
    
    /*****       __Constructor function       *****/
    public function __construct(\mysqli $connection) 
    {
        $this->connection = $connection;
    }
    /*****       __Constructor function       *****/
    
    /*****       Create function       *****/
    protected function create(Array $fields_and_values, $table_name)
    {
        $fields = array_keys($fields_and_values);
        $fields = implode(',', $fields);
        $values = "'" . implode("','", $fields_and_values) . "'";
        
        $sql = "INSERT INTO $table_name ($fields) VALUES ($values)";
        $this->connection->query($sql);
        return $this->connection->insert_id;
    }
    /*****       Create function       *****/
    
    /*****       Read function       *****/
    public function read($sql, $type) {
        switch ($type){
            case 'array':
                $result = $this->connection->query($sql);
                $rows = array();
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            default:
                return $result;
        }
        
    }
    /*****       Read function       *****/
    
    /*****       Update function       *****/
    protected function update($fields_and_values, $table_name, array $clause) {
        foreach ($fields_and_values as $field => $value) {
        
            $temp .= " $field = '$value',";
        }
        $temp = rtrim($temp, ',');
        $identifying_fields = array_keys($clause);
        $identifying_field = $identifying_fields[0];
        $identifying_value = $clause[$identifying_field];
        $sql = "UPDATE $table_name 
            SET 
            $temp
            WHERE $identifying_field = '$identifying_value'";
        $this->connection->query($sql);
        return $this->connection->affected_rows;
    }
    /*****       Update function       *****/
    
    /*****       Delete function       *****/
    protected function delete($table_name, $id_field, $id_value, $id_field1, $id_value1)
    {
        if($id_field1 == null or $id_value1 == null){
            echo $sql = "DELETE FROM $table_name WHERE $id_field = '$id_value'";
        }else if($id_field1 !== null && $id_value1 !== null){
            echo $sql = "DELETE FROM $table_name WHERE $id_field = '$id_value' AND $id_field1 = '$id_value1'";
        }
        return $this->connection->query($sql);
    }
    /*****       Delete function       *****/
}