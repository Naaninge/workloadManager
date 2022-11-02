<!doctype html>
  <?php include 'db.php'; 

$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage:0;

$sql = "select * from lecturers limit ".$start.",".$perPage."";
$total = $db->query("select * from lecturers")->num_rows;
$pages = ceil($total / $perPage);


$rows = $db->query($sql);

  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workload|Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">  <img src="https://upload.wikimedia.org/wikipedia/en/f/fc/Polytechnic_of_Namibia_logo.png" width="30" height="30" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="hod.php">Hod </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">lecturer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student.php">students</a>
      </li>
      
    </ul>
   
  </div>
</nav>
  
<!--table-->
    <div class="container">
      <div class="row" style="margin-top: 70px;">
        <h1 style="text-align:center;">Lecturers</h1>
        <div class="col-md-10  ">
          <table class="table table-hover" style="width:100%;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Add Lecturer</button>
            
            <hr><br>
            
<div id="myModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Lecturer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php">
          <div class="form-group">
            <label>Email</label>
            <input type="email" required name="email" class="form-control">
            <label>First Name</label>
            <input type="text" required name="first-name" class="form-control">
            <label>Last Name</label>
            <input type="text" required name="last-name" class="form-control">
            <label>Experience</label>
            <input type="text" required name="experience" class="form-control">
            <label>Role</label>
            <input type="text" required name="role" class="form-control">
            <label>Mode</label>
            <input type="text" required name="mode" class="form-control">
            <label>No Students</label>
            <input type="number" required name="no-students" class="form-control">
            <label>Supervisor</label>
            <input type="text" required name="supervisor" class="form-control">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="send" value="Save changes"  class="btn btn-primary">
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
            <thead>
              <tr>
                <th scope="col">ID.</th>
                <th scope="col">Email</th>
                <th scope="col" >Name</th>
                <th scope="col" >Surname</th>
                <th scope="col">Experience</th>
                <th scope="col">Role</th>
                <th scope="col">Mode</th>
                <th scope="col" >Students</th>
                <th scope="col">Supervising</th>
                <th scope="col"></th>
                <th scope="col"></th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                
                <?php while ($row = $rows -> fetch_assoc()): ?>
                
                <th scope="row"><?php echo $row['lecID']?></th>
                <td ><?php echo $row['Email']?></td>
                <td ><?php echo $row['firstName']?></td>
                <td ><?php echo $row['lastName']?></td>
                <td ><?php echo $row['experience']?></td>
                <td ><?php echo $row['role']?></td>
                <td ><?php echo $row['mode']?></td>
                <td ><?php echo $row['noStudents']?></td>
                <td ><?php echo $row['supervising']?></td>
                <td ><a href="update.php?id=<?php echo $row['lecID'];?>" class="btn btn-success">Edit</a></td>
                <td ><a href="delete.php?id=<?php echo $row['lecID'];?>" class="btn btn-danger">Delete</a></td>
                </tr> 
                <?php endwhile; ?>
                 
             
              
            </tbody>
          </table>
          <nav aria-label="...">
          <ul class="pagination justify-content-center">
              <?php for($i =1; $i <= $pages; $i++): ?>
              <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>
              <?php endfor; ?>
             </ul>
              </nav>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>