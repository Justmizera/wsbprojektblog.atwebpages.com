<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Hasło musi mieć więcej niż 6 znaków.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Hasło nie są identyczne.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Coś poszło nie tak. Sróbuj ponownie później.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
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
        <li><a class="nav-link scrollto " href="#portfolio">Wpisy</a></li>
        <li><a class="nav-link scrollto" href="#services">O nas</a></li>
        <li><a class="nav-link scrollto" href="#contact">Kontakt</a></li>
        <?php 
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo "<li class='nav-link scrollto'><a href='logout.php'>Wyloguj się</a></li>";
        echo "<li class='nav-link scrollto'><a href='reset-password.php'>Zresetuj hasło</a></li>";
        echo "<li style='color:white'><b>";
        echo htmlspecialchars($_SESSION["username"]); 
        echo ", witaj na naszej stronie! </b></li>";
        }
        else{
        echo "<li><a class='nav-link scrollto' href='/login.php'>Zaloguj się</a></li>";
        echo "<li><a class='nav-link scrollto' href='/register.php'>Zarejestruj się</a></li>";
        }
        ?>
     
      </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        
          </header><!-- End Header -->
  
    <div class="wrapper">
        <h2>Zresetuj hasło</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Podaj nowe hasło</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Potwierdź nowe hasło</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Zmień hasło">
                <a class="btn btn-primary" style="width:200px;" href="index.html">Wróć na stronę główną</a>
            </div>
            <br>
        </form>
    </div>    
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