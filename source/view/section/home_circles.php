    <div class="row text-center mt-5">
      <div class="col-lg-8 offset-lg-2">
        <div class="row quick-link">
          
          <div class="col-lg-2 col-md-4 col-sm-4 col-4 mt-3">
            <a href="change-password" class="btn btn-lg btn-primary text-center rounded-circle">
              <i class="fa fa-unlock-alt fa-lg"></i><br>
            </a>
            <p class="text-primary font-weight-bold">Change Password</p>
          </div>

          <?php if($_SESSION[variables::$prefix."allow_truncate"]){ ?>
          <div class="col-lg-2 col-md-4 col-sm-4 col-4 mt-3">
            <a href="#" class="btn btn-lg btn-secondary text-center rounded-circle">
              <i class="fa fa-database fa-lg"></i><br>
            </a>
            <p class="text-secondary font-weight-bold">Resete Data</p>
          </div>
          <?php } ?>

          <?php if($_SESSION[variables::$prefix."role"] == "admin"){ ?>
          <div class="col-lg-2 col-md-4 col-sm-4 col-4 mt-3">
            <a href="users" class="btn btn-lg btn-info text-center rounded-circle">
              <i class="fa fa-users-cog fa-lg"></i><br>
            </a>
            <p class="text-info font-weight-bold">Manage Users</p>
          </div>
          <?php } ?>

          <div class="col-lg-2 col-md-4 col-sm-4 col-4 mt-3">
            <a href="edit-profile" class="btn btn-lg btn-success text-center rounded-circle">
              <i class="fa fa-user-cog fa-lg"></i><br>
            </a>
            <p class="text-success font-weight-bold">Edit Profile</p>
          </div>

          <?php if($_SESSION[variables::$prefix."allow_read_history"]){ ?>
          <div class="col-lg-2 col-md-4 col-sm-4 col-4 mt-3">
            <a href="history" class="btn btn-lg btn-warning text-center rounded-circle">
              <i class="fa fa-history fa-lg"></i><br>
            </a>
            <p class="text-warning font-weight-bold">History</p>
          </div>
          <?php } ?>

          <div class="col-lg-2 col-md-4 col-sm-4 col-4 mt-3">
            <a href="logout" class="btn btn-lg btn-danger text-center rounded-circle">
              <i class="fa fa-power-off fa-lg"></i><br>
            </a>
            <p class="text-danger font-weight-bold">Logout</p>
          </div>

        </div>
      </div>
    </div>