<?php
// db.php - Database connection
require 'db.php'; 

// Fetching the blog posts from the database
$stmt = $pdo->query("SELECT * FROM blog ORDER BY post_date DESC LIMIT 10"); // You can adjust the LIMIT as needed
$posts = $stmt->fetchAll();
?>



<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Home Page</title>



    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="./assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <style>




      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }



      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }




      /* footer */
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/css/headers.css" rel="stylesheet">
  </head>
  <body>


  <header class="p-3 text-bg-light">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <img src="./assets/images/login.png" alt="Login Icon" width="60" height="60" class="rounded-circle shadow-sm border" style="object-fit: cover;">

        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.php" class="nav-link px-2 text-black">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-black">blog</a></li>
          <li><a href="#" class="nav-link px-2 text-black">contact</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="search" class="form-control border rounded-pill shadow-sm px-3" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <a href="./login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
          <a href="./signup.php"><button type="button" class="btn btn-primary">Sign-up</button></a>
        </div>
      </div>
    </div>
  </header>


<!-- slider -->
  <link rel="stylesheet" href="./assets/slider/imageslidermaker/ism/css/my-slider.css"/>
  <script src="./assets/slider/imageslidermaker/ism/js/ism-2.2.min.js"></script>

<div class="ism-slider" data-transition_type="fade" data-play_type="loop" id="my-slider">
  <ol>
    <li>
      <img src="./assets/slider/imageslidermaker/ism/image/slides/flower-729514_1280.jpg">
      <div class="ism-caption ism-caption-0">🌍 World 
        📢 "Unveiling Global Stories: Stay Informed, Stay Connected!"
        🌎 "Breaking News & Deep Insights from Every Corner of the World!"</div>
    </li>
    <li>
      <img src="./assets/slider/imageslidermaker/ism/image/slides/beautiful-701678_1280.jpg">
      <div class="ism-caption ism-caption-0">🎨 Design
        ✨ "Where Creativity Meets Innovation—Explore the Art of Design!"
        🖌️ "Design Your Imagination: Trends, Ideas & Inspiration!"</div>
    </li>
    <li>
      <img src="./assets/slider/imageslidermaker/ism/image/slides/summer-192179_1280.jpg">
      <div class="ism-caption ism-caption-0">💻 Technology
        🚀 "Future is Now: The Latest in Tech & Innovation!"
        🔬 "From AI to Space Exploration—Tech That Shapes Tomorrow!"</div>
    </li>
    <li>
      <img src="./assets/slider/imageslidermaker/ism/image/slides/city-690332_1280.jpg">
      <div class="ism-caption ism-caption-0">💼 Business
        📊 "Unlock Success: Strategies, Trends & Business Insights!"
        💡 "Entrepreneurship & Market Trends—Stay Ahead in Business!"</div>
    </li>
    <li>
      <img src="./assets/slider/imageslidermaker/ism/image/slides/bora-bora-685303_1280.jpg">
      <div class="ism-caption ism-caption-0">🏋️‍♀️ Health & Wellness
        🌿 "Mind, Body & Soul—Your Guide to a Healthier Life!"
        💖 "Wellness Begins Here: Tips for a Balanced & Happy Life!"</div>
    </li>
    <li>
      <img src="./assets/slider/imageslidermaker/ism/image/slides/pier-569314_1280.jpg">
      <div class="ism-caption ism-caption-0">🌟 Lifestyle
        🏡 "Elevate Your Everyday: Fashion, Travel & Life Hacks!"
        🌍 "Live in Style—Trends & Inspiration for a Better You!"</div>
    </li>
    <li>
      <img src="./assets/slider/imageslidermaker/ism/image/slides/chainlink-690503_1280.jpg">
      <div class="ism-caption ism-caption-0">🎓 Education
        📚 "Knowledge is Power—Unlock Learning & Growth!"
        🎓 "From Classrooms to Careers—The Future of Education!"</div>
    </li>
  </ol>
</div>

    </div>
<!-- end slider -->

<main class="p-5">
  <h3>Featured</h3>
  <div class="row mb-2">
    <?php foreach ($posts as $post): ?>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis"><?php echo htmlspecialchars($post['category']); ?></strong>
            <h3 class="mb-0"><?php echo htmlspecialchars($post['title']); ?></h3>
            <div class="mb-1 text-body-secondary"><?php echo date('M d', strtotime($post['post_date'])); ?></div>
            <p class="card-text mb-auto"><?php echo htmlspecialchars(substr($post['description'], 0, 100)); ?>...</p>
            <a href="single_post.php?id=<?php echo $post['id']; ?>" class="icon-link gap-1 icon-link-hover stretched-link">
              Continue reading
              <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
          </div>
          <div class="col-lg-auto col-12 d-lg-block">
            <!-- Correct Image Path -->
            <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="" class="bd-placeholder-img w-100" width="200" height="250">
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>





  <div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>&copy; 2024 Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</div>
  
<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
