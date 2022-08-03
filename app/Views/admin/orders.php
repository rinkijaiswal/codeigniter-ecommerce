<?php $this->extend('admin/index') ?>

<?= $this->section('right') ?>
    <div class="container-fluid"> 
        <h3 class="text-center py-2" style="background-color: #eeeeee">View All Orders</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color: #fafafa">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Address</th>
                            <th scope='col'>Phone</th>
                            <th scope='col'>Payment ID.</th>
                            <th scope='col'>Product Detail</th>
                            <th scope='col'>Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['name'] ?></td>
                                <td><?= $order['email'] ?></td>
                                <td><?= $order['address'] ?></td>
                                <td><?= $order['phone'] ?></td>
                                <td><?= $order['payment_id'] ?></td>
                                <td><?= $order['product_detail'] ?></td>
                                <td><?= $order['status'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class='row'>
                <?php
                    $pager->setPath('/orders/all/');
                    echo $pager->links();
                ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
