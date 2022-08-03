<?php $this->extend('admin/index') ?>

<?= $this->section('right') ?>
    <div class="container-fluid"> 
        <h3 class="text-center py-2" style="background-color: #eeeeee">View All Contacts</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color: #fafafa">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Phone</th>
                            <th scope='col'>Query</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contacts as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['name'] ?></td>
                                <td><?= $order['email'] ?></td>
                                <td><?= $order['phone'] ?></td>
                                <td><?= $order['query'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
