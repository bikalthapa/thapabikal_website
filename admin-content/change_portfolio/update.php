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
  <link rel="stylesheet" type="text/css" href="../style.css">
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
  .update_operation{
    width: 100%;
    display: flex;
    flex-direction: row;
  }
  .update_operation a{
    margin: 3px;
    min-width: 48%;
  }
</style>
</head>
<body>
  <p class="display-5 text-center">Update Data</p>


        <?php
          $id = $_GET['id'];
          $select_query = "SELECT * FROM portfolio WHERE id = $id;";
          $result = mysqli_query($conn, $select_query);
          if($result){
            $row = mysqli_fetch_assoc($result);
            $username = $row['user_name'];
            $repo_name = $row['repo_name'];
            $thumb_1 = $row['thumb_1'];
            $thumb_2 = $row['thumb_2'];
            $title = $row['title'];
            $date = $row['dates'];
          }
        ?>
<div class="card text-center">
  <div class="card-body">
    <form method="post" action="" id="input_field">
      <div class="github">
        Username<input type="text" name="username" placeholder="Github Username" value="<?php echo $username; ?>"><br>
        Repositry<input type="text" name="rname" placeholder="Project Repositry Name" value="<?php echo $repo_name; ?>" class="outline-primary"><br>
        Thumbnail 1<input type="text" name="thumb1" placeholder="Thumbnail 1" value="<?php echo $thumb_1; ?>"><br>
        Thumbnail 2<input type="text" name="thumb2" placeholder="Thumbnail 2" value="<?php echo $thumb_2; ?>"><br>
        Title<input type="text" name="title" placeholder="Protfolio Title" value="<?php echo $title; ?>"><br>
        Date<input type="date" name="date" placeholder="Date" value="<?php echo $date; ?>"><br>
        <div class="update_operation">
        <input class="btn btn-primary" type="submit" name="save" value="Save">
        <a class="btn btn-primary" href="admin.php">Cancel</a>
        </div>
      </div>
    </form>
    <?php
      if(array_key_exists('save', $_POST)){
        $username = $_POST['username'];
        $repo_name = $_POST['rname'];
        $thumb_1 = $_POST['thumb1'];
        $thumb_2 = $_POST['thumb2'];
        $title = $_POST['title'];
        $date = $_POST['date'];

        $update_query = "UPDATE `portfolio` SET `user_name` = '$username', `repo_name` = '$repo_name', `thumb_1` = '$thumb_1', `thumb_2` = '$thumb_2', `title` = '$title', `dates` = '$date' WHERE `id` = '$id';";
        $result = mysqli_query($conn, $update_query);
        if($result){
          header("location:admin.php");
        }
      }
    ?>
  </div>
</div>






<div class="nav justify-content-center footer_div" style="margin-top:10px;">
  <p>Copyright @ Bikal Thapa 2023</p>
</div>
<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>