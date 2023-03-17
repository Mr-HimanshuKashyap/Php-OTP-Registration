<?php 
$conn = new mysqli("localhost", "root", "", "crud") or die("Connection Failed!");
?>

<?php
// class Database{
//     private $servername = 'localhost';
//     private $username = 'root';
//     private $password = '';
//     private $dbname = 'crud';
//     private $conn = false;
//     private $mysqli = "";
//     private $result = array();

//     function __construct()
//     {
//     if(!$this->conn){
//       $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
//        if($this->mysqli->connect_error){
//         array_push($this->result, $this->mysqli->connect_error);
//         return false;
//        }
//        else{
//         return true;
//        }
//       }
      
//     }
// }
?>

<?php
// class Model{
//         private $servername = 'localhost';
//         private $username = 'root';
//         private $password = '';
//         private $dbname = 'crud';
//         private $conn;

    
//         function __construct()
//         {
//             $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
//            if($this->conn->connect_error){
//             echo 'Connection Failed';
//            }
//            else{
//             return $this->conn;
//            }
//           }
          
//         }
?>