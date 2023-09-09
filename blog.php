<?php
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bikal Thapa Personal Website</title>
  <link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
        	<a class="nav-link" href="portfolio.php">Portfolio</a>
        </li>
        <li class="nav-item">
        	<a class="nav-link active" aria-current="page" href="blog.php">Blog</a>
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

<p class="display-1 text-center">Blog Comming Soon</p>

<div class="nav justify-content-center footer_div d-flex" style="margin-top:10px;">
  <p>Copyright @ Bikal Thapa 2023</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>