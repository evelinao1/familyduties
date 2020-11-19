
<?php 
session_start();

if(isset($_POST['updateTask'])){
    require 'connect.php';
    require 'Member.php';
    require 'Task.php';
    $task = new Task();
    $task->getTask($conn,$_POST['updateTask']);
    // $p=$book->person_id;
    $id=$task->id;
    $_SESSION['task_id']=$id;
    // $_SESSION['person_id']=$p;
    
}
if(isset($_POST["submit"])){
    require 'connect.php';
    require 'Member.php';
    require 'Task.php';
    $task = new Task();
    $task->getTask($conn,$_SESSION['task_id']);
  
    $task->updateTask($conn,$_POST["task"]);
    
    $id=$task->member_id;
    header("Location: showTasks.php?show=".$id."");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalėdos</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php include "header.php" ?>
    <section class="container">
    <div class="row">
        <div class="col-lg-3 col-3 col-md-3">
        </div>
        <div class="col-lg-9 col-9 col-md-9">

    <?php echo '<form action="" method="post">
    <label for="task">Darbas:</label>
    <input type="text"  name="task" value="'.$task->task.'">
    <input type="hidden" name="submit" value="'.$task->id.'">
    <button type="submit">Patobulinti</button></form>';?></td>
  

    </div>
    </div>
    </section>
    <?php include "footer.php" ?>
</body>
</html>
<?php 
    ?>