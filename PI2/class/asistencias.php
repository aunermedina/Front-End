<?php
    class Asistencia{
        // Connection
        private $conn;
        // Table
        private $db_table = "Asistencia";
        // Columns
        public $id;
        public $user;
        public $fecha;
        public $hora;
        public $concept;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getAsistencias(){
            $sqlQuery = "SELECT id, 
            user, 
            fecha, 
            hora, 
            concept
            FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createAsistencia(){
            $sqlQuery = "INSERT INTO ". $this->db_table . 
                    "SET
                        user = :user, 
                        fecha = :fecha, 
                        hora = :hora, 
                        concept = :concept";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->user=htmlspecialchars(strip_tags($this->user));
            $this->fecha=htmlspecialchars(strip_tags($this->fecha));
            $this->hora=htmlspecialchars(strip_tags($this->hora));
            $this->concept=htmlspecialchars(strip_tags($this->concept));            
        
            // bind data
            $stmt->bindParam(":user", $this->user);
            $stmt->bindParam(":fecha", $this->fecha);
            $stmt->bindParam(":hora", $this->hora);
            $stmt->bindParam(":concept", $this->concept);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleAsistencia(){
            $sqlQuery = "SELECT
                        id, 
                        user, 
                        fecha, 
                        hora, 
                        concept
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->user = $dataRow['user'];
            $this->fecha = $dataRow['fecha'];
            $this->hora = $dataRow['hora'];
            $this->concept = $dataRow['concept'];
        }        
        // UPDATE
        public function updateAsistencia(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    user = :user, 
                    fecha = :fecha, 
                    hora = :hora, 
                    concept = :concept
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->user=htmlspecialchars(strip_tags($this->user));
            $this->fecha=htmlspecialchars(strip_tags($this->fecha));
            $this->hora=htmlspecialchars(strip_tags($this->hora));
            $this->concept=htmlspecialchars(strip_tags($this->concept));
        
            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":user", $this->user);
            $stmt->bindParam(":fecha", $this->fecha);
            $stmt->bindParam(":hora", $this->hora);
            $stmt->bindParam(":concept", $this->concept);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteAsistencia(){
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
