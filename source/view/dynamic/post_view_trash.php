<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "posts-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash Post";
  $admin = "post";

  $table_name = "post";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new Post();
  $p->getAllDeletedPost($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: posts");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="posts" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Post
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($p->posts); ?></span></h2>
            <p>List of Deleted Post</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="posts" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Post
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="post_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="post_restore_all_set();" >
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

          <?php if(count($p->posts)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Post ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($p->posts as $post)
                include(variables::$root."/source/view/section/post_section_card.php");
                
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/post_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_section_modal_confirm_empty_trash.php"); ?>
    
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
  <form action="posts-export" method="post" id="export_form"></form>

  <script>

    //restore
    function post_restore_set(id_post,name){
      $("#post_restore_name").html(name);
      $("#post_restore_id_post").val(id_post);

      $(".post-"+id_post+" .list-group-item").addClass(card_hover_class);

      $("#PostRestoreModal").modal("show");
    }

    function post_restore_submit(){
      $("#PostRestoreModal form").submit();
    }

    function post_restore_dismiss(){
      $("#PostRestoreModal").modal("hide");
    }

    //delete
    function post_delete_set(id_post,name){
      $("#post_delete_name").html(name);
      $("#post_delete_id_post").val(id_post);

      $(".post-"+id_post+" .list-group-item").addClass(card_hover_class);

      $("#PostDeleteModal").modal("show");
    }

    function post_delete_submit(){
      $("#PostDeleteModal form").submit();
    }

    function post_delete_dismiss(){
      $("#PostDeleteModal").modal("hide");
    }

    //empty trash
    function post_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#PostEmptyTrashModal").modal("show");
    }

    function post_empty_trash_submit(){
      $("#PostEmptyTrashModal form").submit();
    }

    function post_empty_trash_dismiss(){
      $("#PostEmptyTrashModal").modal("hide");
    }

    //restore all
    function post_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#PostRestoreAllModal").modal("show");
    }

    function post_restore_all_submit(){
      $("#PostRestoreAllModal form").submit();
    }

    function post_restore_all_dismiss(){
      $("#PostRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>