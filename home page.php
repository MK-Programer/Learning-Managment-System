<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home page style.css">
  <title>LMS - Home Page</title>
</head>
<body>
  <!-- Header -->
   <?php include "Menu Bar.html";?>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Welcome In, <span></span></h1>
        <h1>We Are Here <span></span></h1>
        <h1>To Serve You <span></span></h1>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!--Instructors Section -->
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Instr<span>u</span>ctors</h1>
        <div class="gallery">
         <a target="_blank" href="">
          <img src="img/pic1.png" alt="#1" width="600" height="400">
         </a>
          <div class="desc">Add a description of the image here</div>
        </div>

         <div class="gallery">
          <a target="_blank" href="">
            <img src="img/pic2.png" alt="#2" width="600" height="400">
          </a>
         <div class="desc">Add a description of the image here</div>
         </div>

        <div class="gallery">
         <a target="_blank" href="">
          <img src="img/pic3.png" alt="#3" width="600" height="400">
         </a>
          <div class="desc">Add a description of the image here</div>
        </div>

        <div class="gallery">
         <a target="_blank" href="">
          <img src="img/pic4.png" alt="#4" width="600" height="400">
         </a>
         <div class="desc">Add a description of the image here</div>
        </div>
       </div>
     </div>
  
  <!-- Instructor Section -->

  <!-- Top Viewed Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Top <span>Viewed</span></h1>
      </div>
      <div class="all-projects">
        <div class = "container1"> 
           <div class = "row1">
             <div class = "col1">
                <video src = "Videos/vid1.mp4" controls = "controls" loops = "loop" autoplay = "autoplay" width = "80%"></video>
             </div>
               <div class = "col1">
                     <video src = "Videos/vid2.mp4" controls = "controls" loops = "loop" autoplay = "autoplay" width = "80%"></video>
                     <video src = "Videos/vid3.mp4" controls = "controls" loops = "loop" autoplay = "autoplay" width = "80%"></video>
                     <video src = "Videos/vid4.mp4" controls = "controls" loops = "loop" autoplay = "autoplay" width = "80%"></video>
               </div>
           </div>
       </div>
         
      </div>
    </div>
  </section>
  <!-- Top Viewed Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div><h1 class="section-title">Contact <span>info</span></h1></div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png"/></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+1 234 123 1234</h2>
            <h2>+1 234 123 1234</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png"/></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>info@gmail.com</h2>
            <h2>abcd@gmail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png"/></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>Fatikchhari, Chittagong, Bangladesh</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand"><h1><span>L</span> M <span>S</span></h1></div>
      <h2>Where Complete Study Is Here</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png"/></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png"/></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png"/></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png"/></a>
        </div>
      </div>
      <p>Copyright © 2020 LMS. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="./app.js"></script>
</body>
</html>