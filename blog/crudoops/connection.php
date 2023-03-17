<?php
class Model
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'crud';
    private $conn;
    private $tbname = 'products';


    function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            echo 'Connection Failed';
        } else {
           return $this->conn;
        }
    }
    //insert function//
    public function insert_record(){
        global $conn;
        $name = trim($_POST['name']);
        $color = trim($_POST['color']);
        $price = trim($_POST['price']);
        $sql = "INSERT INTO ".$this->tbname."(P_name, P_color, P_price) VALUES ('$name','$color','$price')";
        $result = $this->conn->query($sql);
        return $result;
        mysqli_close($conn);
    }
    //insertClose//

    //display function//
    public function fetch_products(){
        global $conn;
        $sql = "SELECT * FROM ".$this->tbname."";
        $result = $this->conn->query($sql);
        return $result;
        mysqli_close($conn);
    }
    //display close//

    //view data by id//
    public function display_detail($id){
        global $conn;
        $sql = "SELECT * FROM ".$this->tbname." where id=$id";
        $result = $this->conn->query($sql);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();
        }
        return $row;
        mysqli_close($conn);
    }
    //view data close//

    //update data by id//
    public function update_detail(){
        global $conn;
        $id = $_POST['id'];
        $name = trim($_POST['name']);
        $color = trim($_POST['color']);
        $price = trim($_POST['price']);
        $sql = "UPDATE ".$this->tbname." set P_name='$name', P_color='$color', P_price='$price' where id='$id'";
        $result = $this->conn->query($sql);
        return $result;
        mysqli_close($conn);
    }
    //update by id close//

    //delete data//
    function delete_record($deleteid){
        global $conn;
        $sql = "DELETE FROM ".$this->tbname." where id=$deleteid";
        $result = $this->conn->query($sql);
        return $result;
        mysqli_close($conn);
    }
    //delete close//

}


?>
