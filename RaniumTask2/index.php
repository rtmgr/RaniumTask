<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title> Public Blog </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
  <link rel="stylesheet" href="css/style.css"  type="text/css"/>



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
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Login/Signup</a>
          <a class="nav-item nav-link" href="manageblog.php">Manage Your Blog</a>
        </div>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid"  style="background-image: url('images/blog-header-1280.jpg');">
      <div class="container" style="color:white;">
        <h1 class="display-4">This is your space</h1>
        <p class="lead">Go ahead, share your world.</p>
      </div>
    </div>

    <?php
      $conn = mysqli_connect("localhost", "root", "", "ranium");
      $q = "select * from blog_posts order by id desc";
      $res = mysqli_query($conn, $q);
    ?>

    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action list-group-item-primary"><h3>Recent Blogs</h3></a>

      <?php

      $colorchanger = "light"; //default column color value
      $alternator = 1; // variable to alternate the column colors
      while ($row = mysqli_fetch_array($res)) {

      echo '<p href="#" class="list-group-item list-group-item-action list-group-item-',$colorchanger,' ">
        <b><a class="notextdecor" href="readpost.php?id=',$row["id"],' "> '.$row["title"].'</a></b>
        <span style="color:purple;"> - by '.$row["author"].' on '.$row["date"].'</span><br/>'. $row["intro"].'...</p>';

        $alternator++; //changing it's value to change the column color
        if ($alternator % 2 == 0 )
          $colorchanger = "secondary";
        else $colorchanger = "light";

      } ?>


<!--
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a> -->

    </div>
  </div>
</body>
</html>
