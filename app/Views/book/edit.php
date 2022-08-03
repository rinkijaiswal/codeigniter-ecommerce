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
        
        <h3 class="text-center py-2" style="background-color: #eeeeee">Edit Book</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color: #fafafa">
                <form enctype="multipart/form-data" action="" method="POST">
                    <div class="form-group mt-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?= set_value('title',$book['title']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"><?= set_value('description',$book['description']) ?></textarea>
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>MRP</label>
                        <input type="text" name="mrp" class="form-control" value="<?= set_value('mrp',$book['mrp']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Selling Price</label>
                        <input type="text" name="selling_price" class="form-control" value="<?= set_value('selling_price',$book['selling_price']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" value="<?= set_value('author',$book['author']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Availability</label>
                        <input type="text" name="availability" class="form-control" value="<?= set_value('availability',$book['availability']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Language</label>
                        <input type="text" name="language" class="form-control" value="<?= set_value('language',$book['language']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="<?= $book['category'] ?>"><?= $book['category'] ?></option>
                            <?php 
                                use App\Models\CategoryModel;
                                $model = new CategoryModel();
                                $cat = $model->getAll();
                                foreach ($cat as $c):
                            ?>
                                <option value="<?= $c['name'] ?>"><?= $c['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>Pages</label>
                        <input type="text" name="pages" class="form-control" value="<?= set_value('pages',$book['pages']) ?>" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label>ISBN No.</label>
                        <input type="text" name="isbn_no" class="form-control" value="<?= set_value('isbn_no',$book['isbn_no']) ?>" />
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
