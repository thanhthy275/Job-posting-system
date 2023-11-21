<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="description" content="About page">
	<meta name="keywords"    content="Advanced Web Development">
	<meta name="author"      content="Thanh Thy">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Assignment 1</title>
  <link rel = "icon" href = "images/profile.png" type = "image/x-icon">
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
                <a class="nav-link active" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="postjobform.php">Post</a>
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


    <!-- Question Section-->
    <section id="question">

      <div class="container w-50 p-3">
          <div class="background-gradient p-3">
            <h2 class="text-center"><i class="bi bi-patch-question-fill"></i> Question 1 <i class="bi bi-patch-question-fill"></i> </h2>
            <p>  What is the PHP version installed in mercury? </p>
            <ul>
                <li><?php echo "The PHP version installed is: " . phpversion(); ?></li>
            </ul>
          </div>
      </div>

      <div class="container w-50 p-3">
          <div class="background-gradient p-3">
            <h2 class="text-center"><i class="bi bi-patch-question-fill"></i> Question 2 <i class="bi bi-patch-question-fill"></i> </h2>
            <p>  What tasks you have not attempted or not completed? </p>
            <ul>
                <li><?php echo "
                    I have successfully completed all the tasks in the assignment 1. However, I am unable to determine if any errors are present 
                    on a different computer or in a different environment. " ?>
                </li>
            </ul>
          </div>
      </div>


      <div class="container w-50 p-3">
          <div class="background-gradient p-3">
            <h2 class="text-center"><i class="bi bi-patch-question-fill"></i> Question 3 <i class="bi bi-patch-question-fill"></i> </h2>
            <p>  What special features have you done, or attempted, in creating the site? </p>
            <ul>
                <li><?php echo "
                 I have made significant improvements to ensure that it looks like a job posting website, going beyond the scope of the original assignment:" ?>
                </li>
                <ul>
                  <li><?php echo "
                    Responsive Layout: The webstie can adapt to different screen sizes, ensuring it is accessible and user-friendly on various devices, including desktops, tablets, and mobile phones. " ?>
                  </li>
                  <li><?php echo "
                    Navigation: I have made it easier for users to easily navigate through different sections of the website and find relevant information.
                    " ?>
                  </li>
                </ul>
                <li><?php echo "
                 I have  implement error handling when user reaches the process page directly" ?>
                </li>
            </ul>
          </div>
      </div>


      <div class="container w-50 p-3">
          <div class="background-gradient p-3">
            <h2 class="text-center"><i class="bi bi-patch-question-fill"></i> Question 4 <i class="bi bi-patch-question-fill"></i> </h2>
            <p>  What discussion points did you participated on in the unit’s discussion board for Assignment 1? If you did not participate, state your reason </p>
            <ul>
                <li><?php echo "
                  I did not discuss in the discussion board, but during the tutorial sessions, I participated by asking questions related to the assignment. For example: Can I use Bootstrap for designing the website." ?>
                </li>
            </ul>
          </div>
      </div>



 



</body>
    
</html>