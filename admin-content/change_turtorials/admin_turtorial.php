<?php
  include "..\..\connection.php";
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
    width: 17%;
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
        <a class="nav-link" href="../change_portfolio/admin.php">Add Portolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true">Turtorials</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <button class="btn btn-primary double_btn" id="double_btn" current_mode="view">View Data</button><br><br>
    <form method="post" action="" id="input_field">
      <div class="github">
          <select name="select" style="width:85%;" class="form-control border-primary" onchange="tut_type()" id="tut_option">
            <option>Turtorial Existance</option>
            <option value="existing">Already Exists</option>
            <option value="new">New Turtorial</option>
          </select><br>

        <form>
        <div style="background-color:white; width:85%;" id="existing_turtorial">
          <select name="select_presence_tut"style="width:100%;" class="form-control border-primary">
            <?php
              $turtorials = mysqli_query($conn, "SELECT * FROM turtorial ORDER BY tut_id DESC;");
              if($turtorials){
                while($row = mysqli_fetch_assoc($turtorials)){
                  $tut_name = $row['tut_name'];
                  $tut_id = $row['tut_id'];
            ?>
            <option value="<?php echo $tut_id; ?>"><?php echo $tut_name; ?></option>
            <?php
                }
              }
            ?>
          </select><br>
          <input type="text" required name="topic_name" class="form-control border-primary" placeholder="Topic Name"><br>
          <input type="submit" required name="old_tut_submit" value="Submit" class="btn btn-primary">
        </div>
      </form>

        <div style="background-color:white; display:none;" id="new_window">
            <form method="post">
              <input class="form-control border-primary" type="text" name="tut_name" placeholder="Turtorial Name"><br>
              <input type="submit" name="new_tut_submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
      </div>
    </form>

<?php
// This block will insert topic name in existing turtorial
  if(array_key_exists('old_tut_submit', $_POST)){
    $tut_id = $_POST['select_presence_tut'];
    $topic_name = $_POST['topic_name'];

    // Query to find whether input topic name is present or not
    $sql = "SELECT * FROM topic_src WHERE topic_id = '$tut_id' AND topic_name = '$topic_name';";
    $search_result = mysqli_query($conn, $sql);
    if($search_result){
      $row = mysqli_fetch_assoc($search_result);
      if(mysqli_num_rows($search_result)<1){
        // Getting the name of turtorial
        $get_tut_name = "SELECT * FROM turtorial WHERE tut_id = '$tut_id';";
        $tut_get_query = mysqli_query($conn, $get_tut_name);
        $row = mysqli_fetch_assoc($tut_get_query);
        // Creating new file in a directory
        $directory = "../../turtorial_files/".$row['tut_name']."/";
        fopen($directory.$topic_name.".txt","w");
        $topic_ins_query = "INSERT INTO topic_src (topic_name, tut_id) VALUES ('$topic_name','$tut_id');";
        $results = mysqli_query($conn, $topic_ins_query);
        header("admin_turtorial.php");
      }
    }
  }

  //This block will insert name of new turtorial //
  if(array_key_exists('new_tut_submit', $_POST)){
      $tut_name = $_POST['tut_name'];
      $search_query = "SELECT * FROM turtorial WHERE tut_name = '$tut_name'";
      $search_result = mysqli_query($conn, $search_query);
   if($search_result){   
      $row = mysqli_fetch_assoc($search_result);
      if(!empty($tut_name) && mysqli_num_rows($search_result)<1){// Adding turtorial to the database if it is new and it contains something//
         $add_tut = "INSERT INTO `turtorial` (tut_name) VALUES ('$tut_name');";
         $results = mysqli_query($conn, $add_tut);
         mkdir("../../turtorial_files/".$tut_name);
      }else if(empty($tut_name)){// Display alert message if turtorial name is not provided
         echo "<script>alert('Please enter a turtorial name')</script>";
      }else if($row['tut_name']== $tut_name){// Displaying alert message if turtorial already exists //
         echo "<script>alert('Turtorial Already Exists ')</script>";
      }
   }
  }
?>
<div class="overflow-auto">
<table border="2" cellspacing="0" style="width:100%; overflow:scroll; display:none;" cellpadding="10" id="output_field">
  <tr>
    <th>Id</th>
    <th>Operation</th>
    <th>Tut Name</th>
  </tr>
  <?php
  $tut_get_query = "SELECT * FROM turtorial ORDER BY tut_id DESC;";
  $results = mysqli_query($conn, $tut_get_query);
  // Fetching row from the turtorial table //
  if($results){
   while($row = mysqli_fetch_assoc($results)){
      $topic_name = $row['tut_name'];
      $tut_id = $row['tut_id'];
  ?>
<tr>
  <td><?php echo $tut_id; ?></td>

  <td style="display:flex; flex-direction:row; justify-content:center;">
    <a class="btn btn-primary" style="margin:3px;" href="update_admin_tut.php?id=<?php echo $tut_id; ?>">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>  
    </a>
    <a class="btn btn-danger" style="margin:3px;" href="del_adm_tut.php?id=<?php echo $tut_id; ?>">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg>
    </a>
  </td>
  <td><?php echo $topic_name; ?></td>
</tr>
  <?php
}};
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