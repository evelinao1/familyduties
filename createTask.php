<?php

require 'connect.php';
require 'Member.php';
require 'Task.php';

$members = Member::getAllMembers($conn);
// $memberarr = [];
// foreach ($members as $member){
//     array_push($memberarr, $member->name);
// }
// print_r($memberarr);



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
        <form action="" method="post">
            <label for="task">Užduotis:</label><br>
                <textarea rows="4" cols="50" name="task">Darbas...</textarea><br>
            <label for="member_id">Atsakingas:</label><br>
            <select id="member_id" name="member_id">
                <?php foreach ($members as $member){ 
                    // print_r($member);
                 ?>
                
                <option value="<?=$member->id?>"><?php echo $member->name?></option>
            <?php }?>
            </select>
            
            <input type="Submit" name="Submit" value="Pateikti">
            
        </form> 
       
        </div>
    </div>
    </section>
    <?php include "footer.php" ?>
</body>
</html>
<?php
if(isset($_POST["Submit"])){
    // require 'connect.php';
    // require 'Member.php';
    // require 'Task.php';
    // print_r($member);
    // $member_id = "";
    // $member_id = $member->id;
    // $member = new Member();
    // $member->getMember($conn,2);
    
    $task = new Task();
    $task->setTask($conn, $_POST["task"], $_POST["member_id"]);
    header("Location: index.php");
}
?>