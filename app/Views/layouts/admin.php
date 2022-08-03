<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>
  </head>
  <body>
      <header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/admin/dashboard" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
              <h3>Admin Dashboard</h3>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
              <?php
                $session = \Config\Services::session();
                if($session->get('adminLogin') == true){
              ?>
            <li>
              <a href="/admin/dashboard" class="nav-link text-white">
                <i class="bi d-block mx-auto mb-1 fa-solid fa-gauge"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a href="/admin/logout" class="nav-link text-white">
                <i class="bi d-block mx-auto mb-1 fa-solid fa-right-from-bracket"></i>
                Logout
              </a>
            </li>
                <?php }else{ ?>
                    <li>
                        <a href="/admin/login" class="nav-link text-white">
                          <i class="bi d-block mx-auto mb-1 fa-solid fa-circle-user"></i>
                          login
                        </a>
                     </li>
                <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </header>
      
    <?= $this->renderSection('content'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>