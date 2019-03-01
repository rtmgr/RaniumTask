<!DOCTYPE html>
<html>

<!-- starting session -->
<?php
session_start();
?>

<head>
  <meta charset="utf-8"/>
  <title> Public Blog </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>


  <style>
    .container-fluid {
      background-color: lightblue;
    }
    #home {
      text-align:center; color: purple;
      font-weight: bold;

    }
    .notextdecor {
      text-decoration: none;
    }

  </style>
</head>

<body>
  <div class="container-fluid">
    <br/>
    <h1 id="home" style="font-family: 'Noto Serif', serif; font-weight:bold; font-style:italic; "> Blogging For Everyone </h1> <br/>  <!-- header -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" id="home">Welcome</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"    aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Login/Signup</a>
          <a class="nav-item nav-link active" href="manageblog.php">Manage Your Blog</a>
        </div>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid" style="background-image: url('images/blog-header-1280.jpg');">
      <div class="container"  style="color:white;" >
        <h1 class="display-4">This is your space</h1>
        <p class="lead">Go ahead, share your world.</p>
      </div>
    </div>

    <div class="hero" style="background-color: white;">

      <?php
      if (isset($name))
        echo  "<h2 style='text-align:center;'> Good to see you again, ".  $name ."</h2><br/><br/>";

      ?>
      <div class="col-7" style='margin-left:2%; margin-right: 4%; float:left;'>
        <span style="font-weight:bold; font-size:18px;" > Your posts: </span>
        <span style="float:right;"><button type="button" class="btn btn-primary" >Write a new post</button></span><br/><br/>

        <ul class="list-group">
        <?php
          $conn = mysqli_connect("localhost", "root", "", "ranium");
          $q1 = "select * from blog_posts";
          $res1 = mysqli_query($conn, $q1);

          while ($row = mysqli_fetch_array($res1)) {
            echo "<li class='list-group-item'><a class='notextdecor' href='readpost.php?id=",$row["id"]," '>". $row["title"] ." </a> <a class='btn btn-outline-danger' href='' style='float:right;'>Delete</a> &emsp;&emsp;<a class='btn btn-outline-info' style='float:right; margin-right:2%;'>Edit</a> </li>";

          }

          ?>

        </ul>
      </div>

      <div class="col-4" style="float:left;">
        <span style="font-weight:bold; font-size:18px;" > Category overview: </span><br/><br/>

        <ul class="list-group">
        <?php
          $conn = mysqli_connect("localhost", "root", "", "ranium");
          $q1 = "select category from blog_posts where 1";
          $res1 = mysqli_query($conn, $q1);

          while ($row = mysqli_fetch_array($res1)) {
            echo "<li class='list-group-item'><a class='notextdecor' href='readpost.php?id=",$row["category"]," '>". $row["title"] ." </a> <button type='button' class='btn btn-outline-danger btn-sm' style='float:right;'>Delete</button> &emsp;&emsp;<button type='button' class='btn btn-outline-info btn-sm' style='float:right; margin-right:2%;'>Edit</button> </li>";

          }

          ?>

        </ul>
      </div>




    </div>
