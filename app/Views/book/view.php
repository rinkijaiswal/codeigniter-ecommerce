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
        
        
        <h3 class="text-center py-2" style="background-color:lightseagreen">View All Books</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color:lightcyan">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>MRP</th>
                            <th>Selling Price</th>
                            <th>Availability</th>
                            <th>Language</th>
                            <th>Category</th>
                            <th>Pages</th>
                            <th>ISBN NO.</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($books as $book): ?>
                            <tr>
                                <td><?= $book['id'] ?></td>
                                <td>
                                <img src="<?= base_url('/uploads/'.$book['image']) ?>" alt="book" width="100" height="100" />
                                </td>
                                <td><?= $book['title'] ?></td>
                                <td><?= $book['description'] ?></td>
                                <td><?= $book['author'] ?></td>
                                <td>&#8377;<?= $book['mrp'] ?></td>
                                <td>&#8377;<?= $book['selling_price'] ?></td>
                                <td><?= $book['availability'] ?></td>
                                <td><?= $book['language'] ?></td>
                                <td><?= $book['category'] ?></td>
                                <td><?= $book['pages'] ?></td>
                                <td><?= $book['isbn_no'] ?></td>
                                <td><a href="/book/edit/<?= $book['id'] ?>" class="btn btn-outline-primary">Edit</a></td>
                                <td><a href="/book/delete/<?= $book['id'] ?>" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class='row'>
                <?php
                    $pager->setPath('/book/view/');
                    echo $pager->links();
                ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
