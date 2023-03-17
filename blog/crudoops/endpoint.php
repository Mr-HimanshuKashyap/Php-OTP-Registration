<?php
include 'connection.php';
$obj = new Model();
if (isset($_POST['submit'])) {
   $obj->insert_record();
   header('Location: index.php');

  }

if (isset($_POST['update'])) {
    $obj->update_detail();
    header('Location: index.php');

}


?>