<?php $this->extend('admin/index') ?>

<?= $this->section('right') ?>
    <div class="container-fluid">     
        <h3 class="text-center py-2" style="background-color: #eeeeee">Dashboard</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color: #fafafa">
                <div class="col-6">
                    <div class="card" style="width: 18rem;">
                        <div class="d-flex justify-content-center align-items-center px-3">
                            <i class="fa-solid fa-book fa-5x"></i>
                            <div class="card-body">
                                <h3>Total Books</h3>
                                <p><?= $book; ?></p>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="col-6">
                    <div class="card" style="width: 18rem;">
                        <div class="d-flex justify-content-center align-items-center px-3">
                            <i class="fa-solid fa-user fa-5x"></i>
                            <div class="card-body">
                                <h3>Total users</h3>
                                <p><?= $user; ?></p>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="card" style="width: 18rem;">
                        <div class="d-flex justify-content-center align-items-center px-3">
                            <i class="fa-solid fa-book-bookmark fa-5x"></i>
                            <div class="card-body">
                                <h3>Total Categories</h3>
                                <p><?= $category; ?></p>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="card" style="width: 18rem;">
                        <div class="d-flex justify-content-center align-items-center px-3">
                            <i class="fa-solid fa-box-archive fa-5x"></i>
                            <div class="card-body">
                                <h3>Total Orders</h3>
                                <p><?= $order; ?></p>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
