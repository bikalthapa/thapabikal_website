<?php include "connection.php"; ?>
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
            <li><a class="dropdown-item" href="turtorial.php?id=<?php echo $tut_id; ?>&topic=Introduction"><?php echo $tut_name; ?></a></li>
            <?php
              }
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
<p class="display-6 text-center">My Portfolio</p>








<div class="row">
<?php

$sql = "SELECT * FROM portfolio ORDER BY id DESC;";
$result = mysqli_query($conn, $sql);

if($result){
  while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $name = $row['user_name'];
    $repo_name = $row['repo_name'];
    $thumb1 = $row['thumb_1'];
    $thumb2 = $row['thumb_2'];
    $date = $row['dates'];
    $title = $row['title'];
  ?>
  <div class="col-sm-3 mb-3 mb-sm-0">
<div class="shadow-lg card" style="width: 18rem; margin-bottom:1rem;">
    <div id="carouselExampleAutoplaying<?php echo$id; ?>" class="carousel slide" data-bs-ride="carousel" style="min-height:155px;">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://raw.githubusercontent.com/<?php echo $name; ?>/thapabikal_database/main/<?php echo $thumb1; ?>" class="d-block w-100" alt="Can't load Image">
          </div>
          <div class="carousel-item">
            <img src="https://raw.githubusercontent.com/<?php echo $name; ?>/thapabikal_database/main/<?php echo $thumb2; ?>" class="d-block w-100" alt="Can't Load Image">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying<?php echo$id;?>" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying<?php echo$id;?>" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $title; ?></h5>
    <div class="conatiner" style="display:flex; flex-direction:row;">
    <p class="card-text"><small class="text-body-secondary"><?php echo $date; ?></small></p>
         <div class="likes" style="position: absolute; right:5%; top:67%; display:flex; flex-direction:row;">
         <p style="margin:5px;">1.2K</p>
         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
           <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
         </svg>
       </div>
    </div>

    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <a href="https://<?php echo $name; ?>.github.io/<?php echo $repo_name; ?>" target="blank" class="btn btn-primary" style="width:100%;">Result</a>
      </div>
      <div class="col-sm-6">
        <a href="https://github.com/<?php echo $name; ?>/<?php echo $repo_name; ?>" target="blank" class="btn btn-primary" style="width:100%;">Code</a>
      </div>
    </div>
  </div>
</div>
</div>
  <?php
  }
}

?>
</div>

<div class="nav justify-content-center footer_div" style="margin-top:10px;">
  <p>Copyright @ Bikal Thapa 2023</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>