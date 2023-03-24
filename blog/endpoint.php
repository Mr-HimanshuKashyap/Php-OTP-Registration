<?php
include 'connection.php';
$obj = new Model();
if (isset($_POST['submit'])) {
   $obj->insert_record();
  }

if(isset($_POST['verify_email'])){
  $obj->email_verify();
  }

if (isset($_POST['login'])) {
  $obj->login_verify();
  }

if (isset($_POST['blog_send'])) {
  $obj->blog_post();       
  }

// if (isset($_POST['view'])) {
//     $obj->display_detail($id);       
//     }
if (isset($_POST['postcomment'])) {
    $obj->insert_comment();
}

  ?>
