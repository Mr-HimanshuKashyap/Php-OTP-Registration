<?php
include 'connection.php';
$obj = new Model();

if(isset($_GET['id'])){
    $id = $_GET['id'];
  $res= $obj->display_detail($id);
}
?>

<div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">
        <?php echo $res['id'];?>
    </h5>
    <h5 class="card-title">
        <?php echo $res['P_name'];?>
    </h5>
    <h5 class="card-title">
        <?php echo $res['P_color'];?>
    </h5>
    <h5 class="card-title">
        <?php echo $res['P_price'];?>
    </h5>
    
  </div>
</div>