<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">	
        <meta name="description" content="Process job vacancy search data">
        <meta name="keywords"    content="search job info">
        <meta name="author"      content="Thanh Thy">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1</title>
      <link rel = "icon" href = "style/profile.png" type = "image/x-icon">
      <link rel="stylesheet" href="style.css">
    
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 
      <!-- Boostrap icon -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
    </head>

<body>
  <!-- Header  -->
  <header>
      <div class="container-fluid container-xl">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" id="name-page" href="index.php">JobMatcher</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>        
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="postjobform.php">Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="searchjobform.php">Search</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
  </header>
  <!-- End Header -->
	<section id="search-job-process" class="form">
    <div class="container">
      <div class="justify-content-center align-items-center">

<!-- PHP Code  -->
  <?php
  // Directory and file paths
  $filename = "../../data/jobposts/jobs.txt";
  $dir = "../../data/jobposts";

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

    // Validate search form
  if (isset($_GET['search_submit'])) {
      $title = test_input($_GET['searchTitle']);
      

    //Validate Title    
    if (isset($_GET['title'])) {
      if (!preg_match("/^[a-zA-Z0-9,.! ]{1,20}$/", $title)) {
        $error_msg .= "<p>Title can only contain a maximum of 20 alphanumeric characters, including spaces, commas, periods (full stops), and exclamation points. Other characters or symbols are not allowed.</p>";
      }
    } 

    //Validate Position Type
    if (isset($_GET['searchPosition'])) {
      $position = $_GET['searchPosition'];
    } 
    //Validate Contract
    if (isset($_GET['searchContract'])) {
      $contract = $_GET['searchContract'];
    } 
    //Validate Application type
  $application = "";
    if (isset($_GET['searchApplication'])) {
      $application = $_GET['searchApplication'];
    } 
    //Validate Location
    if (isset($_GET['searchLocation'])) {
      $location = $_GET['searchLocation'];
    } 

      $found = false;
      $validJobs = array(); // Array to store valid jobs

      if (file_exists($dir)) {
        $handle = fopen($filename, "r");
    
        while (!feof($handle)) {
            $line = fgets($handle);
            $data = explode("\t", $line);
          
          /**
           *
           * This block of code filters the job vacancies based on the search criteria and returns an array of valid jobs
           *
           * @var $closingDate - string - The closing date for the job 
           * @var $title - string - The title of the job 
           * @var $position - string - The position of the job
           * @var $contract - string - The contract type of the job
           * @var $application - array - The application types for the job 
           * @var $location - string - The location of the job
           * @return array - An array of valid job match the criteria.
           */
              if (count($data) > 1) { 
                $closingDate = DateTime::createFromFormat("d/m/y", $data[3]); // Convert closing date to DateTime object
                $date = new DateTime(); // Get the current date and time

                if ($closingDate >= $date) {  //Validate Closing date > today
                  // Check if the title matches 
                  if (!empty($title) && strpos(strtolower($data[1]), strtolower($title)) === false) {
                      continue; // Skip if the title doesn't match
                  }

                  // Check if the postion matches
                  if (!empty($position) && $data[4] !== $position) {
                      continue; // Skip if the position doesn't match
                  }

                  // Check if the contract matches                
                  if (!empty($contract) && $data[5] !== $contract) {
                      continue; // Skip if the contract type doesn't match
                  }

                  // Check if the job vacancy data contains 8 columns (only one check box is checked)
                  if (count($data) == 8) {
                      // Check if the application matches
                      if (!empty($application) && !in_array($data[6], $application)) {
                          continue; // Skip if the application type doesn't match
                      }
                      
                      if (!empty($location) && strtolower($data[7]) !== strtolower($location)) {
                          continue; // Skip to the next iteration if the location doesn't match
                      }
                  } else {// Check if the job vacancy data contains 9 columns (two check box are checked)
                      if (!empty($application) && !in_array($data[6], $application) && !in_array($data[7], $application)) {
                          continue; // Skip to the next iteration if the application type doesn't match
                      }
                      
                      if (!empty($location) && strtolower($data[8]) !== strtolower($location)) {
                          continue; // Skip to the next iteration if the location doesn't match
                      }
                  }
                  $validJobs[] = $data; // Add the valid job to the array
                }
              
                  // Sort the filtered job based on the closing date
                  $sortedJobs = sortJobVacancies($validJobs);

                    
              } // End code block
        }
    
        fclose($handle);
    
        if (count($validJobs) > 0) {
          // Display the sorted job 
          foreach ($sortedJobs as $job) {
            displayJob($job);
        }
      } else {
          echo "<div class='text-center justify-content-center'>";
          echo "<h2 style='text-transform: none;'>No jobs found matching the search criteria</h2>";
          echo "<div><img src='style/error_process.jpg' class='img-fluid' alt='job posting'></div>";
          echo "</div>";
      }
    } else {
        echo "<p>Job posts file not found.</p>";
    }
  }   else {
      // Check if user reached the page directly
      if (empty($_SERVER['HTTP_REFERER'])) {
          echo "<div class='text-center justify-content-center'>";
            echo "<h2>Please go back and fill out the form!</h2>";
            // Image error
            echo "<div><img src='images/error.jpg' class='img-fluid' alt='job posting'</div>"; 
          echo "</div>";
      }
    }

    /**
     * Sorts the job vacancies array based on the closing date in descending order
     * @usort - This function takes two parameters: the array need to be sorted and the comparison function that defines the sorting order
     * @param array $jobs - The array of job vacancies to sort
     * @return array - The sorted array of job vacancies
     * 
     */
    function sortJobVacancies($jobs)
    {
        usort($jobs, function ($job1, $job2) {
            $date1 = DateTime::createFromFormat("d/m/y", $job1[3]);
            $date2 = DateTime::createFromFormat("d/m/y", $job2[3]);
    
            if ($date1 < $date2) {
                return 1; // $date1 is earlier than $date2, so $job1 comes after $job2
            } elseif ($date1 > $date2) {
                return -1; // $date1 is later than $date2, so $job1 comes before $job2
            } else {
                return 0; // $date1 and $date2 are equal, so the order doesn't matter
            }
        });
    
        return $jobs; // Return the sorted array of job vacancies
    }

      /**
     * Displays the details of a job vacancy after it has been sorted.
     * @var $formattedClosingDate - The closing date format in 'yyyy'
     * @param $data - The sorted array of job vacancies.
     * 
     */
    function displayJob($data) {
      // modify closing date string by appending '20' in front of the last two digits of the date, I assume that people only post job from today' date
      //  converting a date in "yy" format to "yyyy" format
        $closingDate = $data[3];
        $formattedClosingDate = preg_replace('/(\d{2})$/', '20$1', $closingDate);
    
        echo "<strong>Job Title: </strong>" . $data[1] . "<br>";
        echo "<strong>Description: </strong>" . $data[2] . "<br>";
        echo "<strong>Closing Date: </strong> " . $formattedClosingDate . "<br>";
        echo "<strong>Position: </strong> " . $data[4] . " - " . $data[5] . "<br>";
    
        if (count($data) == 8) {
            echo "<strong>Application by: </strong>". $data[6] ."</br>";

            echo "<strong>Location: </strong>". $data[7] ."</br>";
            echo "<hr>";
        } else {
            echo "<strong>Application by: </strong>". $data[6] . " - " .$data[7] ."</br>";
            echo "<strong>Location: </strong>". (isset($data[8]) ? $data[8] : $data[7]) ."</br>";
            echo "<hr>";
        }
    }
  ?> <!-- End PHP Code  -->

      <!-- Back button -->
      <div class="row">
        <div class="col-md-6 text-start">
          <a href="index.php" class="btn-service btn-form"><i class="bi bi-arrow-left"></i> Homepage</a>
        </div>
        <div class="col-md-6 text-end">
          <a href="searchjobform.php" class="btn-service btn-form">Search for another job<i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
       <!-- End Back button -->

    </div>
  </div>
</section>

</body>
</html>






