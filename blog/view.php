<?php
include 'connection.php';
$obj =  new Model();

    $id = $_GET['id'];
    $row = $obj->display_detail($id);
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="text-center">
            
            <h3>
                <?php echo $row['title']; ?>
            </h3>
        </div>
        <p><?php echo $row['content']; ?></p>

    <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-6">
                <form class="form-horizontal" action="endpoint.php" method="post">
                <input type="hidden" name="id" value = <?php echo $id; ?>>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Add Comment</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="comment" id="" cols="10" rows="5" required></textarea>
                        </div>
                    </div>
                    <!-- <input type="submit" name="postcomment" value="Comment" class="btn btn-primary mt-3" id=""> -->
                    <button class="btn btn-primary mt-3" name = "postcomment">Comment</button>
                    <a href="index.php" class="btn btn-default mt-3">Go Back</a>
                </form>
            </div>
    </div>

    <div class="row">
   
            <div class="col-lg-4"></div>
            <div class="col-lg-6">
                <h1>All Comments</h1>
                    <?php 
                    $com = $obj->display_comment($id);
                   if($com){
                    foreach($com as $coms){?>
                    <p><?php echo $coms['comment'] ?></p>
                    <p><b>Posted by: </b><?php echo $coms['username'] ?></p>
                    <?php } } else{echo'No Comments';}?>  
            </div>
        </div>
    
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>