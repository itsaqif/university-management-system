<?php

include("header.php");


?>


<!-- Hero Video With Content -->

<div class="position-relative overflow-hidden">
  <div class="d-flex min-vh-100" lc-helper="video-bg">
    <video style="z-index: 1; object-fit: cover; object-position: 50% 50%" class="position-absolute w-100 min-vh-100" autoplay="" preload="" muted="" loop="" playsinline="">
      <!-- adjust object-position to tweak cropping on mobile -->
      <source src="Untitled design.mp4" type="video/mp4" />
    </video>
    <div style="z-index: 2" class="align-self-center text-center text-light col-md-8 offset-md-2">
      <div class="lc-block mb-4">
        <div editable="rich">
          <h1 class="display-1 fw-bolder">ACTIV WE ARE</h1>
        </div>
      </div>

      <div class="lc-block">
        <div editable="rich">
          <p class="lead">
            At true Education is enough knowledge given to a student to be
            successful in life after completing school
          </p>

          <p class="lead">
            Education is the kindling of a flame, not the filling of a vessel.
          </p>
        </div>
      </div>
      <button type="button" class="button-6">READ MORE</button>
    </div>
  </div>
</div>

<!-- Search Courses Part Start -->
<div class="contain-4">
  <div class="input-group-1">
    <input type="text" placeholder="Keywords" style="width: 80%; border-radius: 5px; padding: 4px" />
  </div>
  <div class="input-group-2">
    <select class="custom-select" id="inputGroupSelect04">
      <option selected>Department</option>
      <option value="1">Computer Science</option>
      <option value="2">Electrical Engineering</option>
      <option value="3">Mechanical Engineering</option>
      <option value="3">Civil Engineering</option>
    </select>
  </div>
  <button type="button" class="button-5">Search Courses</button>
</div>

<!-- Search Courses Part End -->

<!-- Bootstrap Grid with Four Columns -->

<div class="container-fluid-1">
  <div class="row">
    <div class="col p-4">
      <h1></h1>
      <img src="grid1.png" class="set-image" />
      <div class="title">Life at Activ</div>
    </div>

    <div class="col p-4">
      <img src="grid2.png" class="set-image" />
      <div class="title">Sports & Events</div>
    </div>

    <div class="col p-4">
      <img src="grid3.png" class="set-image" />
      <div class="title">News & Updates</div>
    </div>

    <div class="col p-4">
      <img src="grid4.png" class="set-image" />
      <div class="title">Students Society</div>
    </div>
  </div>
</div>

<!-- Bootstrap Grid End -->
<br /><br />

<!-- Slider Part Start -->

<div class="container-fluid overflow-hidden p-0 contain-5">
  <div class="row g-0">
    <div lc-helper="background" class="col-md-6 order-md-2" style="
        min-height: 100vh;
        background-size: cover;
        background-position: center;
        background-image: url(image1.png);
      "></div>
    <div class="col-md-6 order-md-1 my-auto text-center" style="padding: 10vw">
      <div class="lc-block mb-3">
        <div editable="rich">
          <h2>ACTIV</h2>
          <p class="lead">
            So what are you waiting for, click on the button below to get
            permanently attached with <strong> ACTIV UNIVERSITY</strong>
          </p>
        </div>
      </div>

      <div class="lc-block">
        <a class="button-8" href="#" role="button">Apply Now</a>
      </div>
      <!-- /lc-block -->
    </div>
  </div>
</div>

<!-- Slider Part End -->

<?php

include("footer.php");

?>