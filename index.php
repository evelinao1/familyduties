<?php
require 'connect.php';
require 'Member.php';
require 'Task.php';

// $member = new Member();
// $member->getMember($conn,2);
// print_r($member);

// $task = new task();
// $task->getTask($conn,2);
// print_r($task);

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
            <a href="createTask.php">Paskirti naują užduotį</a>
        </div>
        <div class="col-lg-4 col-4 col-md-4">
        </div>
    </div>   
    <div class="row">
        <div class="col-lg-3 col-3 col-md-3">
        </div>
        <div class="col-lg-9 col-9 col-md-9">
        <table>
            <tr>
                <th>Vardas</th>
                <th>Liko atlikti darbų</th>
                <th>Peržiūrėti darbus</th>
            </tr>
                    <?php 
                        $members = Member::getAllMembers($conn);
                        foreach ($members as $key => $member) {?>
            <tr>
                <td><?php echo $member->name?></td>

                    <?php 
                    $tasks = Task::getTasks($conn,$member->id);
                    $count = count($tasks); 

                    ?>
                <td><?php echo $count?></td>
                <td><?php echo '<form action="showTasks.php" method="get">
                <input type="hidden" name="show" value="'.$member->id.'">
                <button type="submit">Peržiūrėti</button></form>';?></td>
            </tr>
          <?php  }?>
        </table>

        </div>
    </div>
    </section>
    <?php include "footer.php" ?>
</body>
</html>


<!-- <script>
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 5,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script> -->
