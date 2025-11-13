<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "categorys-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash Category";
  $admin = "category";

  $table_name = "category";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $c = new Category();
  $c->getAllDeletedCategory($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: categorys");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="categorys" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Category
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($c->categorys); ?></span></h2>
            <p>List of Deleted Category</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="categorys" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Category
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="category_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="category_restore_all_set();" >
              <i class="fa fa-chevron-circle-up fa-lg"></i> 
              <span class="hover-show">Restore All</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <a href="#top" class="btn btn-secondary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-chevron-up fa-lg"></i>
              <span class="hover-show">
                Go Up
              </span>
            </a>

          </div> 

          <?php if(count($c->categorys)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Category ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($c->categorys as $category)
                include(variables::$root."/source/view/section/category_section_card.php");
                
              $page = $c->page;
              $nbr_pages = $c->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/category_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/category_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/category_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/category_section_modal_confirm_empty_trash.php"); ?>
    
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true" class="toast-container">
  <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;">
    <?php 

    $c->getAlert();
    $toast = $c->toast;

    if($toast->is_fresh){
    ?>
      <div class="toast <?=$toast->class; ?> mr-3" data-delay="5000" style="width: 300px;">
        <div class="toast-header text-success">
          <i class="fa fa-lg fa-info-circle mr-2"></i>
          <strong class="mr-auto text-capitalize"><?=$toast->title; ?></strong>
          <small><?=$toast->nbr_sec; ?></small>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
          <?=$toast->message; ?>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
  <form action="categorys-export" method="post" id="export_form"></form>

  <script>

    //restore
    function category_restore_set(id_category,name){
      $("#category_restore_name").html(name);
      $("#category_restore_id_category").val(id_category);

      $(".category-"+id_category+" .list-group-item").addClass(card_hover_class);

      $("#CategoryRestoreModal").modal("show");
    }

    function category_restore_submit(){
      $("#CategoryRestoreModal form").submit();
    }

    function category_restore_dismiss(){
      $("#CategoryRestoreModal").modal("hide");
    }

    //delete
    function category_delete_set(id_category,name){
      $("#category_delete_name").html(name);
      $("#category_delete_id_category").val(id_category);

      $(".category-"+id_category+" .list-group-item").addClass(card_hover_class);

      $("#CategoryDeleteModal").modal("show");
    }

    function category_delete_submit(){
      $("#CategoryDeleteModal form").submit();
    }

    function category_delete_dismiss(){
      $("#CategoryDeleteModal").modal("hide");
    }

    //empty trash
    function category_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#CategoryEmptyTrashModal").modal("show");
    }

    function category_empty_trash_submit(){
      $("#CategoryEmptyTrashModal form").submit();
    }

    function category_empty_trash_dismiss(){
      $("#CategoryEmptyTrashModal").modal("hide");
    }

    //restore all
    function category_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#CategoryRestoreAllModal").modal("show");
    }

    function category_restore_all_submit(){
      $("#CategoryRestoreAllModal form").submit();
    }

    function category_restore_all_dismiss(){
      $("#CategoryRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>