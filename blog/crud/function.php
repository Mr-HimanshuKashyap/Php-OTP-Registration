<?php
require('conn.php');
function fetch_products(){
    global $conn;
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn,$sql);
    return $result;
    mysqli_close($conn);
}

function display_detail($id){

    global $conn;
    $sql = "SELECT * FROM products where id=$id";
    $result = mysqli_query($conn,$sql);
    return $result;
    mysqli_close($conn);
}

function update_detail(){
    global $conn;
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $color = trim($_POST['color']);
    $price = trim($_POST['price']);
    $sql = "UPDATE products set P_name='$name', P_color='$color', P_price='$price' where id='$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
    mysqli_close($conn);
}

function delete_record($deleteid){
    global $conn;
    $sql = "DELETE FROM products where id=$deleteid";
    $result = mysqli_query($conn,$sql);
    return $result;
    mysqli_close($conn);
}

function insert_record(){
    global $conn;
    $name = trim($_POST['name']);
    $color = trim($_POST['color']);
    $price = trim($_POST['price']);
    $sql = "INSERT INTO products(P_name, P_color, P_price) VALUES ('$name','$color','$price')";
    $result = mysqli_query($conn,$sql);
    return $result;
    mysqli_close($conn);
}

?>