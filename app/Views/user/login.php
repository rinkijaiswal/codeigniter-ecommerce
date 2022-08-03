<?php $page_session = \Config\Services::session(); ?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid mt-5" style="height:65vh">
    
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
    
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row py-3 px-5" style="background-color:lightcyan">
            <h3 class="mb-2" align="center">Login</h3>
            <form method="POST">
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" />
                    <span class="text-danger"><?php
                            if(isset($validation)){
                                    if($validation->hasError('email')){
                                        echo $validation->getError('email');
                                    }
                                } 
                            ?></span>
                </div>
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>" />
                    <span class="text-danger">
                        <?php
                            if(isset($validation)){
                                    if($validation->hasError('password')){
                                        echo $validation->getError('password');
                                    }
                                } 
                            ?>
                    </span>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>