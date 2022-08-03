<?php $page_session = \Config\Services::session(); ?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    
    <?php if($page_session->getTempdata('cart')): ?>
            <div class="container px-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $page_session->getTempdata('cart') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
            </div>
        <?php endif; ?>
    
    <div class="container mb-5">
        <div class="row py-5" style="background-color:lightcyan">
            <div class="col-3 offset-2">
                <img height="350" src="<?= base_url('/uploads/'.$book['image']) ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-7">
                <h3 class="mt-2"><?= $book['title'] ?></h3>
                <p><?= $book['author'] ?></p>
                <p><strong>Language:</strong> <?= $book['language'] ?></p>
                <p><strong>Pages:</strong> <?= $book['pages'] ?></p>
                <p><strong>Isbn No:</strong> <?= $book['isbn_no'] ?> </p>
                <p><strong>Available:</strong> <?= $book['availability'] ?></p>
                <p><strong>Description:</strong> <?= $book['description'] ?></p>
                <p><span style="color:red;font-size: 30px">&#8377;<?= $book['selling_price'] ?></span> 
                <strike> &#8377;<?= $book['mrp'] ?></strike></p>
            <form action="<?= base_url('/cart/add') ?>" method="post" >
                <input type="hidden" value="<?= $book['id'] ?>" name="product_id" />
                <input type="hidden" value="<?= $book['title'] ?>" name="product_name" />
                <input type="hidden" value="<?= $book['selling_price'] ?>" name="price" />
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Add To Cart</button>
            </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>