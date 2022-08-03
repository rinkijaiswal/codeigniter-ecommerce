<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&family=IBM+Plex+Sans+Thai+Looped:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BookWorld</title>
  </head>
  <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="<?= base_url().'/logo.png' ?>" class="bi me-2" width="150" height="80" />
              </a>

              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="<?= base_url('/about') ?>" class="nav-link px-2 link-dark">About</a></li>
                <li><a href="<?= base_url('/contact') ?>" class="nav-link px-2 link-dark">Contact</a></li>
              </ul>

              <div class="col-md-3 text-end">  
                    <?php
                        $session = \Config\Services::session();
                        use App\Models\CartModel;
                        $model = new CartModel();
                        $email = $session->get('user_email');
                        $count = $model->getCount($email);
                        if($session->get('isLoggedIn') != true){   
                    ?>
                    <a href="/user/login" class="btn btn-outline-primary me-2">Login</a>
                    <a href="/user/signup" class="btn btn-primary">Signup</a>
                    <?php }else{ ?>
                        <a class="btn btn-warning" style="text-decoration: none;color:white" href="<?= base_url('/cart') ?>">
                            <i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Cart&nbsp;&nbsp;<?= $count ?>
                        </a>
                        <a href="/user" class="btn btn-primary">User</a>
                        <a href="/user/logout" class="btn btn-outline-danger">Logout</a>
                    <?php } ?>
              </div>
            </header>
          </div>
      
    <?= $this->renderSection('content'); ?>
      
      <div class="container-fluid" style="background-color: #eeeeee">
        <footer class="container d-flex flex-wrap justify-content-between align-items-center py-3">
          <div class="col-md-4 d-flex align-items-center">
            <span class="text-muted">&copy; 2021 Company, Inc</span>
          </div>

          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter fa-2x"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram fa-2x"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook fa-2x"></i></a></li>
          </ul>
        </footer>
      </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>