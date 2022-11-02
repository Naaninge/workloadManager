<?php 
include 'db.php';

$id = (int)$_GET['id'];
$sql = "delete from lecturers where lecID = '$id' ";

$val = $db->query($sql);

if($val){

    header('location: index.php');
};

    

?>