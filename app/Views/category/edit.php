<?php $page_session = \Config\Services::session(); ?>
<?php $this->extend('admin/index') ?>

<?= $this->section('right') ?>
    <div class="container-fluid">
        
        <?php if($page_session->getTempdata('success')): ?>
            <div class="container px-5">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $page_session->getTempdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
            </div>
        <?php endif; ?>
        
        <h3 class="text-center py-2" style="background-color: #eeeeee">Edit Category</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color: #fafafa">
                <form action="" method="POST">
                    <div class="form-group mt-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= set_value('name',$category['name']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
