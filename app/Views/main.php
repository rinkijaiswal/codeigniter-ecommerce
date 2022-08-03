<?php $page_session = \Config\Services::session();?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    
    <?php if($page_session->getTempdata('success')): ?>
        <div class="container px-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $page_session->getTempdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    
    <div class="container-fluid mt-2">
        <!-- carousel -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="bd-placeholder-img"src="<?= base_url('/uploads/bookstore1.jpg') ?>" height="400" width="100%"/>
                <div class="container">
                  <div class="carousel-caption text-start">
                    <h1>Online Book Store </h1>
                    <p>Online Book store is an online web application where the customer can purchase books online. Through a web browser the customers can search for a book by its title or author, later can add to the shopping cart and finally purchase using credit card transaction.</p>
                    
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="bd-placeholder-img" src="<?=base_url('/uploads/book1.jpg')?>"height="400" width="100%"/>

                <div class="container">
                  <div class="carousel-caption">
                      
                    <h1> Buy The Book 24 Hours </h1>
                    <p>Online Book store is an online web application where the customer can purchase books online. Through a web browser the customers can search for a book by its title or author, later can add to the shopping cart and finally purchase using credit card transaction.</p>
                   
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                  <img class="bd-placeholder-img" src="<?= base_url('/uploads/bookstore.jpg') ?>"height="400" width="100%"/>
                <div class="container">
                  <div class="carousel-caption text-end">
                    <h1>Online Book Available</h1>
                    <p>Online Book store is an online web application where the customer can purchase books online. Through a web browser the customers can search for a book by its title or author, later can add to the shopping cart and finally purchase using credit card transaction.</p>
                    
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <!-- end carousel -->
        
        
        <div class="row mt-4 py-4 px-4">
            <h3 class="py-3 px-3 text-center" >Latest Sellers</h3>
            <div class="col-9 px-4">
                <div class="row row-cols-1 row-cols-md-3 g-4 mb-4"style="background-color:lightcyan">
                    <?php foreach($books as $b): ?>
                    <div class="col">
                      <div class="card">
                          <img height="300" width="180" src="<?= base_url('/uploads/'.$b['image']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?= base_url('/book/single/'.$b['id']) ?>"><?= $b['title'] ?></a></h5>
                          <p class="text-muted"><?= $b['author'] ?></p>
                          <p><span style="color:red;font-size: 30px">&#8377;<?= $b['selling_price'] ?></span> <strike> &#8377;<?= $b['mrp'] ?></strike></p>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                <div class="row">
                    <?php
                        $pager->setPath('/');
                        echo $pager->links();
                    ?>
                </div>
            </div>
            <div class="col-3">
                
                <div class="row py-3 px-3" style="background-color:lightcyan" align="center">
                    <h3 class="py-3 px-3 text-center text-white" style="background-color: #212121">Search</h3>
                    <form action="<?= base_url('/book/search') ?>" method="post">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="search" /> 
                        </div>
                        <button class="btn btn-primary mt-2">Search</button>
                    </form>
                </div>
                <div class="row py-3 px-3 mt-4 mb-4" style="background-color:lightcyan" align="center">
                    <h3 class="py-3 px-3 text-center text-white" style="background-color: #212121">Categories</h3> 
                    <nav class="nav flex-column">
                        <?php foreach($category as $cat): ?>
                        <a style="color:black" href="<?= base_url('/book/category/'.$cat['name']) ?>" class="nav-link"><?= $cat['name'] ?></a>
                        <?php endforeach; ?>
                     </nav>                       
                </div>
                
            </div>
        </div>
    </div>
    
</div>

<?= $this->endSection(); ?>
