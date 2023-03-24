<?php
include 'connection.php';
$obj =  new Model();
$id = 5;
$com = $obj->display_comment($id);
echo ('<pre>');
print_r($com);
die();
?>