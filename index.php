<?php
require_once "config.php";

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($link, $_POST['name']);
   $email = mysqli_real_escape_string($link, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($link, "INSERT INTO `contact_form`(name, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');

   if($insert){
      $message[] = 'appointment made successfully!';
   }else{
      $message[] = 'appointment failed';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Uranium</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">Health<span>IO.</span></a>

         <nav class="nav">
            <a href="#home">home</a>
            <a href="about.html">about</a>
            <a href="services.html">services</a>
            <a href="contact.html">contact</a>
            
         </nav>

         <!-- <a href="#contact" class="link-btn">make appointment</a>  -->

         <div id="menu-btn" class="fas fa-bars"></div>

      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">


   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3 >Hi, <b style="color: #00b8b8;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h3>
            <p>let us brighten your smile</p>
            <p>
               <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
               <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
            </p>
         </div>
      </div>
   <!-- <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>let us brighten your smile</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium itaque, quasi aliquam alias tempora voluptatibus.</p>
            <a href="#contact" class="link-btn">make appointment</a>
         </div>
      </div>

   </div> -->

</section>

<!-- home section ends -->
<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading">make appointment</h1>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
      <span>your name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <span>your email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" required>
      <span>your number :</span>
      <input type="number" name="number" placeholder="enter your number" class="box" required>
      <span>appointment date :</span>
      <input type="datetime-local" name="date" class="box" required>
      <input type="submit" value="make appointment" name="submit" class="link-btn">
   </form>  

</section>

<!-- contact section ends -->


<!-- about section starts  -->

<!-- <section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/about-img.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>
            <h3>True Healthcare For Your Family</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam cupiditate vero in provident ducimus. Totam quas labore mollitia cum nisi, sint, expedita rem error ipsa, nesciunt ab provident. Aperiam, officiis!</p>
            <a href="#contact" class="link-btn">make appointment</a>
         </div>

      </div>

   </div>

</section> -->

<!-- about section ends -->

<!-- services section starts  -->

<!-- <section class="services" id="services">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/icon-1.svg" alt="">
         <h3>Alignment specialist</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, non?</p>
      </div>

      <div class="box">
         <img src="images/icon-2.svg" alt="">
         <h3>Cosmetic dentistry</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, non?</p>
      </div>

      <div class="box">
         <img src="images/icon-3.svg" alt="">
         <h3>Oral hygiene experts</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, minima?</p>
      </div>

      <div class="box">
         <img src="images/icon-4.svg" alt="">
         <h3>Root canal specialist</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, minima?</p>
      </div>

      <div class="box">
         <img src="images/icon-5.svg" alt="">
         <h3>Live dental advisory</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, minima?</p>
      </div>

      <div class="box">
         <img src="images/icon-6.svg" alt="">
         <h3>Cavity inspection</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, minima?</p>
      </div>

   </div>

</section> -->

<!-- services section ends -->

<!-- process section starts  -->

<!-- <section class="process">

   <h1 class="heading">work process</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/process-1.png" alt="">
         <h3>Cosmetic Dentistry</h3>
         <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, excepturi?</p>
      </div>

      <div class="box">
         <img src="images/process-2.png" alt="">
         <h3>Pediatric Dentistry</h3>
         <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, excepturi?</p>
      </div>

      <div class="box">
         <img src="images/process-3.png" alt="">
         <h3>Dental Implants</h3>
         <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, excepturi?</p>
      </div>

   </div>

</section> -->

<!-- process section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> satisfied clients </h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/1dcc728ed7f2a1565274793d768c6b5b.jpg" alt="">
         <p>This is the best dental clinic I have visited far soon. I had very unpleasant smile because of gap between my upper two teeth. This unpleasant smile was repaired by Aesthetic filling . Also I did scaling and polishing. My all of family memebers visit there regarding any dental problems . As far as my experience I will suggest all of you seeeing the reviews to visit and get service from HealthIO .</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Tarique Rahman</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/images (2).jpg" alt="">
         <p>Recently I visited HealthIO for the first time . I was so fascinated by their way of welcoming , their clean environment and by their services. I had done 4 Root Canal Treatment with Zirconium crown .It was totally painless treatment with the Japanese filling materials. I think there are very few dental clinic that provide these type of World Class services. I would highly suggest this clinic for everyone!!!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sajeeb Wazed </h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/220px-আবুল_খায়ের_জসিম_উদ্দিন.jpg" alt="">
         <p>Dr. Abdul Quader Rubel is an amazing and skilled Dentist. He has been my dental provider for past 6 years and practically every tooth in my mouth has been revitalized with his proficient care. Recently he has done my Aesthetic Filling on lower tooth and I was fully satisfied. I suggest all the people to visit Smile Zone once and be grateful for their service. Five stars from me for HealthIO!!!!!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Abul Khaer Joshim Uddin</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/download (3).jpg" alt="">
         <p>I highly recommend this dental clinic for any dental problems. My visit has been delightful experiences, something I have never said about a dental visit . The staff members are professional and welcoming. Very positive interaction with Dr. Abdul Quader Rubel. All the equipments were of advanced technology with a very good environment . Highly recommended.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>SM Aslam Talukder</h3>
         <span>satisfied client</span>
      </div>

   </div>

</section>

<!-- reviews section ends -->



<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>+880-1797037147</p>
         <p>+880-1928886231</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p>Dhanmodni-19, Dhaka</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>00:09am to 10:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p>ahmedistiak9999@gmail.com</p>
         <p>istiakahmedjoy99@gmail.com</p>
      </div>

   </div>

   <div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>Istiak Ahmed Khan</span>  </div>

</section>

<!-- footer section ends -->










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
