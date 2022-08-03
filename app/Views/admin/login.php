<?php $page_session = \Config\Services::session(); ?>
<?php $this->extend('layouts/admin') ?>

<?= $this->section('content'); ?>

<?php if($page_session->getTempdata('success')): ?>
    <div class="container px-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $page_session->getTempdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
    </div>
<?php endif; ?>
<?php if($page_session->getTempdata('error')): ?>
    <div class="container px-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $page_session->getTempdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>  
    </div>
<?php endif; ?> 

<div class="container-fluid mt-5">   
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row py-3 px-3" style="background-color: #eeeeee">
            <h3>Admin Login</h3>
            <form method="POST">
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" />
                    <span class="text-danger"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" />
                    <span class="text-danger"></span>
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

