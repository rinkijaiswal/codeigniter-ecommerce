<?php $page_session = \Config\Services::session(); ?>
<?php $this->extend('admin/index') ?>

<?= $this->section('right') ?>
    <div class="container-fluid"> 
        
        <?php if($page_session->getTempdata('delete')): ?>
            <div class="container px-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $page_session->getTempdata('delete') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
            </div>
        <?php endif; ?>
        
        
        <h3 class="text-center py-2" style="background-color:lightcyan">View All Category</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color: #fafafa">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $cat): ?>
                            <tr>
                                <td><?= $cat['id'] ?></td>
                                <td><?= $cat['name'] ?></td>
                                <td><a href="/category/edit/<?= $cat['id'] ?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="/category/delete/<?= $cat['id'] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class='row'>
                <?php
                    $pager->setPath('/category/view/');
                    echo $pager->links();
                ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
