<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "post_translations-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash PostTranslation";
  $admin = "post_translation";

  $table_name = "post_translation";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new PostTranslation();
  $p->getAllDeletedPostTranslation($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: post_translations");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="post_translations" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Post Translation
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($p->post_translations); ?></span></h2>
            <p>List of Deleted Post Translation</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="post_translations" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Post Translation
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="post_translation_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="post_translation_restore_all_set();" >
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

          <?php if(count($p->post_translations)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Post Translation ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($p->post_translations as $post_translation)
                include(variables::$root."/source/view/section/post_translation_section_card.php");
                
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/post_translation_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_translation_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_translation_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_translation_section_modal_confirm_empty_trash.php"); ?>
    
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true" class="toast-container">
  <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;">
    <?php 

    $p->getAlert();
    $toast = $p->toast;

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
  <form action="post_translations-export" method="post" id="export_form"></form>

  <script>

    //restore
    function post_translation_restore_set(id_post_translation,name){
      $("#post_translation_restore_name").html(name);
      $("#post_translation_restore_id_post_translation").val(id_post_translation);

      $(".post_translation-"+id_post_translation+" .list-group-item").addClass(card_hover_class);

      $("#PostTranslationRestoreModal").modal("show");
    }

    function post_translation_restore_submit(){
      $("#PostTranslationRestoreModal form").submit();
    }

    function post_translation_restore_dismiss(){
      $("#PostTranslationRestoreModal").modal("hide");
    }

    //delete
    function post_translation_delete_set(id_post_translation,name){
      $("#post_translation_delete_name").html(name);
      $("#post_translation_delete_id_post_translation").val(id_post_translation);

      $(".post_translation-"+id_post_translation+" .list-group-item").addClass(card_hover_class);

      $("#PostTranslationDeleteModal").modal("show");
    }

    function post_translation_delete_submit(){
      $("#PostTranslationDeleteModal form").submit();
    }

    function post_translation_delete_dismiss(){
      $("#PostTranslationDeleteModal").modal("hide");
    }

    //empty trash
    function post_translation_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#PostTranslationEmptyTrashModal").modal("show");
    }

    function post_translation_empty_trash_submit(){
      $("#PostTranslationEmptyTrashModal form").submit();
    }

    function post_translation_empty_trash_dismiss(){
      $("#PostTranslationEmptyTrashModal").modal("hide");
    }

    //restore all
    function post_translation_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#PostTranslationRestoreAllModal").modal("show");
    }

    function post_translation_restore_all_submit(){
      $("#PostTranslationRestoreAllModal form").submit();
    }

    function post_translation_restore_all_dismiss(){
      $("#PostTranslationRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>