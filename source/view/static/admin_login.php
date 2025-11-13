<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
  <title>Connection</title>
  <?php

    $need_class = false;
    $need_auth = false;
    $need_db = true;

    $url = 'login';
    $keywords = '';
    $title = 'Login';
    $description = '';
    $image = '';

    $title_head = 'Login';
    $admin = 'login';

    include('../../init.php');

    variables::cd(1);
    include(variables::$root.'/source/view/section/head.php');
    
  ?>

    <!-- Custom styles for this template -->
    <link href="<?= variables::$css; ?>login.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 offset-lg-4 mt-lg-5 pt-lg-5 
        col-md-6 offset-md-3 mt-md-5 pt-md-5
        col-sm-8 offset-sm-2 mt-sm-0 pt-sm-0"> 

          <div class="card card-container rounded">
              <?php 
                $cn = new GestionConnexion(); 
                $db_is_exist = $cn->check_if_db_exist();
                if(!$db_is_exist){
              ?>

              <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Database is Missing!</h4>
                <p>
                  the database is not exist yet. to fix this issu you just need to click link bellow, It's one time execution! 
                </p>
                <p>
                  <a href="create-database" class="alert-link">Execute SQL</a>
                </p>
              </div>

              <?php } ?>
              <div class="" style="font-size: 50pt;">
                <div class="bg-info rounded-circle text-center" style="width: 100px;height: 100px; padding: 8px; margin: auto;">
                  <i class="fa fa-user fa-lg text-white" ></i>
                </div>
              </div>
              <form id="form_signin" class="form-signin form-group" action="config" method="POST">
                  
                  <label for="inputusername">
                    <i class="fa fa-user text-info"></i>
                    <span class="text-info">Username</span>
                    <span class="small text-muted">
                      default value: user1
                    </span>
                  </label>
                  <input type="text" class="form-control" id="inputusername" name="inputEmail" required >

                  <label for="inputPassword" class="mt-3">
                    <i class="fa fa-lock text-info"></i>
                    <span class="text-info">Password</span>
                    <span class="small text-muted">default value: 12345678</span>
                  </label>
                  
                  <input type="password" class="form-control" id="inputPassword" name="inputPassword" required >

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember_me">
                    <label class="custom-control-label text-secondary" for="remember_me">Remember me</label>
                  </div>

                  <!-- <input type="submit" value="Login" class="btn btn-lg btn-secondary btn-block mt-3" /> -->
                  <button type="button" class="btn btn-lg btn-info btn-block my-3" id="btn_login" <?php if(!$db_is_exist) echo "disabled"; ?>>
                    <i class="fa fa-sign-in-alt"></i>
                    Login
                  </button>
                  <div class="text-center">
                    
                    <a href="#"class="text-info">
                      <i class="fa fa-key"></i>
                      Forget password</a>
                    <span class="mx-2 d-inline-block text-secondary">&bull;</span>
                    <a href="#" class="text-info">
                      <i class="far fa-plus-square"></i>
                      Create new account
                    </a>
                  </div>
              </form>
          </div>
      
        </div>
      </div>
    </div>
    <script>
    $("#btn_login").on("click", function(){
      $("#form_signin").submit();
    });
    </script>
  </body>
</html>
