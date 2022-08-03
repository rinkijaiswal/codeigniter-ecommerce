<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid mt-5 mb-5">    
    <div class="container">
        <div class="row py-2 px-2" style="background-color:lightcyan">
            <h4 class="mb-2" align="center">Category Result For: <?= $query ?></h4>
            <div class="row row-cols-1 row-cols-md-3 g-4">
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
            <div class="row mt-2">
            <?php
                $pager->setPath('/book/category/'.$query);
                echo $pager->links();
            ?>
        </div>
        </div>
        
    </div>
</div>


<?= $this->endSection(); ?>