<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
        <html lang="en">
        
        <head>
          <meta charset="utf-8">
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
        
          <title>Portfolio Details - Laura Bootstrap Template</title>
          <meta content="" name="description">
          <meta content="" name="keywords">
          <link href="assets/css/style.css" rel="stylesheet" type="text/css">
          <link href="comments.css" rel="stylesheet" type="text/css">
        
          <!-- Favicons -->
          <link href="assets/img/favicon.png" rel="icon">
          <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        
          <!-- Google Fonts -->
          <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
            rel="stylesheet">
        
          <!-- Vendor CSS Files -->
          <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
          <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
          <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
          <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
          <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        
          <!-- Template Main CSS File -->
          <link href="assets/css/style.css" rel="stylesheet">
        
          <!-- =======================================================
          * Template Name: Laura - v4.7.0
          * Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
          * Author: BootstrapMade.com
          * License: https://bootstrapmade.com/license/
          ======================================================== -->
        </head>
<body>
        
          <!-- ======= Header ======= -->
          <header id="header" class="fixed-top d-flex justify-content-center align-items-center ">
        
            <nav id="navbar" class="navbar">
              <ul>
                <li><a class="nav-link scrollto active" href="index.html">Strona główna</a></li>
                <li><a class="nav-link scrollto" href="/login.php">Zaloguj się</a></li>
        
                <li><a class="nav-link scrollto" href="/register.php">Zarejestruj się</a></li>
        
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        
          </header><!-- End Header -->
          
    <h1 style="margin-top: 100px; font-size: 32px; font-weight: 700; text-transform: uppercase; margin-bottom: 20px; padding-bottom: 0; color: #3b434a; position: relative; z-index: 2;" class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
        
        
        <!-- ======= Footer ======= -->
        <footer id="footer">
          <div class="container">
            <h3>Travel lovers</h3>
            <p>Jesteśmy miłośnikami podróży i odkrywania nowych zakątków świata</p>
        
            <div class="social-links">
              <a href="https://twitter.com/" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://facebook.com/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://instagram.com/" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
            <p><a href="/admin_site.html">Panel administratora</a></p>
            <div class="copyright">
              &copy; Copyright <strong><span>Laura</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </footer><!-- End Footer -->
        
          <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
              class="bi bi-arrow-up-short"></i></a>
        
          <!-- Vendor JS Files -->
          <script src="assets/vendor/purecounter/purecounter.js"></script>
          <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
          <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
          <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
          <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
          <script src="assets/vendor/php-email-form/validate.js"></script>
        
          <!-- Template Main JS File -->
          <script src="assets/js/main.js"></script>
        </body>
        
        </html>