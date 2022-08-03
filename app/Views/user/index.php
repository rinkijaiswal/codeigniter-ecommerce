<?php $page_session = \Config\Services::session(); ?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid mt-2">   
    
    <?php if($page_session->getTempdata('success')): ?>
        <div class="container px-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $page_session->getTempdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    
    <div class="container mb-4">
        <div class="row">
            <h3 class="mb-2 text-center py-3">User Dashboard</h3>
            <div class="col-4 py-4 px-4" style="background-color:lightcyan ">
                <h4 class="mb-2 text-center">User Details</h4>
                <p><strong>Name:</strong> <span><?= $user['name'] ?></span></p>
                <p><strong>Email:</strong> <span><?= $user['email'] ?></span></p>
                <p><strong>Phone:</strong> <span><?= $user['phone'] ?></span></p>
                <p class="mt-2 mb-2"><strong>Address:</strong></p>
                <p><?= $user['house_no'] ?>,<?= $user['locality'] ?></p>
                <p><?= $user['city'] ?>,<?= $user['state'] ?></p>
                <p><?= $user['country'] ?>, <?= $user['pincode'] ?></p>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('/user/edit/'.$user['id']) ?>" method="POST">
                              <input type="hidden" name="email" value="<?= $user['email'] ?>" />
                              <input type="hidden" name="password" value="<?= $user['password'] ?>" />
                                <div class="col-12 mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name',$user['name']) ?>" />
                                </div>
                                <div class="row mt-3">
                                   <div class="col-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone',$user['phone']) ?>" />
                                    </div> 
                                    <div class="col-6">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" class="form-control" id="pincode" name="pincode" value="<?= set_value('pincode',$user['pincode']) ?>" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="house_no">House No.</label>
                                        <input type="text" class="form-control" id="house_no" name="house_no" value="<?= set_value('house_no',$user['house_no']) ?>" />
                                    </div>
                                    <div class="col-4">
                                        <label for="locality">Locality</label>
                                        <input type="text" class="form-control" id="locality" name="locality" value="<?= set_value('locality',$user['locality']) ?>" />
                                    </div>
                                    <div class="col-4">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city',$user['city']) ?>" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" value="<?= set_value('state',$user['state']) ?>" />
                                    </div>
                                    <div class="col-6">
                                        <label for="city">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="<?= set_value('country',$user['country']) ?>" />
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            
            <div class="col-6 offset-2">
                <h3>Order Details</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Payment Id</th>
                            <th>Product Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order): ?>
                        <tr>
                            <td><?= $order['payment_id'] ?></td>
                            <td><?= $order['product_detail'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>       
            </div>
            
        </div>
    </div>
</div>

<?= $this->endSection(); ?>