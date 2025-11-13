<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "users";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "User";
  $admin = "cg_user";
  
  $table_name = "cg_user";
  $page_type = "list";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $c = new cg_user();
  $c->getAllUser($page_number);
  

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h2>List of User <span class="badge badge-primary badge-pill" style="font-size:11pt;"><?=count($c->users); ?></span></h2>
          </div>
          <div class="col-lg-6 col-md-6 text-right pb-3">

            <?php $nbr_btn = 1; ?>

            <!-- truncate -->
            <button type="button" class="btn btn-danger d-none" onclick="cg_user_truncate_set();" <?php 
            if(!$_SESSION[variables::$prefix."allow_truncate"]) echo "disabled";
            ?>>
              <i class="fa fa-trash-alt"></i> Truncate User
            </button>
            
            <!-- trash link -->
            <?php 
            if($_SESSION[variables::$prefix."allow_trash"]){
              $c->getNbrDeletedUser(); 
            ?>
            <a href="users-trash" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>">
              
              <i class="fa fa-trash-alt fa-lg"></i>
              
              <span class="hover-show">
                Trash
                <i class="fa fa-external-link-alt"></i>
              </span>
              
              <?php if($c->trash_counter!=0){ ?>
              <span class="badge badge-pill badge-light border border-danger text-center">
                <?= $c->trash_counter; ?>
              </span>
              <?php } ?>

            </a>
            <?php   $nbr_btn++; ?>
            <?php } ?>
            
            <!-- add new row -->
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>" data-toggle="modal" data-target="#UserAddModal">
              <i class="fa fa-plus fa-lg"></i>
              <span class="hover-show">
                Add User
              </span>
            </button>
            <?php   $nbr_btn++; ?>
            <?php } ?>

            <!-- go top -->
            <a href="#top" class="btn btn-secondary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-chevron-up fa-lg"></i>
              <span class="hover-show">
                Go Up
              </span>
            </a>

          </div>

          <?php if(count($c->users)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no User ...
          </div>
          <?php 

            }else{
              foreach ($c->users as $cg_user)
                include(variables::$root."/source/view/section/cg_user_section_card.php");
              
              $page = $c->page;
              $nbr_pages = $c->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            } 
            
            ?>

    <?php include(variables::$root."/source/view/modal/cg_user_section_modal_form_add.php"); ?>
    <?php include(variables::$root."/source/view/modal/cg_user_section_modal_form_update.php"); ?>
    <?php include(variables::$root."/source/view/modal/cg_user_section_modal_confirm_move_to_trash.php"); ?>
    <?php include(variables::$root."/source/view/modal/cg_user_section_modal_confirm_truncate.php"); ?>

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
  <form action="users-export" method="post" id="export_form"></form>

  <script>

    <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
    //add
    function cg_user_add_submit(){
      $("#UserAddModal form").submit();
    }

    //update
    function cg_user_update_set(id_user,username,password,role,active,allow_trash,allow_truncate,allow_read_history,allow_edit,allow_manage){
      //code
      
      $("#cg_user_update_id_user").val(id_user);
      
      $("#cg_user_update_username").val(username);
      
      $("#cg_user_update_password").val(password);
      
      $("#cg_user_update_role").val(role);
      
      $("#cg_user_update_active").prop("checked", active);
      check_cg_user_update_active();
      
      $("#cg_user_update_allow_trash").prop("checked", allow_trash);
      check_cg_user_update_allow_trash();
      
      $("#cg_user_update_allow_truncate").prop("checked", allow_truncate);
      check_cg_user_update_allow_truncate();
      
      $("#cg_user_update_allow_read_history").prop("checked", allow_read_history);
      check_cg_user_update_allow_read_history();
      
      $("#cg_user_update_allow_edit").prop("checked", allow_edit);
      check_cg_user_update_allow_edit();
      
      $("#cg_user_update_allow_manage").prop("checked", allow_manage);
      check_cg_user_update_allow_manage();
      $(".cg_user-"+id_user+" .list-group-item").addClass(card_hover_class);

      $("#UserUpdateModal").modal("show");
    }

    function cg_user_update_submit(){
      $("#UserUpdateModal form").submit();
    }

    function cg_user_update_dismiss(){
      $("#UserUpdateModal").modal("hide");
    }

    //delete = move to trash
    function cg_user_move_to_trash_set(id_user,username){
      $("#cg_user_move_to_trash_username").html(username);
      $("#cg_user_move_to_trash_id_user").val(id_user);

      $(".cg_user-"+id_user+" .list-group-item").addClass(card_hover_class);

      $("#UserMoveToTrashModal").modal("show");
    }

    function cg_user_move_to_trash_submit(){
      $("#UserMoveToTrashModal form").submit();
    }

    function cg_user_move_to_trash_dismiss(){
      $("#UserMoveToTrashModal").modal("hide");
    }
    <?php if(($_SESSION[variables::$prefix."allow_truncate"])){ ?>
    
    //truncate
    function cg_user_truncate_set(){
      //code
      $(".list-group-item").addClass("list-group-item-secondary");
      $("#UserTruncateModal").modal("show");
    }

    function cg_user_truncate_submit(){
      $("#UserTruncateModal form").submit();
    }

    function cg_user_truncate_dismiss(){
      $("#UserTruncateModal").modal("hide");
    }

    <?php }//end of allow truncute ?>

    <?php }//end of allow edit ?>
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>