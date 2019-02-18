<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Asteroid Neo Web App </title>
  <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
  <script src="https://cdnjs.com/libraries/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

<body>
  <div class="container"> <!-- header -->
    <br/>
    <h1 id="home"> Asteroid Neo Web App </h1> <br/>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
            <li class="active"><a href="#home">Home</a></li>
            <li><a href="#neo">View Neo Stats</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="hero-unit"> <!-- banner -->
        <h2>Asteroid - Neo Stats from NASA </h2>

        <p>Neo stands for Near Earth Objects. Nasa provides data on Asteroids based on their closest approach date to Earth. </p>
    </div>

    <div id="neo" class="span12">
      <h3> Select/enter start and end date to view the Neo Stats for that date range. </h3><br/>

      <!-- creating a form to get input from user -->
      <form action="#requestapi" method="post">
        <input name="startDate" id="startDate" placeholder="Start date" type="date" required="required" />
        <input name="endDate" id="endDate" placeholder="Start date" type="date" required="required" /> <br/>
        <input class="btn btn-info" type="submit" id="fetch" value="Fetch">
      </form>
    </div>

    <div id="requestapi" class="span12">

      <?php
        if ((isset($_POST["startDate"])) && (isset($_POST["endDate"])))
        {
          $startDate = $_POST["startDate"];
          $endDate = $_POST["endDate"];

// Initialise cURL session
          $ch = curl_init("https://api.nasa.gov/neo/rest/v1/feed?start_date=,'$startDate',&end_date=,'$endDate',&api_key=NfFYciWgxRM4gWcEG1fXVQ4UC4YqJ0WJZWv7tAC9");

// Set option for cURL transfer
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Perform cURL session
          $data = curl_exec($ch);

// Get info about request
          $info = curl_getinfo($ch);

//Close cURL session
          curl_close($ch);
        }
      ?>

      <script>
        var myLineChart = new Chart(ctx, { type: 'line', data: data, options: options });
      </script>


    </div>

  </div>


</body>
</html>
