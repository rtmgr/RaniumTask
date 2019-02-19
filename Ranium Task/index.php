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

    <div class="row">
      <div id="requestapi" class="span8" >

        <?php
          if ((isset($_POST["startDate"])) && (isset($_POST["endDate"])))
          {
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];

            // Initialise cURL session
            $ch = curl_init("https://api.nasa.gov/neo/rest/v1/neo/3542519?start_date=".$startDate."&end_date=".$endDate."&api_key=NfFYciWgxRM4gWcEG1fXVQ4UC4YqJ0WJZWv7tAC9");

            // Set option for cURL transfer
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Perform cURL session
            $data = curl_exec($ch);
            echo $data;

            // Get info about request
            $info = curl_getinfo($ch);

            //Close cURL session
            curl_close($ch);

          }
        ?>
      </div>
    </div>

    <div class="row">
      <div class="span8">
        <canvas id="myChart"></canvas>

        <script>

        function thenplotChart(response)
        {
        	var labels=[], data=[];	// arrays for storing x & y axes data

          $.each(response.close_approach_data, function(key,val)
          {
           	var startDt = document.getElementById("startDate").value;
            var endDt = document.getElementById("endDate").value;

            if( (new Date(startDt).getTime() < new Date(val.close_approach_date)) && (new Date(val.close_approach_date) < new Date(endDt).getTime()))
            {
                labels.push(val.close_approach_date);	// found this from console
                data.push(val.miss_distance.kilometers); // found this from console
            }

          });


          var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx,
            {
              // The type of chart we want to create
              type: 'line',

              // The data for our dataset
              data:
              {
                  labels: labels,
                  datasets:
                  [{
                      label: "Neo Stats",
                      backgroundColor: 'rgb(255, 99, 132)',
                      borderColor: 'rgb(255, 99, 132)',
                      data: data
                  }]
              },

              // Configuration options go here
              options: {}
          });
        }


        var response = JSON.parse($("#requestapi").text().trim());


        $(document).ready(function() // to ensure page is ready before code execution
        {
        	thenplotChart(response);
          $("#fetch").click(function()
          {
          		thenplotChart(response);
          });
        });

        </script>


      </div>
    </div>

  </div>


</body>
</html>
