<?php
class Task{
    public $id;
    public $task;
    public $member_id;

    public function __construct(){
        $this->id=0;
        $this->task="";
        $this->member_id="";

    }
    public function getTask($conn,$id){
        $sql = "SELECT * FROM `tasks` where `tasks`.`id`=".$id.";";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)){
            $this->id=$row['id'];
            $this->task=$row['task'];
            $this->member_id=$row['member_id'];
        }
        return $this;

    }
    public function getTasks($conn,$id){
        $sql = "SELECT * FROM `tasks` where `tasks`.`member_id`=".$id.";";
        // $book = new Book();
        $result = mysqli_query($conn,$sql);
        $tasks=[];
        while ($row = mysqli_fetch_assoc($result)) {
            $task = new Task();
            $task->id=$row['id'];
            $task->task=$row['task'];
            $task->member_id=$row['member_id'];
            array_push($tasks,$task);
        }
        return $tasks;

    }
    public function updateTask($conn,$task){
        $insert_query="UPDATE `tasks` SET 
        `task` = '$task'  
        WHERE `tasks`.`id` = ".$this->id.";";
        $result=mysqli_query($conn, $insert_query);
        $this->task=$task;

    }
   public function deleteTask($conn,$id){
    $delete_query="DELETE FROM `tasks` WHERE `tasks`.`id` = '".$this->id."';";
    $result=mysqli_query($conn, $delete_query);
    // if ($result== false){
    //     echo "neina trint, nes apsiskaites zmogus";
    // } else {
    //     echo "Gaila, bet ".$this->name." isstojo is skaitovu klubo.";
        $this->id=0;
        $this->task="";
        $this->member_id="";
        
    // }
}
public function setTask($conn,$task,$member_id){
    $this->task=$task;
    $this->member_id= $member_id;
    $insert_query="INSERT INTO `tasks`(`id`, `task`, `member_id`) 
    VALUES (NULL, '".$task."','".$member_id."');";
    $result=mysqli_query($conn, $insert_query);
    $this->id = $conn->insert_id;
   

    // INSERT INTO `tasks` (`id`, `task`, `member_id`) VALUES (NULL, 'Susitvarkyti kambari', '5');
}
}
?>