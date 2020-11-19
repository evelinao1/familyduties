<?php
session_start();
if(isset($_GET['show'])){
    require 'connect.php';
    require 'Member.php';
    require 'Task.php';
    $member = new Member();
    $member->getMember($conn,$_GET['show']);
    $name=$member->name;
    $id=$member->id;
    // $_SESSION['name']=$name;
    $_SESSION['id']=$id;
//   echo $name;
 }
//  echo $member->id;

if(isset($_POST['done'])){
    // require 'connect.php';
    // require 'Member.php';
    // require 'Task.php';
    $task = new Task();
    $task->getTask($conn,$_POST['done']);
    $task->deleteTask($conn,$_POST['done']);
    
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
        <div class="col-lg-4 col-4 col-md-4">
        </div>
        <div class="col-lg-4 col-4 col-md-4">
            <a href="index.php">Grįžti į šeimos užduotis</a>
        </div>
        <div class="col-lg-4 col-4 col-md-4">
        </div>
    </div>   
    <div class="row">
        <div class="col-lg-3 col-3 col-md-3">
        </div>
        <div class="col-lg-9 col-9 col-md-9">
<?php echo '<h1>'.$member->name.'</h1>';?>
<table>
  <tr>
    <th>Darbas</th>
    <th>Darbas atliktas</th>
    <th>Keisti/atnaujinti darbą</th>
  </tr>

  <?php 
    $tasks = Task::getTasks($conn,$member->id);
    foreach ($tasks as $key => $task) {
  ?>
  <tr>
    <td><?php echo $task->task?></td> 
    <td><?php echo '<form action="" method="post">
   <input type="hidden" name="done" value="'.$task->id.'">
   <button type="submit">Atlikta</button></form>';?></td>
   <td><?php echo '<form action="updateTask.php" method="post">
   <input type="hidden" name="updateTask" value="'.$task->id.'">
   <button type="submit">Patobulinti</button></form>';?></td>
  </tr>
  <?php } ?>
</table> 
</div>
    </div>
    </section>
    <?php include "footer.php" ?>
</body>
</html>
<?php

?>