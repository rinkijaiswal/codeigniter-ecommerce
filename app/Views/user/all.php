<?php $this->extend('admin/index') ?>

<?= $this->section('right') ?>
    <div class="container-fluid"> 
        <h3 class="text-center py-2" style="background-color: #eeeeee">View All Users</h3>
        <div class="container">
            <div class="row mb-5 px-5 py-4" style="background-color: #fafafa">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>House No.</th>
                            <th>Locality</th>
                            <th>City </th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Pincode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td><?= $user['house_no'] ?></td>
                                <td><?= $user['locality'] ?></td>
                                <td><?= $user['city'] ?></td>
                                <td><?= $user['state'] ?></td>
                                <td><?= $user['country'] ?></td>
                                <td><?= $user['pincode'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class='row'>
                <?php
                    $pager->setPath('/user/all/');
                    echo $pager->links();
                ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
