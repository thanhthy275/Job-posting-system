<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="description" content="Process job vacancy data">
	<meta name="keywords"    content="Post Job process">
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
						<a class="nav-link active" href="postjobform.php">Post</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="searchjobform.php">Search</a>
					</li>

				</ul>
			</div>
		</nav>
	</div>
  </header>
  <!-- End Header -->


<section id="post-form" class="form">
<div class="container">
	<?php
	// Directory and file paths

	$dir = "../../data/jobposts";
	$filename = "../../data/jobposts/jobs.txt";


	/**
	 * Cleans and sanitizes user input data to prevent errors and format it for safe usage
	 * @param string $data - The input data by user
	 */
	function test_input($data) {
		$data = trim($data); // Remove whitespace
		$data = stripslashes($data); // Remove backslashes (\) to escaping issues
		$data = htmlspecialchars($data); // Convert special characters to their HTML entities 
		return $data; 
	}



	//VALIDATE FORM
	if (isset($_POST['post_submit'])){
		$positionID = test_input($_POST["positionID"]);
		$title = test_input($_POST['title']);
		$description = test_input($_POST['description']);
		$closingDate = $_POST['closingDate'];
		$application = array();
		$error_msg="";	//error message variable

	//Validate position ID
	if (isset($_POST['positionID']) && !empty($_POST['positionID'])) {
		//  position ID is not empty
		if (!preg_match("/^P\d{4}$/", $positionID)) { //The pattern "/^P\d{4}$/" ensures that $positionID starts with 'P' followed by exactly 4 digits (0-9)
			$error_msg .= "<p>Position ID must start with a capital 'P' followed by 4 numbers.</p>";
		} else {
			// Check if Position ID is unique within the text file
			if (isPositionIDUnique($dir, $filename, $positionID)) {
				
			} else {
				$error_msg .= "<p>Position ID is not unique.</p>";
			}
		}
	} else {
		// Position ID is empty
		$error_msg .= "<p>Please enter the Position ID</p>";

	}

	//Validate Title    
	if (isset($_POST['title']) && !empty($_POST['title'])) {
		if (!preg_match("/^[a-zA-Z0-9,.! ]{1,20}$/", $title)) {
			$error_msg .= "<p>Title can only contain a maximum of 20 alphanumeric characters, including spaces, commas, periods (full stops), and exclamation points. Other characters or symbols are not allowed.</p>";
		}
	} else {
		$error_msg .= "<p>Please enter the job title</p>";
	}

	//Validate Description
	if (isset($_POST['description']) && !empty($_POST['description'])) {
		// Description is not empty
		if (strlen($description) > 260) {
			$error_msg .= "<p>Description must be less than 260 characters in length.</p>";
		}
	} else {
		// Description is empty 
		$error_msg .= "<p>Please enter a description.</p>";
	}

	//Validate Closing Date
	if (isset($closingDate) && !empty($closingDate)) {
		//$datePattern regular expression pattern to validate the date format in the form dd/mm/yy
			//The day (1-31), single-digit values without leading zeros
			//The month (1-12), single-digit values without leading zeros
			//The year can be any two-digit number
			$datePattern = '/^(0?[1-9]|[12]\d|3[01])\/(0?[1-9]|1[0-2])\/(\d{2})$/';
			if (!preg_match($datePattern, $closingDate)) {
			$error_msg .= "<p>Invalid date format. Please use dd/mm/yy format</p>";
		}
	} else { 
		$error_msg .= "<p>Please enter the job closing date.</p>";
	}

	//Validate Position Type
	if (isset($_POST['position'])) {
		$position = $_POST['position'];
	} else {  // Not any option selected
		$error_msg .= "<p>Please select a position </p>";
	}

	//Validate Contract
	if (isset($_POST['contract'])) {
		$contract = $_POST['contract'];
	} else {  // Not any option selected
		$error_msg .= "<p>Please select a contract type</p>";
	}

	//Validate Application type
	if (isset($_POST['application']) && !empty($_POST['application'])) {
		$application = $_POST['application'];
		$application = implode("\t", $application);
	} else {
		// Checkbox is not checked
		$error_msg .= "<p>Please select the application type</p>";
	}

	//Validate Location
	if (isset($_POST['location']) && !empty($_POST['location'])) {
		$location = $_POST['location'];
	} else { // Not any option selected
		$error_msg .= "<p>Please select a location</p>";
	}

	if ($error_msg!=""){
		echo "<h2>Oops!!!! Please check your input</h2>";
		echo "<div class='row d-flex align-items-center justify-content-center'>";
		echo "<div class='col-md-7'><img src='style/error_process.jpg' class='img-fluid' alt='job posting'></div>";
		echo "<div class='col-md-5 text-danger'>$error_msg</div>";
		echo "</div>";
		}
			else {
				umask(0007);
				$dir = "../../data/jobposts";
				$filename = "../../data/jobposts/jobs.txt";

				// Set directory permissions
				if (!file_exists($dir)) {
					if (!mkdir($dir, 0777, true)) {
						die("Failed to create jobposts directory.");
					}
				} else {
					chmod($dir, 0777); // Set directory permissions: all users have full access to read from, write to, and execute files within the directory
				}  

				$handle = fopen($filename, "a"); 

					// File opened successfully
					if (is_writable($filename)) {   //check if writable
						chmod($filename, 0777);

						$positionID = addslashes($positionID);
						$title = addslashes($title);
						$description = addslashes($description);
						$closingDate = addslashes($closingDate);
						$position = addslashes($position);
						$contract = addslashes($contract);
						$application = addslashes($application);
						$location = addslashes($location);
						
						$savedata = $positionID . "\t" . $title . "\t" . $description . "\t" . $closingDate . "\t" . $position . "\t" . $contract . "\t" .$application. "\t" . $location . "\r\n";
						//checks if write has failed

						if (fwrite($handle, $savedata) === false) { 
							echo"<p class='alert alert-danger'>Your job could not be posted. File not writable.</p>";
						} //if write was successful
						else { 
							echo "<div class='text-center justify-content-center'>";
							echo "<h2 class='text-primary'>Thank you for posting your job</h2>";
							echo "<div><img src='style/post_job.jpg' class='img-fluid' alt='job posting'</div>"; 
							echo "</div>";
							fclose($handle); // close text file
						}
					} else {
						echo"<p class='alert alert-danger'>Your job could not be posted. File not writable.</p>";
						fclose($handle); // close text file
					}

			}

	} else {
		// Check if user reached the page directly
		if (empty($_SERVER['HTTP_REFERER'])) {
			echo "<div class='text-center justify-content-center'>";
				echo "<h2>Please go back and fill out the form!</h2>";
				// Image error
				echo "<div><img src='style/error.jpg' class='img-fluid' alt='job posting'</div>"; 
			echo "</div>";
		}
	}

		/**
		*Checks if a position ID is unique within a given file
		*@param string $dir - The directory path where the file is located
		*@param string $filename - The name of the file to be checked (jobs.txt)
		*@param string $positionID - The position ID to be checked for uniqueness
		*@return bool - Returns true if the position ID is unique
		*/
		function isPositionIDUnique($dir, $filename, $positionID) {
			if (file_exists($dir)) {
				$handle = fopen($filename, "r");
	
				while (!feof($handle)) {
					$line = fgets($handle);
					$job = explode("\t", $line);
					if ($job[0] === $positionID) {
						fclose($handle);
						return false; // Position ID is not unique
					}
				}
				fclose($handle);
			} 
			return true; // Position ID is unique
		}
	?>
	
	<div class="row">
		<div class="col-md-6 text-start">
			<a href="index.php" class="btn-service btn-form"><i class="bi bi-arrow-left"></i> Homepage</a>
		</div>
		<div class="col-md-6 text-end">
			<a href="postjobform.php" class="btn-service btn-form">Post Job Vancacy<i class="bi bi-arrow-right"></i></a>
		</div>
	</div>
</section>




</body>
</html>






