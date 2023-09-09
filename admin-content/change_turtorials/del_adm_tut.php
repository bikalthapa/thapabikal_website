<?php
include "../../connection.php";
$id = $_GET['id'];
$select_query = "SELECT * FROM turtorial WHERE tut_id = '$id';";
$result = mysqli_query($conn, $select_query);
if($result){
  $row = mysqli_fetch_assoc($result);
  $tut_name = $row['tut_name'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bikal Thapa Personal Website</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <p class="display-6 text-center">Are You Sure !<br> Delete "<?php echo $tut_name; ?>"<br> Turtorial</p>



<div class="card text-center">
  <div class="card-body">
   <form method="post" action="">
     <input type="submit" name="delete" value="Delete" class="btn btn-danger">
     <a href="admin_turtorial.php" class="btn btn-primary btn-success">Cancel</a>
   </form>
   <?php
    if(array_key_exists('delete', $_POST)){
      $delete_query = "DELETE FROM turtorial WHERE tut_id = '$id';";
      $delete_src = " DELETE FROM topic_src WHERE tut_id = '$id';";
      $delete_src_result = mysqli_query($conn, $delete_src);
      $result = mysqli_query($conn, $delete_query);
      if($result){
        $directory = "../../turtorial_files/".$tut_name;
        $files = glob($directory.'/*');
        foreach($files as $file){// deleting each file from the directory
          if(is_file($file)) 
            unlink($file); 
        }
        rmdir($directory);// Removing directory //
        header("location:admin_turtorial.php");

      }
    }
   ?>
  </div>
</div>






<div class="nav justify-content-center footer_div" style="margin-top:10px;">
  <p>Copyright @ Bikal Thapa 2023</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>