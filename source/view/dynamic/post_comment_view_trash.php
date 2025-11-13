<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "post_comments-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash PostComment";
  $admin = "post_comment";

  $table_name = "post_comment";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new PostComment();
  $p->getAllDeletedPostComment($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: post_comments");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="post_comments" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Post Comment
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($p->post_comments); ?></span></h2>
            <p>List of Deleted Post Comment</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="post_comments" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Post Comment
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="post_comment_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="post_comment_restore_all_set();" >
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

          <?php if(count($p->post_comments)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Post Comment ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($p->post_comments as $post_comment)
                include(variables::$root."/source/view/section/post_comment_section_card.php");
                
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/post_comment_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_comment_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_comment_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/post_comment_section_modal_confirm_empty_trash.php"); ?>
    
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
  <form action="post_comments-export" method="post" id="export_form"></form>

  <script>

    //restore
    function post_comment_restore_set(id_post_comment,name){
      $("#post_comment_restore_name").html(name);
      $("#post_comment_restore_id_post_comment").val(id_post_comment);

      $(".post_comment-"+id_post_comment+" .list-group-item").addClass(card_hover_class);

      $("#PostCommentRestoreModal").modal("show");
    }

    function post_comment_restore_submit(){
      $("#PostCommentRestoreModal form").submit();
    }

    function post_comment_restore_dismiss(){
      $("#PostCommentRestoreModal").modal("hide");
    }

    //delete
    function post_comment_delete_set(id_post_comment,name){
      $("#post_comment_delete_name").html(name);
      $("#post_comment_delete_id_post_comment").val(id_post_comment);

      $(".post_comment-"+id_post_comment+" .list-group-item").addClass(card_hover_class);

      $("#PostCommentDeleteModal").modal("show");
    }

    function post_comment_delete_submit(){
      $("#PostCommentDeleteModal form").submit();
    }

    function post_comment_delete_dismiss(){
      $("#PostCommentDeleteModal").modal("hide");
    }

    //empty trash
    function post_comment_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#PostCommentEmptyTrashModal").modal("show");
    }

    function post_comment_empty_trash_submit(){
      $("#PostCommentEmptyTrashModal form").submit();
    }

    function post_comment_empty_trash_dismiss(){
      $("#PostCommentEmptyTrashModal").modal("hide");
    }

    //restore all
    function post_comment_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#PostCommentRestoreAllModal").modal("show");
    }

    function post_comment_restore_all_submit(){
      $("#PostCommentRestoreAllModal form").submit();
    }

    function post_comment_restore_all_dismiss(){
      $("#PostCommentRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>