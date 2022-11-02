<?php 
include 'db.php';
if(isset($_POST['send'])){

    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['first-name']);
    $surname = htmlspecialchars($_POST['last-name']);
    $role = htmlspecialchars($_POST['role']);
    $faculty= (int)($_POST['faculty']);
   
  

    $sql= "insert into hod(email,firstName,lastName,role,facID) values ('$email','$name','$surname','$role','$faculty')";
    
    $val = $db->query($sql);

    if($val){
        header('location: hod.php');
    }
}

?>