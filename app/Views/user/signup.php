<?php $page_session = \Config\Services::session(); ?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid mt-5">
    
    <?php if(isset($error_password)): ?>
            <div class="container px-5">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Password do not match.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
    <?php endif; ?>
    
    <?php if($page_session->getTempdata('success')): ?>
        <div class="container px-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $page_session->getTempdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    
    <div class="container d-flex justify-content-center align-items-center mb-5">
        <div class="row py-3 px-3" style="background-color:lightcyan">
            <h3 class="mb-2" align="center">Signup</h3>
            <form method="POST">
                <div class="col-12 mt-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" />
                    <span class="text-danger">
                        <?php
                            if(isset($validation)){
                                    if($validation->hasError('name')){
                                        echo $validation->getError('name');
                                    }
                                } 
                            ?>
                    </span>
                </div>
                <div class="col-12 mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" />
                    <span class="text-danger">
                        <?php
                            if(isset($validation)){
                                    if($validation->hasError('email')){
                                        echo $validation->getError('email');
                                    }
                                } 
                            ?>
                    </span>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
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
                    <div class="col-6">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?= set_value('cpassword') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('cpassword')){
                                        echo $validation->getError('cpassword');
                                    }
                                } 
                            ?>
                        </span>
                    </div>
                </div>
                <div class="row mt-3">
                   <div class="col-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('phone')){
                                        echo $validation->getError('phone');
                                    }
                                } 
                            ?>
                        </span>
                    </div> 
                    <div class="col-6">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" value="<?= set_value('pincode') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('pincode')){
                                        echo $validation->getError('pincode');
                                    }
                                } 
                            ?>
                        </span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="house_no">House No.</label>
                        <input type="text" class="form-control" id="house_no" name="house_no" value="<?= set_value('house_no') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('house_no')){
                                        echo $validation->getError('house_no');
                                    }
                                } 
                            ?>
                        </span>
                    </div>
                    <div class="col-4">
                        <label for="locality">Locality</label>
                        <input type="text" class="form-control" id="locality" name="locality" value="<?= set_value('locality') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('locality')){
                                        echo $validation->getError('locality');
                                    }
                                } 
                            ?>
                        </span>
                    </div>
                    <div class="col-4">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('city')){
                                        echo $validation->getError('city');
                                    }
                                } 
                            ?>
                        </span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?= set_value('state') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('state')){
                                        echo $validation->getError('state');
                                    }
                                } 
                            ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <label for="city">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?= set_value('country') ?>" />
                        <span class="text-danger">
                            <?php
                            if(isset($validation)){
                                    if($validation->hasError('country')){
                                        echo $validation->getError('country');
                                    }
                                } 
                            ?>
                        </span>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>