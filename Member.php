<?php
class Member{
    public $id;
    public $name;
    public $bdate;
    public $tasks;

    public function __construct(){
        $this->id=0;
        $this->name="";
        $this->bdate="";
        $this->tasks=[];
    }

    public function getMember($conn,$id){
        $sql = "SELECT * FROM `members` where `members`.`id`=".$id.";";
        $result = mysqli_query($conn,$sql);
       while ($row = mysqli_fetch_assoc($result)){
           $this->id=$row['id'];
           $this->name=$row['name'];
           $this->bdate=$row['bdate'];
           $this->tasks = Task::getTasks($conn,$this->id);
       } return $this;
}
public function getAllMembers($conn){
    $sql = "SELECT * FROM `members`;";
    $result = mysqli_query($conn,$sql);
    $members= [];
    while ($row = mysqli_fetch_assoc($result)){
        $member = new Member();
        $member->id=$row['id'];
        $member->name=$row['name'];
        $member->tasks = Task::getTasks($conn,$member->id);
        array_push($members, $member);
    }return $members;
}

}

?>