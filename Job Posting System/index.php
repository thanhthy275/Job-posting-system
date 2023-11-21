<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="description" content="Home Page">
	<meta name="keywords"    content="Advanced Web Development">
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
                <a class="nav-link active" href="#">Home</a>        
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
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

  <!-- ======= Banner Section ======= -->
  <section id="banner" class="banner d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 d-flex flex-column justify-content-center">
          <h1>Connecting Talent with Opportunities</h1>
          <h2 class="p-10">The ultimate solution to simplify and streamline your hiring process</h2>
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
        </div>
        <div class="col-lg-7 banner-img">
          <img src="style/index.jpg" class="img-fluid" alt="index-page">
        </div>
      </div>
    </div>
  </section><!-- End Banner -->

        <!-- ======= About Section ======= -->
        <section id="alert">

          <div class="container w-50">
              <div class="justify-content-center background-gradient p-3">
                <h2 class="text-center"><i class="bi bi-bell"></i> ALERT <i class="bi bi-bell"></i></h2>
                <p>  My name is Huynh Thanh Thy. Student ID: 103805499. Email: 103805499@swin.edu.au. </p>
                <p>
                  I declare that this assignment is my individual work. I have not worked collaboratively nor have I copied
                  from any other student’s work or from any other source 
                </p>
              </div>
    
    
            </div>
          </div>
        </section>
    <!-- End About Section -->

        <!-- ======= Service Section ======= -->
    <section id="service">

      <div class="container">

        <div class="section-title">
          <h2>Job Vacancy Posting System</h2>
          <h4>We offer services:</h4>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3 id="post-title"<i class="bi bi-postcard"></i> Post</h3>
              <p>Want to post a job vacancy?</p>
              <a href="postjobform.php" class="btn-service">Click here</a>
            </div>
          </div>


          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3 id="search-title"><i class="bi bi-search"></i> Search</h3>
              <p>Want to search for a job vacancy?</p>
              <a href="searchjobform.php" class="btn-service">Click here</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3 id="about-title"><i class="bi bi-chat-quote"></i> About</h3>
              <p>About this assignment</p>
              <a href="about.php" class="btn-service">Click here</a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Service Section -->


</body>
    
</html>