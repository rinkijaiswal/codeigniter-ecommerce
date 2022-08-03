<?php $page_session = \Config\Services::session(); ?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <main>
   <div class="px-4 py-5 mt-2 mb-4 text-center">
    <h1 class="display-5 fw-bold">About Us</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
    </div>
  </div>

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row" align="center">
      <div class="col-lg-4">
          <i class="fa-solid fa-archway fa-3x"></i>
        <h2 class="fw-normal">Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
      </div>
      <div class="col-lg-4">
          <i class="fa-brands fa-pagelines fa-3x"></i>
        <h2 class="fw-normal">Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <i class="fa-solid fa-scroll fa-3x"></i>
        <h2 class="fw-normal">Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
      </div>
    </div>


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette py-4">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img " width="400" height="400" src="<?= base_url('/uploads/bookstore1.jpg') ?>" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%"/>

      </div>
    </div>


    <div class="row featurette py-4">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
           <img class="bd-placeholder-img " width="400" height="400" src="<?= base_url('/uploads/book3.jpg') ?>" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%"/>

      </div>
    </div>


    <div class="row featurette py-4">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img " width="400" height="400" src="<?= base_url('/uploads/book .jpg') ?>" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%"/>

      </div>
    </div>


    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

</main>


    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      
  </body>
</div>

<?= $this->endSection(); ?>

