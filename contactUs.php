<?php
  $conn = new mysqli("localhost", "root", "", "visita_db");
  $message = ""; 
  $messageClass = ""; 

  if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $comments = $_POST["comments"];

    $sql = "INSERT INTO feedback_tbl (firstname, lastname, email, phoneNumber, comments) VALUES ('$firstname', '$lastname', '$email', '$phoneNumber', '$comments')";

    if($conn->query(query: $sql) === TRUE){
      $message = "Feedback submitted successfully!";
      $messageClass = "alert-success"; 
    } else {
      $message = "Error: ". $conn->error;
      $messageClass = "alert-warning";
    }
  }

  $conn->close();
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Visita Pinas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>

    <!-- Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="contactUs.css">

  </head>

  <body>
    <!-- Display Feedback Message -->
    <?php if ($message != ""): ?>
      <div class="alert <?php echo $messageClass; ?>" role="alert">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>
    
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-light">

      <!-- Logo -->
      <a class="navbar-brand" href="#">
        <img src="images/visitaLogo.png" alt="Logo" width="40" height="40" class="d-inline-block align-top"> IslavoYage
      </a>

      <!-- Hamburger Menu -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <!-- Navigation Links -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Home -->
            <li class="nav-item">
            <a class="nav-link" href="home.html">Home</a>
            </li>
            <!-- Destinations -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="destination.html" id="destinationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Destination
            </a>
            <div class="dropdown-menu" aria-labelledby="destinationDropdown">
                <a class="dropdown-item" href="destination.html">Beaches and Islands</a>
                <a class="dropdown-item" href="destination.html">Mountains and Hiking Trails</a>
                <a class="dropdown-item" href="destination.html">Cultural Gateways</a>
                <a class="dropdown-item" href="destination.html">Theme Parks and Rides</a>
            </div>
            </li>
            <!-- About Us -->
            <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About Us</a>
            </li>
            <!-- Contact Us -->
            <li class="nav-item">
            <a class="nav-link" href="contactUs.php">Contact Us</a>
            </li>
        </ul>
        <a class="btn btn-signin ml-3" href="login.html">Sign In</a>
      </div>
    </nav>
  

    <!-- Picture -->
    <div class="contact-image">
      <img src="images/travel-img.png" class="img-fluid" alt="Responsive image">
    </div>
        
    <!-- Contact Us Form Container -->
    <div class="contact-container">

      <!-- Contact Us Caption -->
        <div class="contact-info">
          <h2>Contact Information</h2>
          <p>Say something to start a live chat!</p>
          <ul>
            <li><span><i class='bx bxs-phone'></i></span> +1012 3456 789</li>
            <li><span><i class='bx bxs-envelope' ></i></span> visitaPinas@gmail.com</li>
            <li><span><i class='bx bx-current-location' ></i></span> Brgy. Pulo, Cabuyao, Laguna</li>
          </ul>
          <div class="social-icons">
            <a href="#"><span><i class='bx bxl-twitter' ></i></span></a>
            <a href="#"><span><i class='bx bxl-instagram' ></i></span></a>
            <a href="#"><span><i class='bx bxl-facebook' ></i></span></a>
          </div>
        </div>

        <!-- Contact Us Form -->
        <div class="contact-form">
          <form action="#" method="POST">
            <div class="form-row">
              <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="firstname" placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="lastname" namenameplaceholder="Last Name">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input type="tel" id="phone-number" name="phoneNumber" placeholder="Phone Number">
              </div>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="comments" placeholder="Write your message.."></textarea>
            </div>
            <button type="submit">Send Message</button>
          </form>
        </div>
    </div>

    <!-- Map -->
    <div class="map-container">
      <div class="map-caption">
          <h2>Visit Us</h2>
          <p>
              Discover the wonders of the Philippines with us! Our office is your first step 
              to planning a trip filled with breathtaking views and unforgettable experiences.
          </p>
      </div>

      <div class="background-design"></div>

      <div class="map-wrapper">
          <iframe 
              src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d966.8313386591567!2d121.1349086968895!3d14.234233073954195!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1732255108692!5m2!1sen!2sph" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
          </iframe>
      </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer py-5">
      <div class="container">
          <div class="row">
              <!-- Company Info -->
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                  <h5 class="text-uppercase fw-bold">Visita Pinas</h5>
                  <p>
                      Your ultimate travel companion. Explore the world with us, one journey at a time.
                  </p>
                  <div class="social-icons">
                      <a href="#" class="text-light me-3"><i class="fab fa-facebook"></i></a>
                      <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                      <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
              <!-- Quick Links -->
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                  <h5 class="text-uppercase fw-bold">Quick Links</h5>
                  <ul class="list-unstyled">
                      <li><a href="#" class="text-light">Home</a></li>
                      <li><a href="#" class="text-light">Destinations</a></li>
                      <li><a href="#" class="text-light">About Us</a></li>
                      <li><a href="#" class="text-light">Contact Us</a></li>
                  </ul>
              </div>
              <!-- Newsletter -->
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                  <h5 class="text-uppercase fw-bold">Subscribe to Our Newsletter</h5>
                  <form>
                      <div class="input-group mb-3">
                          <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email">
                          <button class="btn " type="submit">Subscribe</button>
                      </div>
                  </form>
              </div>
          </div>
          <!-- Bottom Bar -->
          <div class="text-center mt-4">
              <p class="mb-0">&copy; 2024 VisitaPinas. All Rights Reserved.</p>
          </div>
      </div>
  </footer>
    
    <!--Links for effects and style-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/cc86d7b31d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000,
        once: true
     });
    </script>

    <!-- script src for top navigation -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  </body>
</html>