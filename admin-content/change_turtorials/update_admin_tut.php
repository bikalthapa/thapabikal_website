<?php
include "../../connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update | thapabikal</title>
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
<?php
  $id = $_GET['id'];
  $select_query = "SELECT * FROM turtorial WHERE tut_id = $id;";
  $result = mysqli_query($conn, $select_query);
  if($result){
    $row = mysqli_fetch_assoc($result);
    $tut_name = $row['tut_name'];
  }
?>
  <p class="display-6 text-center"><?php echo $tut_name; ?></p>

    <div class="row" style="margin-top:-16px;">
  <ul class="col col-3" style="list-style:none; overflow-y:scroll; max-height:83vh;">

    <?php
      $sql = "SELECT topic_src.topic_id, turtorial.tut_name, topic_src.topic_name FROM topic_src INNER JOIN turtorial ON topic_src.tut_id = turtorial.tut_id WHERE topic_src.tut_id = $id;";
      $results = mysqli_query($conn, $sql);
      if($results){
        while($row = mysqli_fetch_assoc($results)){
          $topic_name = $row['topic_name'];
    ?>

    <li class="border border-primary" style="padding:10px; margin:0px;"><?php echo $topic_name; ?></li>
    <?php
        }
      }
    ?>
    <li class="border border-primary" style="padding:10px; margin:0px;">.</li>
  </ul>
<div class="content col col-9">
  
  <div class="nav justify-content-center footer_div" style="margin-top:10px;">
    <p>Copyright @ Bikal Thapa 2023</p>
  </div>
</div> 
</div>



<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>