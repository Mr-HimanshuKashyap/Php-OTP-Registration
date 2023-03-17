<?php
include 'connection.php';
$obj = new Model();
if (isset($_POST['submit'])) {
   $obj->insert_record();
   header('Location: email_verification.php');

  }

if(isset($_POST['verify_email'])){
  $obj->email_verify();
  }

if (isset($_POST['login'])) {
  $obj->login_verify();
    
    }
