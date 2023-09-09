<?php
  include "../../connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bikal Thapa Personal Website</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../style.css">
<style>
	.bi{
		padding: 4px;
	}
	.social_media{
		padding-left: 7px;
		margin-bottom: 3px;
	}
  body{
    margin: 5px;
  }
  .github{
    width: 20%;
    display: flex;
    margin: auto;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .github input{
    width: 100%;
  }
  .double_btn{
    width: 20%;
  }
</style>
</head>
<body>
  <p class="display-5 text-center">Admin Panel</p>


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="../../index.php" target="blank">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#">Add Portolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="..\change_turtorials/admin_turtorial.php">Turtorials</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <button class="btn btn-primary double_btn" id="double_btn" current_mode="view">View Data</button><br><br>
    <form method="post" action="" id="input_field">
      <div class="github">
        <input type="text" class="form-control border-primary" name="username" placeholder="Github Username" value="bikalthapa"><br>
        <input type="text" class="form-control border-primary" name="rname" placeholder="Project Repositry Name" class="outline-primary"><br>
        <input type="text" class="form-control border-primary" name="thumb1" placeholder="Thumbnail 1"><br>
        <input type="text" class="form-control border-primary" name="thumb2" placeholder="Thumbnail 2"><br>
        <input type="text" class="form-control border-primary" name="title" placeholder="Protfolio Title"><br>
        <input type="date" class="form-control border-primary" name="date" placeholder="Date"><br>
        <input type="submit" name="submit" class="form-control btn btn-primary" value="submit">
      </div>
    </form>


<?php
if(array_key_exists('submit', $_POST)){
  $name = $_POST["username"];
  $repo_name = $_POST["rname"];
  $thumb1 = $_POST["thumb1"];
  $thumb2 = $_POST["thumb2"];
  $title = $_POST["title"];
  $date = $_POST["date"];


  $insert_query = "INSERT INTO portfolio(`user_name`, `repo_name`, `thumb_1`, `thumb_2`, `title`, `dates`) VALUES  ('$name', '$repo_name', '$thumb1', '$thumb2', '$title', '$date');";
  $result = mysqli_query($conn, $insert_query);
}
?>


<div class="overflow-auto">
<table border="2" cellspacing="0" style="width:100%; overflow:scroll; display:none;" cellpadding="10" id="output_field">
  <tr>
    <th>Id</th>
    <th>Operation</th>
    <th>Username</th>
    <th>Repositry Name</th>
    <th>file 1</th>
    <th>file 2</th>
    <th>Title</th>
    <th>Date</th>
  </tr>
  <?php
    $display_query = "SELECT * FROM portfolio ORDER BY id DESC;";
    $result = mysqli_query($conn, $display_query);
    if($result){
      while($row = mysqli_fetch_assoc($result)){
        $username = $row['user_name'];
        $repositry  = $row['repo_name'];
        $file1 = $row['thumb_1'];
        $file2 = $row['thumb_2'];
        $title = $row['title'];
        $date = $row['dates'];
        $id = $row['id'];
  ?>
<tr>
  <td><?php echo $id; ?></td>

  <td style="display:flex; flex-direction:row;">
    <a class="btn btn-primary" style="margin:3px;" href="update.php?id=<?php echo$id;?>">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>  
    </a>
    <a class="btn btn-danger" style="margin:3px;" href="delete_data.php?id=<?php echo$id;?>">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg>
    </a>
  </td>

  <td><?php echo $username; ?></td>
  <td><?php echo $repositry; ?></td>
  <td><?php echo $file1; ?></td>
  <td><?php echo $file2; ?></td>
  <td><?php echo $title; ?></td>
  <td><?php echo $date; ?></td>
</tr>
  <?php
      }
    }
  ?>
</table>
</div>

  </div>
</div>






<div class="nav justify-content-center footer_div" style="margin-top:10px;">
  <p>Copyright @ Bikal Thapa 2023</p>
</div>
<script src="../../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>