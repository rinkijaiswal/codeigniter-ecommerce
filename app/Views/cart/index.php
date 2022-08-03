<?php $page_session = \Config\Services::session(); ?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid" style="height:69vh">
    <div class="container">
        <div class="row">
            <h3 class="text-center">Cart Details</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 0;
                    $total = 0;
                    $items = array();
                    foreach($products as $cart): 
                        $id++;
                        $total = $total + $cart['total'];
                        $items[] = 'name: '.$cart['product_name'].', qty:'.$cart['quantity'].', total:'.$cart['total'];
                    ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $cart['product_name'] ?></td>
                        <td>
                            <form action="<?= base_url('/cart/update/'.$cart['id']) ?>" method="post">
                                <input type="hidden" value="<?= $cart['product_id'] ?>" name="product_id" />
                                <input type="hidden" value="<?= $cart['product_name'] ?>" name="product_name" />
                                <input type="hidden" value="<?= $cart['price'] ?>" name="price" />
                                <div class="row">
                                    <div class="col-8 mt-2">
                                        <select class="form-control" name="quantity">
                                            <option value="<?= $cart['quantity'] ?>"><?= $cart['quantity'] ?>qty</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-success mt-2">Update</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>&#8377;<?= $cart['price'] ?></td>
                        <td>&#8377;<?= $cart['total'] ?></td>
                        <td><a href="<?= base_url('/cart/delete/'.$cart['id']) ?>" class="btn btn-danger">X</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>Grand Total</td>
                        <td colspan="4">&#8377;<?= $total ?></td>
                        <?php if($total >0){ ?>
                        <td>                          
                            <form action="<?= base_url('/order/checkout') ?>" method='POST'>
                            <?php foreach ($items as $row) { ?>
                                  <input name="products[]" type="hidden" value='<?= $row ?>' /> 
                            <?php } ?>
                                <input type='hidden' name='total' value='<?= $total ?>' />
                                <button type="submit" class='btn btn-outline-success'>Checkout</button>
                            </form>
                        </td>
                        <?php }else{ ?>
                        <td>
                            <button onclick="alert('cart is empty')" class="btn btn-success" >Checkout</button>
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
