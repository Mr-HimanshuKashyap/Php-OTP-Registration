<?php
require('function.php');
//update//
if (isset($_POST['update'])) {
    $res = update_detail();
    header('Location: index.php');
    return $res;
}
//Insert//
if (isset($_POST['submit'])) {
    $res = insert_record();
    header('Location: index.php');
    return $res;
  }

  



?>