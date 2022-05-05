<?php
    class Registro{
        // Connection
        private $conn;
        // Table
        private $db_table = "registros";
        // Columns
        public $id;
        public $first_name;
        public $last_name;
        public $email;
        public $gender;
        public $ip_address;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getRegistros(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createRegistro(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        first_name = :first_name, 
                        last_name = :last_name, 
                        email = :email, 
                        gender = :gender, 
                        ip_address = :ip_address";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->gender=htmlspecialchars(strip_tags($this->gender));
            $this->ip_address=htmlspecialchars(strip_tags($this->ip_address));
            
        
            // bind data
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":ip_address", $this->ip_address);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleRegistro(){
            $sqlQuery = "SELECT
                        id, 
                        first_name, 
                        last_name, 
                        email, 
                        gender, 
                        ip_address
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->first_name = $dataRow['first_name'];
            $this->last_name = $dataRow['last_name'];
            $this->email = $dataRow['email'];
            $this->gender = $dataRow['gender'];
            $this->ip_address = $dataRow['ip_address'];
        }        
        // UPDATE
        public function updateRegistro(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    first_name = :first_name, 
                    last_name = :last_name, 
                    email = :email, 
                    gender = :gender, 
                    ip_address = :ip_address
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->gender=htmlspecialchars(strip_tags($this->gender));
            $this->ip_address=htmlspecialchars(strip_tags($this->ip_address));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":ip_address", $this->ip_address);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteRegistro(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>