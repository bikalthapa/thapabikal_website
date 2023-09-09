<?php 
include "connection.php"; 
$id = $_GET['id'];
$current_topic = $_GET['topic'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bikal Thapa Personal Website</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
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
</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li>
        	<a class="nav-link active" href="portfolio.php">Portfolio</a>
        </li>
        <li class="nav-item">
        	<a class="nav-link" aria-current="page" href="blog.php">Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Turtorials</a>
          <ul class="dropdown-menu" style="max-height:250px; overflow-y:auto;">
            <?php
            $turtorials = mysqli_query($conn, "SELECT * FROM turtorial;");
            if($turtorials){
              while($row = mysqli_fetch_assoc($turtorials)){
                $tut_name = $row['tut_name'];
                $tut_id = $row['tut_id'];
            ?>
            <li>
              <a class="dropdown-item"href="turtorial.php?id=<?php echo $tut_id; ?>&topic=Introduction"><?php echo $tut_name; ?></a>
            </li>


            <?php
              }
            }


            $sql = "SELECT * FROM turtorial WHERE tut_id = $id";
            $results = mysqli_query($conn, $sql);
            if($results){
              $row = mysqli_fetch_assoc($results);
              $name = $row['tut_name'];
            }
            ?>


          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<hr>
<div class="row" style="margin-top:-16px;">
  <ul class="col col-3" style="list-style:none; overflow-y:scroll; max-height:80vh;">
    <?php
      $sql = "SELECT * FROM topic_src WHERE tut_id = $id";
      $results = mysqli_query($conn, $sql);
      if($results){
        while($row = mysqli_fetch_assoc($results)){
          $topic_name = $row['topic_name'];
    ?>
    <a href="turtorial.php?id=<?php echo $id; ?>&topic=<?php echo $topic_name; ?>">
    <li class="border border-primary" style="padding:10px; margin:0px;"><?php echo $topic_name; ?></li>
    </a>
    <?php
        }
      }
    ?>
  </ul>
  <div class="col col-9">
    <p class="display-4 text-center"><?php echo $name; ?></p>
    <p class="display-6"><?php echo $current_topic; ?></p>
    <?php
    echo file_get_contents("turtorial_files/".$tut_name."/".$current_topic.".txt");
    ?>
<div class="nav justify-content-center footer_div" style="margin-top:10px;">
  <p>Copyright @ Bikal Thapa 2023</p>
</div>
  </div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>