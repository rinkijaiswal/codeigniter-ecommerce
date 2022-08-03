
<?php $this-> extend('layouts/layout')?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row py-3 px-5" style="background: #fafafa">
        
        
        
        <div class="container d-flex justify-content-center">
    <div class="row"style="background-color:lightcyan">
        <h3 class="my-3 mx-5"> Contact Us </h3>
        <form method="POST" action="<?= base_url('/contact')?>">
            <div class="form-group mb-2">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required/>
            </div>
            <div class="form-group mb-2">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required/>
            </div>
            <div class="form-group mb-2">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" required/>
            </div>
            <div class="form-group">
                <label>Query</label>
                <textarea class="form-control" name="query"></textarea>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-success mt-2">Contact</button>
            </div>
        </form>
    </div>
</div>
</div>
    </div>
</div>
<?php $this->endSection(); ?>