<!doctype html>
  <?php include 'db.php'; 
  $id =(int) $_GET['id'];

$sql = "select * from lecturers where lecID='$id'";
$rows = $db->query($sql);

$row = $rows -> fetch_assoc();
if(isset($_POST['send'])){


    $email = htmlspecialchars($_POST['email']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $experience = (int)($_POST['experience']);
    $role = htmlspecialchars($_POST['role']);
    $mode = htmlspecialchars($_POST['mode']);
    $noStudents = (int)($_POST['noStudents']);
    $supervising =(int) ($_POST['supervisor']);
    
    $sql2 = "update  lecturers set Email= '$email', firstName = '$firstName',lastName='$lastName',experience='$experience',role='$role',mode='$mode',noStudents='$noStudents',supervising='$supervising' where lecID = '$id'";
    $db->query($sql2);

header('location: index.php');
}

  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workload|Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row" style="margin-top: 70px;">
        <h1 style="text-align:center;">Update Lecturers</h1>
        <div class="col-md-10 col-md-offset-1">
          
           
            <hr><br>
            

        <form method="post" >
          <div class="form-group">
            <label>Email</label>
            <input type="email" required name="email" class="form-control" value="<?php echo $row['Email'];?>">
            <label>First Name</label>
            <input type="text" required name="firstName" class="form-control" value="<?php echo $row['firstName'];?>">
            <label>Last Name</label>
            <input type="text" required name="lastName" class="form-control" value="<?php echo $row['lastName'];?>">
            <label>Experience</label>
            <input type="text" required name="experience" class="form-control" value="<?php echo $row['experience'];?>">
            <label>Role</label>
            <input type="text" required name="role" class="form-control" value="<?php echo $row['role'];?>">
            <label>Mode</label>
            <input type="text" required name="mode" class="form-control" value="<?php echo $row['mode'];?>">
            <label>No Students</label>
            <input type="number" required name="noStudents" class="form-control" value="<?php echo $row['noStudents'];?>">
            <label>Supervisor</label>
            <input type="text" required name="supervisor" class="form-control" value="<?php echo $row['supervising'];?>">
          </div>
          <div class="modal-footer mt-2" >
        <a  class="btn btn-secondary"  href="index.php">Close</a>
        <input type="submit" name="send" value="Save changes"  class="btn btn-primary mx-2 ">
      </div>
        </form>
      
      
    </div>
  
</div>
            
        
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>