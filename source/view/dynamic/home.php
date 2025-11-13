<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  include("../../init.php");
  variables::cd(1);

  $title_head = variables::$project_name;
  $admin = "home";

  $home = new Home();

  $css = "
  .quick-link .btn {
    width:80px;
    height:80px;
    padding-top:24px;
    margin-bottom:5px;
  }";

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid pt-lg-5 pb-5">
        <div class="row">
          <div class="col-lg-12 col-md-6 mb-3">
            <h2>Dashboard</h2>
          </div>

          <div class="col-lg-12 mb-5">
            <i class="fa fa-calendar"></i> <?=date('l j F Y'); ?> - Semaine <?=date('W'); ?>
          </div>

          <div class="col-lg-3 mb-5 d-none">
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center">
                devis en cours
                <span class="badge badge-primary badge-pill">14</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center">
                devis echus
                <span class="badge badge-danger badge-pill">2</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center">
                facture en cours
                <span class="badge badge-primary badge-pill">1</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center">
                facture echues
                <span class="badge badge-danger badge-pill">1</span>
              </a>
            </div>
          </div>
          
          <div class="col-lg-4 d-none">
            <i class="fa fa-file"></i> dernires documents utilises:
            <table class="table table-striped table-hover table-bordered mt-3">
              <thead>
                <tr>
                  <th></th>
                  <th width="70%"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <?php foreach ($home->tables as $key => $table) { ?>
          <?php if(!($_SESSION[variables::$prefix."role"] != "admin" and $table["Name"] == 'User')){ ?>
          <div class="col-lg-4 text-center py-3">

            <div class="card">
              <div class="card-header h3">
                <?=$table["Name"]; ?>
              </div>
              <ul class="list-group list-group-flush">
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>
                    <i class="fa fa-list"></i>
                    <?=$table["Name"]; ?>s Number
                  </span>
                  <span class="badge badge-primary badge-pill"><?=$table["counter"]; ?></span>
                </li>
                
                <?php if($_SESSION[variables::$prefix."allow_trash"]){?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>
                    <i class="fa fa-trash"></i>
                    <?=$table["Name"]; ?>s Number in Trash 
                  </span>
                  <span class="badge badge-danger badge-pill"><?=$table["trash_counter"]; ?></span>
                </li>
                <?php } ?>

                <?php if($_SESSION[variables::$prefix."allow_edit"] or $_SESSION[variables::$prefix."allow_trash"]){ ?>
                <li class="list-group-item pt-0">

                  <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>

                  <div class="btn-group mt-2">
                    <a href="<?=$table["url"]; ?>" class="btn btn-success">
                      <i class="fa fa-sliders-h"></i> Manage
                    </a>
                    <?php if(!$table["has_fk"]){ ?>
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#<?=$table["Name"]; ?>AddModal">
                        <i class="fa fa-plus"></i> Add New <?=$table["Name"]; ?>
                      </a>
                    </div>
                    <?php } ?>
                  </div>
                  <?php } ?>
                  
                  <?php if($_SESSION[variables::$prefix."allow_trash"]){?>
                  <a href="<?=$table["url"]; ?>-trash" class="btn btn-danger mt-2">
                    <i class="fa fa-trash"></i> Trash
                  </a>
                  <?php } ?>

                  <form action="<?=$table["url"]; ?>-export" method="post" class="d-inline">
                    <button type="submit" class="btn btn-secondary mt-2" ><i class="fa fa-database"></i> Export</button>
                  </form>

                </li>
                <?php } ?>
              </ul>
            </div>
          </div>

          <?php include(variables::$root."/source/view/modal/". $table["name"] ."_section_modal_form_add.php"); ?>
          <script>    //add
          function <?=strtolower($table["Name"]) ?>_add_submit(){
            $("#<?=$table["Name"] ?>AddModal form").submit();
          }</script>

          <?php } ?>
          <?php } ?>

    </div>

    <?php include(variables::$root."/source/view/section/home_circles.php"); ?>

  </div>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>