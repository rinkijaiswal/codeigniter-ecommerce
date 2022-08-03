<?php $this->extend('layouts/admin') ?>

<?= $this->section('content'); ?>
<div class="container-fluid mt-2">   
        <div class="row px-2">
            <div class="col-3 py-3" style="background-color: #212121">
                <h4 class="text-center py-2 mt-2 text-white" style="background-color: #424242">Menus</h4>
                <div class="list-group">
                    <a style="background-color: #424242" href="/book/create" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0 text-white">Create Book</h6>
                        </div>
                      </div>
                    </a>
                   <a style="background-color: #424242" href="/book/view" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0 text-white">View Book</h6>
                        </div>
                      </div>
                    </a>
                </div>
                <div class="list-group mt-3">
                    <a style="background-color: #424242" href="/user/all" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0 text-white">View Users</h6>
                        </div>
                      </div>
                    </a>
                </div>
                <div class="list-group mt-3">
                    <a style="background-color: #424242" href="/category/create" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0 text-white">Create Category</h6>
                        </div>
                      </div>
                    </a>
                   <a style="background-color: #424242" href="/category/view" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0 text-white">View Category</h6>
                        </div>
                      </div>
                    </a>
                </div>
                <div class="list-group mt-3">
                    <a style="background-color: #424242" href="/orders/all" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0 text-white">View Orders</h6>
                        </div>
                      </div>
                    </a>
                </div>
                <div class="list-group mt-3">
                    <a style="background-color: #424242" href="/admin/contact" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0 text-white">View Contacts</h6>
                        </div>
                      </div>
                    </a>
                </div>
            </div>
            <div class="col-9 py-3">
                <?= $this->renderSection('right') ?>
            </div>
        </div>
</div>

<?= $this->endSection(); ?>

