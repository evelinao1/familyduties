<?php
$severName = "localhost";
$username = "root";
$password = "";
$db = "familyduties";

$conn = new mysqli($severName,$username,$password,$db);

if ($conn->connect_error){
    die(`nepavyko prisijungti: $conn->connect_error`);
}
// echo "Huston, im in!<br>";
// while ($row = mysqli_fetch)
?>