<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "images-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash Image";
  $admin = "image";

  $table_name = "image";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $i = new Image();
  $i->getAllDeletedImage($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: images");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="images" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Image
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($i->images); ?></span></h2>
            <p>List of Deleted Image</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="images" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Image
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="image_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="image_restore_all_set();" >
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

          <?php if(count($i->images)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Image ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($i->images as $image)
                include(variables::$root."/source/view/section/image_section_card.php");
                
              $page = $i->page;
              $nbr_pages = $i->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/image_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/image_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/image_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/image_section_modal_confirm_empty_trash.php"); ?>
    
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true" class="toast-container">
  <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;">
    <?php 

    $i->getAlert();
    $toast = $i->toast;

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
  <form action="images-export" method="post" id="export_form"></form>

  <script>

    //restore
    function image_restore_set(id_image,name){
      $("#image_restore_name").html(name);
      $("#image_restore_id_image").val(id_image);

      $(".image-"+id_image+" .list-group-item").addClass(card_hover_class);

      $("#ImageRestoreModal").modal("show");
    }

    function image_restore_submit(){
      $("#ImageRestoreModal form").submit();
    }

    function image_restore_dismiss(){
      $("#ImageRestoreModal").modal("hide");
    }

    //delete
    function image_delete_set(id_image,name){
      $("#image_delete_name").html(name);
      $("#image_delete_id_image").val(id_image);

      $(".image-"+id_image+" .list-group-item").addClass(card_hover_class);

      $("#ImageDeleteModal").modal("show");
    }

    function image_delete_submit(){
      $("#ImageDeleteModal form").submit();
    }

    function image_delete_dismiss(){
      $("#ImageDeleteModal").modal("hide");
    }

    //empty trash
    function image_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#ImageEmptyTrashModal").modal("show");
    }

    function image_empty_trash_submit(){
      $("#ImageEmptyTrashModal form").submit();
    }

    function image_empty_trash_dismiss(){
      $("#ImageEmptyTrashModal").modal("hide");
    }

    //restore all
    function image_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#ImageRestoreAllModal").modal("show");
    }

    function image_restore_all_submit(){
      $("#ImageRestoreAllModal form").submit();
    }

    function image_restore_all_dismiss(){
      $("#ImageRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>