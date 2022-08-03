<?php $page_session = \Config\Services::session(); ?>

<?php $this->extend('layouts/layout') ?>

<?= $this->section('content'); ?>
<div class="container-fluid mb-5">
    
    <?php if($page_session->getTempdata('success')): ?>
        <div class="container px-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $page_session->getTempdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    
    <div class="container">
        
        <div class="row py-5 text-center">
          <i class="fa-solid fa-bag-shopping fa-5x"></i>
          <h2 class="mt-2">Checkout Page</h2>
        </div>

        <div class="row g-5">
            
          <div class="col-12 col-md-5 col-lg-4 offset-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Your cart</span>
              <span class="badge bg-primary rounded-pill"><?= $cart_count ?></span>
            </h4>
            <ul class="list-group mb-3">
              <?php 
                $total = 0;
                foreach($products as $c): 
                    $total = $total + $c['total'];
              ?>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0"><?= $c['product_name'] ?></h6>
                  <small class="text-muted">Quantity: <?= $c['quantity'] ?></small>
                </div>
                <span class="text-muted mx-5">&#8377;<?= $c['total'] ?></span>
              </li>
              <?php endforeach; ?>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (INR)</span>
                <strong>&#8377;<?= $total ?></strong>
              </li>
            </ul>
          </div>
        </div>
        <div class="row offset-4">
            <div class="container">
            <button class="btn btn-danger" id="rzp-button1">Pay</button>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                <script>
                var options = {
                    "key": "rzp_test_o1u0tTxeizLfpj", // Enter the Key ID generated from the Dashboard
                    "amount": "<?= $total*100 ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Codeigniter",
                    "description": "Book Transaction",
                    "image": "https://example.com/your_logo",
                    "order_id": "<?= $id ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function (response){
                        window.location = 'http://localhost:8080/success/'+response.razorpay_payment_id
                    },
                    "prefill": {
                        "name": "<?= $user['name'] ?>",
                        "email": "<?= $user['email'] ?>",
                        "contact": "<?= $user['phone'] ?>"
                    },
                    "notes": {
                        "address": "<?= $user['house_no']?>, <?= $user['locality'] ?>,<?= $user['city'] ?>"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                        window.location = 'http://localhost:8080/failure/'+response.error.description+'/'+respons.error.reason+'/'+response.error.payment_id
                });
                document.getElementById('rzp-button1').onclick = function(e){
                    rzp1.open();
                    e.preventDefault();
                }
                </script>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
