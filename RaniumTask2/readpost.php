<!DOCTYPE html>
<html>
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
          <a class="nav-item nav-link active" href="#">Login/Signup</a>
          <a class="nav-item nav-link" href="manageblog.php">Manage Your Blog</a>
        </div>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid"  style="background-image: url('images/blog-header-1280.jpg');">
      <div class="container"  style="color:white;">
        <h1 class="display-4">This is your space</h1>
        <p class="lead">Go ahead, share your world.</p>
      </div>
    </div>

    <div class="col-8" style="float:left; margin-left:3%; margin-right:4%;" >

      <?php
        $id = $_GET["id"];
        $conn = mysqli_connect("localhost", "root", "", "ranium");
        $q1 = "select * from blog_posts where id = $id";
        $res1 = mysqli_query($conn, $q1);

        while($row = mysqli_fetch_array($res1)) {
          echo "<h1 style='font-style: italic;'>". $row["title"] ."</h1>";
          echo "<p style='color:lightgrey;'> - by ". $row["author"] ." on". $row["date"] .", in category: ". $row["category"] ."</p><br/>";
          echo "<p style='text-indent: 10%; font-size:18px;'>". $row["content"] ."</p>";
        }

      ?>
    </div>

    <div class="col-3" style="float:left;">
      <h3 style="text-align:center;"> Some Other Posts Worth Reading </h3><br/><br/>
      <?php
        $q2 = "select title, author from blog_posts order by rand() limit 5";
        $res2 = mysqli_query($conn, $q2);

        while($row = mysqli_fetch_array($res2)) {
          echo "<p>". $row["title"] ." <br/><span style='font-style: italic;'> by ". $row["author"] ."</span></p><hr/>";

        }

       ?>

    </div>



  </div>
</body>
</html>
