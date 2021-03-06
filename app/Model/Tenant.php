<?php

require_once 'Connection.php';
class Tenant
{

    protected $conn;
    protected $connection;

    public function __construct() {
        $conn = new Connection();
        $this->connection = $conn->openConnection();
    }

    public function getAllTenants() {
    
        $sql = "SELECT * FROM Tenants";
        $results = $this->connection->query($sql);
        return $results;
    }


    public function insertTenant($id, $pname, $phonenum) {
        //$int = (int)$id;
        $sql = "INSERT INTO Tenants (TenantID, PhoneNum, Name) VALUES (NULL, '$phonenum', '$pname')";
        if ($this->connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }

        $results = $this->getAllTenants();
        return $results;
    }

   public function updateTenant($name, $phone, $id) {
       
       // UPDATE sql string
       $sql = "UPDATE Tenants SET Name='$name', PhoneNum='$phone' WHERE TenantID='$id'";

       if ($this->connection->query($sql) === TRUE) {
        echo "Tenant updated successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
        
        $results = $this->getAllTenants();
        return $results; 
    }

    public function deleteTenant($field, $val) {
        $sql = "DELETE FROM Tenants WHERE $field='$val'";
 
        if ($this->connection->query($sql) === TRUE) {
         echo "Tenant deleted successfully";
         }
         
         $results = $this->getAllTenants();
         return $results;
     }
}