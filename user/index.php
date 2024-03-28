<?php
include('../include/config.php');
include('../include/database.php');
include('../include/functions.php');

include('includes/head.php');
include('includes/header.php');

// Fectch 3 post from post table
$query = "SELECT * FROM recipes ORDER BY date DESC LIMIT 3";
$recipes   = mysqli_query($connect, $query);
if (!$recipes) {
  die('Error: ' . mysqli_error($connect));
}

// Fectch 2  post from post table
$query = "SELECT * FROM breakfast ORDER BY date DESC LIMIT 2";
$breakfast   = mysqli_query($connect, $query);
if (!$breakfast) {
  die('Error: ' . mysqli_error($connect));
}

// Fectch 2  post from post table
$query = "SELECT * FROM lunch ORDER BY date DESC LIMIT 2";
$lunch   = mysqli_query($connect, $query);
if (!$lunch) {
  die('Error: ' . mysqli_error($connect));
}

// Fectch 2  post from post table
$query = "SELECT * FROM dinner ORDER BY date DESC LIMIT 2";
$dinner   = mysqli_query($connect, $query);
if (!$dinner) {
  die('Error: ' . mysqli_error($connect));
}

?>



  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Simple Recipes Food for a Vibrant Lifestyle</h2>
                <p class="animate__animated animate__fadeInUp">In today's fast-paced world, prioritizing our well-being has become more important than ever.  </p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown"> Creating Simple Yet Satisfying Meals</h2>
                <p class="animate__animated animate__fadeInUp">Contrary to popular belief, nutritious meals don't have to be bland or boring.</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/3.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Nourishing the Body and Soul</h2>
                <p class="animate__animated animate__fadeInUp">Beyond the physical aspects of nutrition, cultivating mindful eating habits is essential for promoting overall well-being and vitality</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>About Whole Well-Being</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="assets/img/about/11.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">project Maintenance</h4>
                </a>
                <p>
                  Welcome to Whole Well-Being, your ultimate destination for embracing a vibrant lifestyle through the joy of cooking and wholesome eating. At Whole Well_being, we believe that nourishing your body with delicious and nutritious meals is the foundation of a happy and fulfilling life.                </p>
                <ul> 
                  <li>
                    <i class="bi bi-check"></i> Simple Recipes
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Joy of Cooking
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Inspiration & Guidance
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Wholesome Eating
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Categories Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Category</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa-sharp fa-solid fa-utensils" style="color: #8bace5;"></i>                  </a>
                  <h4>Breakfast Delights:

                  </h4>
                  <p>
                    Start your day off right with delicious and nutritious breakfast recipes.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-card-checklist"></i>
                  </a>
                  <h4>Lunchtime Favorites:

                  </h4>
                  <p>
                    Quick and easy recipes perfect for a satisfying midday meal.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-bar-chart"></i>
                  </a>
                  <h4>Dinner Time Classics:

                  </h4>
                  <p>
                    Flavorful recipes for hearty dinners that the whole family will love.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-binoculars"></i>
                  </a>
                  <h4>Healthy Snacks & Appetizers:

                    </h4>
                  <p>
                    Wholesome snack ideas and appetizers to keep you energized throughout the day.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-brightness-high"></i>
                  </a>
                  <h4>Decadent Desserts:

                  </h4>
                  <p>
                    Indulgent desserts and sweet treats to satisfy your cravings.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-calendar4-week"></i>
                  </a>
                  <h4>Global Cuisine:

                  </h4>
                  <p>
                    Explore diverse flavors from around the world with international recipes inspired by various cuisines.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Services Section -->

    <!-- ======= Rviews Section ======= -->
    <div class="reviews-area">
      <div class="row g-0">
        <div class="col-lg-6">
          <img src="assets/img/about/12.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 work-right-text d-flex align-items-center">
          <div class="px-5 py-5 py-lg-0">
            <h2>working with us</h2>
            <h5>Web Design, Ready Home, Construction and Co-operate Outstanding Buildings.</h5>
            <a href="#contact" class="ready-btn scrollto">Contact us</a>
          </div>
        </div>
      </div>
    </div><!-- End Rviews Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Popular Categories</h2>
            </div>
          </div>
        </div>
        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Breakfast</li>
              <li data-filter=".filter-card">Lunch</li>
              <li data-filter=".filter-web">Dinner</li>
            </ul>
          </div>
        </div>

        <div class="row awesome-project-content portfolio-container">

          <!-- portfolio-item start -->
         
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app portfolio-item">
          <?php while ($break = mysqli_fetch_assoc($breakfast)) : ?>

          <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../image/<?php echo $break['image']; ?>"   /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../image/<?php echo $break['image']; ?>">
                      <h4><?php echo $break['title']; ?></h4>
                      <span><?php echo $break['date']; ?></span>
                    </a>
                  </div>
                </div>
              </div>

            </div>
            <?php endwhile; ?>

          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-card portfolio-item">
          <?php while ($lunchs = mysqli_fetch_assoc($lunch)) : ?>

          <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../image/<?php echo $lunchs['image']; ?>"   /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../image/<?php echo $lunchs['image']; ?>">
                      <h4><?php echo $lunchs['title']; ?></h4>
                      <span><?php echo $lunchs['date']; ?></span>
                    </a>
                  </div>
                </div>
              </div>

            </div>
            <?php endwhile; ?>

          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web portfolio-item">
          <?php while ($dinners = mysqli_fetch_assoc($dinner)) : ?>

          <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../image/<?php echo $dinners['image']; ?>"   /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../image/<?php echo $dinners['image']; ?>">
                      <h4><?php echo $dinners['title']; ?></h4>
                      <span><?php echo $dinners['date']; ?></span>
                    </a>
                  </div>
                </div>
              </div>

            </div>
            <?php endwhile; ?>

          </div>
          <!-- portfolio-item end -->

        </div>
      </div>
    </div><!-- End Portfolio Section -->


    <!-- ======= Blog Section ======= -->
    <div id="blog" class="blog-area">
      <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Latest Recipes</h2>
              </div>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php while ($recipe = mysqli_fetch_assoc($recipes)) : ?>
        <div class="col">
          <div class="card h-100">
            <img src="../image/<?php echo $recipe['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $recipe['title']; ?></h5>
              <p class="card-text"><?php echo $recipe['content']; ?></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated <?php echo $recipe['date']; ?></small>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
        </div>
      </div>
    </div><!-- End Blog Section -->



    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contact us</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-phone"></i>
                  <p>
                    Call: +1 5589 55488 55<br>
                    <span>Monday-Friday (9am-5pm)</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-envelope"></i>
                  <p>
                    Email: info@example.com<br>
                    <span>Web: www.example.com</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-geo-alt"></i>
                  <p>
                    Location: A108 Adam Street<br>
                    <span>NY 535022, USA</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-6">
              <!-- Start Map -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
              <!-- End Map -->
            </div>
            <!-- End Google Map -->

            <!-- Start  contact -->
            <div class="col-md-6">
              <div class="form contact-form">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->

  </main><!-- End #main -->



  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php


include('includes/foot.php');
include('includes/footer.php');
?>