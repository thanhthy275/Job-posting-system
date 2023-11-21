<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">	
        <meta name="description" content="Post a new job vacancy page">
        <meta name="keywords"    content="Post job form">
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
                <a class="nav-link active" href="#">Post</a>
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

  <!-- contain the current date of the server in dd/mm/yy -->
  <?php $currentDate = date('d/m/y'); ?> 

<section id="post-form" class="form">
    <div class="container">
      <div class="justify-content-center align-items-center">
          <h2 class="text-center">Post your job</h2>
          <!-- Image Posting Job -->
          <div class="text-center">
              <img src="style/jobposting.jpg" class="img-fluid" alt="job posting">
          </div>


          <form method="post" action="postjobprocess.php">
          <!-- Position ID -->
          <div class="form-group row">
            <label for="positionID" class="col-sm-2 control-label">Position ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="positionID" name="positionID" placeholder="P0001">
            </div>
          </div>
          <!-- End Position ID -->


          <!-- Title -->
          <div class="form-group row">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="title" name="title" placeholder="IT manager">
            </div>
          </div>
          <!-- End Title -->

          <!-- Desscription -->
          <div class="form-group row">
              <label for="description" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
              <textarea class="form-control" name="description" rows="3" 
                placeholder="Write the description of the job..."></textarea>
              </div>
          <!-- End Desscription -->


          </div>

          <!-- Closing Date -->
          <div class="form-group row">
              <label for="closingDate" class="col-sm-2 control-label">Closing Date</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="closingDate" value="<?php echo $currentDate; ?>">
              </div>
          </div>
          <!-- End Closing Date -->

          <!-- Position -->
          <div class="form-group row">
              <label for="position" class="col-sm-2 control-label">Position</label>

            <div class="col-sm-10 row">
              <div class="col-sm-4">
                  <input type="radio" name="position" value="full-time" />
                  <label for="full-time" class="control-label">Full Time</label>
              </div>
              
              <div class="col-sm-5">
                  <input type="radio" name="position" value="part-time" />
                  <label for="part-time" class="control-label">Part Time</label>
              </div>
            </div>
          </div>
          <!-- End Position -->

          <!-- Contract -->
          <div class="form-group row">
              <label for="contract" class="col-sm-2 control-label">Contract</label>

            <div class="col-sm-10 row">
              <div class="col-sm-4">
                  <input type="radio" name="contract" value="on-going" />
                  <label for="on-going" class="control-label">On-going</label>
              </div>
            
              <div class="col-sm-5">
                  <input type="radio" name="contract" value="fixed-term" />
                  <label for="fixed-term" class="control-label">Fixed term</label>
              </div>
            </div>
          </div>
          <!--End Contract -->

          <!-- Accept Application by -->
          <div class="form-group row">
              <label for="application" class="col-sm-4 control-label">Accept Application by</label>

            <div class="col-sm-8 row">
              <div class="col-sm-3">
                  <input type="checkbox" name="application[]" value="post" />
                  <label for="email" class="control-label">Post</label>
              </div>
              
              <div class="col-sm-3">
                  <input type="checkbox" name="application[]" value="mail" />
                  <label for="phone" class="control-label">Mail</label>
              </div>
            </div>
          </div>
          <!-- End Accept Application by -->

          <!-- Location -->
          <div class="form-group row">
              <label for="location" class="col-sm-2 control-label">Location</label>
              <div class="col-sm-4">
                  <select class="form-control text-center" name="location">
                      <option value="">--Choose a location--</option>
                      <option value="VIC">VIC</option>
                      <option value="NSW">NSW</option>
                      <option value="QLD">QLD</option>
                      <option value="NT">NT</option>
                      <option value="WA">WA</option>
                      <option value="SA">SA</option>
                      <option value="TAS">TAS</option>
                      <option value="ACT">ACT</option>
                  </select>
              </div>
          </div>
          <!-- End Location -->

        <!-- Submit Button -->
          <div class="text-center">
              <button type="submit" name="post_submit" class="btn btn-primary">Post</button>
              <button type="reset" class="btn btn-primary">Reset</button>
          </div>
        <!-- Submit Button -->
        
      </form>
    <!-- End Post Form -->

      <!-- Back button -->
        <div class="row">
          <div class="col-md-6 text-start">
            <a href="index.php" class="btn-service btn-form"><i class="bi bi-arrow-left"></i> Homepage</a>
          </div>
        </div>
      <!-- End Back button -->

      </div>
    </div>  
  </section>




</body>
</html>


