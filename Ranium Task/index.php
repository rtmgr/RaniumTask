<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Asteroid Neo Web App </title>
  <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <div class="container" >
      <br/>
      <h1 id="home"> Asteroid Neo Web App </h1> <br/>  <!-- header -->
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

      <div class="hero-unit" align=center > <!-- banner -->
          <h2>Asteroid - Neo Stats from NASA </h2>

          <p>Neo stands for Near Earth Objects. Nasa provides data on Asteroids based on their closest approach date to Earth. </p>
      </div>

      <div id="neo" class="span12" align=center>
        <h3> Select/enter start and end date to view the Neo Stats for that date range. </h3><br/>

        <!-- creating a form to get input from user -->
        <form action="#requestapi" method="post">
          <input name="startDate" id="startDate" placeholder="Start date" type="date" required="required" />
          <input name="endDate" id="endDate" placeholder="Start date" type="date" required="required" /> <br/>
          <input class="btn btn-info" type="submit" id="fetch" value="Fetch"> <br/>

        </form>
      </div>

    <div class="row" clear=all align=center style="margin-top: 5%; margin-left:15%;">
      <div id="requestapi" class="span8" align=center >

        <?php
          if ((isset($_POST["startDate"])) && (isset($_POST["endDate"])))
          {
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];

            $startDateObj = new DateTime($startDate);
            $endDateObj = new DateTime($endDate);

            $interval = $endDateObj->diff($startDateObj);
            $diff = $interval->d;

            if ((strtotime($endDate) > strtotime($startDate)) && $diff <= 7)
            {

            // Initialise cURL session
            $ch = curl_init("https://api.nasa.gov/neo/rest/v1/feed?start_date=".$startDate."&end_date=".$endDate."&api_key=NfFYciWgxRM4gWcEG1fXVQ4UC4YqJ0WJZWv7tAC9");

            // Set option for cURL transfer
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Perform cURL session
            $data = curl_exec($ch);

            // Get info about request
            $info = curl_getinfo($ch);

            //Close cURL session
            curl_close($ch);

            //decoding the JSON data recd from cURL request into an associative array
            $decoded = json_decode($data, true);


                //section to store all the days in the date range in an array ($daysArray)

                        $intervalNew= new DateInterval('P1D'); // 1 Day

                        // append $endDateObj using DateTime method 'modify' to include the endDate
                        $endDateObj = $endDateObj->modify('+1 day');
                        $dateRange = new DatePeriod($startDateObj, $intervalNew, $endDateObj);

                        $format = "Y-m-d";
                        $daysArray = [];
                        foreach ($dateRange as $date)
                        {
                            $daysArray[] = $date->format($format); // this is the data for the x-axis of our chart
                        }


                // section to find the number of asteroids each day
                        $asteroidCountList = [];
                        $i = 0;
                        foreach ($decoded['near_earth_objects'] as $date => $neos) {
                              $asteroidCountList[] = count($neos);
                        }
                        ksort($asteroidCountList); // this is the data for the y-axis of our chart


                // section to find the fastest asteroid in km/h
                        $fastestAsteroidsList = [];
                        foreach ($decoded['near_earth_objects'] as $date => $neos) {
                            foreach ($neos as $value) {
                                $fastestAsteroidsList[$value['name']] = $value['close_approach_data'][0]['relative_velocity']['kilometers_per_hour'];
                            }
                        }
                        natsort($fastestAsteroidsList); // sorting the array in increasing order of relative velocity
                        $velocityFastestAsteroid = end($fastestAsteroidsList); // retrieving last element in the ascending order array(highest value)
                        $nameFastestAsteroid = key(array_slice($fastestAsteroidsList, -1, true)); //retrieving name of asteroid contained in key


                // section to find the closest asteroid
                        $closestAsteroidsList = [];
                        foreach ($decoded['near_earth_objects'] as $date => $neos) {
                            foreach ($neos as $value) {
                                $closestAsteroidsList[$value['name']] = $value['close_approach_data'][0]['miss_distance']['kilometers'];
                            }
                        }
                        natsort($closestAsteroidsList); // sorting the array in increasing order of "miss distance"
                        $distClosestAsteroid = current($closestAsteroidsList); // retrieving first element in the ascending order array(lowest value)
                        $nameClosestAsteroid = key(array_slice($closestAsteroidsList, 0, true)); //retrieving name of asteroid contained in key


                // section to find the average size of asteroids in kms
                        $sizeAsteroidsList = [];
                        foreach ($decoded['near_earth_objects'] as $date => $neos) {
                            foreach ($neos as $value) {
                                $sizeAsteroidsList[] = ( $value['estimated_diameter']['kilometers']['estimated_diameter_min']
                                                            +  $value['estimated_diameter']['kilometers']['estimated_diameter_max'] )/2 ; // average of min and max diameter to get average of one asteroid
                            }
                        }
                        $avgSize = array_sum($sizeAsteroidsList)/count($sizeAsteroidsList); //calculating average of size of all asteroids


            $chartLabels = json_encode($daysArray);
            $chartData = json_encode($asteroidCountList);

        ?>

          <div class="span8" align=center> -->

            <canvas id="myChart" width="500" height="300"></canvas>

              <script>
                      var ctx = document.getElementById('myChart').getContext('2d');
                      var chart = new Chart(ctx,
                        {
                          // The type of chart we want to create
                          type: 'line',

                          // The data for our dataset
                          data:
                          {
                              labels: <?php echo $chartLabels; ?>, // data for x-axis (Dates)
                              datasets:
                              [{
                                  label: "NEO Stats",
                                  backgroundColor: 'rgb(255, 99, 132)',
                                  borderColor: 'rgb(255, 99, 132)',
                                  data: <?php echo  $chartData; ?> // data for y-axis (No. of asteroids)
                              }]
                          },

                          // Configuration options go here
                          options: {}
                      });
              </script>

        </div>
      </div>



            <div class="row"  style="margin-top:5%; text-align:center;">
              <div class="hero-unit">
                <div class="card" >
                  <h2 class="card-header">A FEW OTHER STATS</h2>
                  <div class="card-body" style="text-align:left;">

                    <h3 class="card-title"><br/>Fastest Asteroid (in km/h):</h3>
                    <p class="card-text">Name:  <?php echo $nameFastestAsteroid  ?> <br/>
                                         Relative Velocity: <?php echo $velocityFastestAsteroid ?> km/h</p>

                      <h3 class="card-title">Closest Asteroid:</h3>
                      <p class="card-text"> Name: <?php echo $nameClosestAsteroid ?> <br/>
                                            Distance from Earth: <?php echo $distClosestAsteroid ?> kms

                        <h3 class="card-text">Average Size of Asteroids (in kms): </h3> <p> <?php echo $avgSize ?> kms</p>

                  </div>
                </div>
              </div>
            </div>


          <?php
            }
            else // error msg
            {
              echo '<div class="alert alert-danger" ,"span8" role="alert"> End Date should be newer than Start Date and not more than 7 days after Start Date. Please try again. </div>';
            }
        }
          ?>


    </div>


  </body>
</html>
