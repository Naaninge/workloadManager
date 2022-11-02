<?php 
include 'db.php';
if(isset($_POST['send'])){

    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['first-name']);
    $surname = htmlspecialchars($_POST['last-name']);
    $experience = (int)($_POST['experience']);
    $role = htmlspecialchars($_POST['role']);
    $mode = htmlspecialchars($_POST['mode']);
    $noStudents = (int)($_POST['no-students']);
    $supervisor = (int)($_POST['supervisor']);
  

    $sql= "insert into lecturers(Email,firstName,lastName,experience,role,mode,noStudents,supervising) values ('$email','$name','$surname','$experience','$role','$mode','$noStudents','$supervisor')";
    
    $val = $db->query($sql);

    if($val){
        header('location: index.php');
    }
}

?>