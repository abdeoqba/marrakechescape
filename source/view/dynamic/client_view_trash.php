<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "clients-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash Client";
  $admin = "client";

  $table_name = "client";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $c = new Client();
  $c->getAllDeletedClient($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: clients");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="clients" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Client
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($c->clients); ?></span></h2>
            <p>List of Deleted Client</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="clients" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Client
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="client_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="client_restore_all_set();" >
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

          <?php if(count($c->clients)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Client ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($c->clients as $client)
                include(variables::$root."/source/view/section/client_section_card.php");
                
              $page = $c->page;
              $nbr_pages = $c->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/client_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/client_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/client_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/client_section_modal_confirm_empty_trash.php"); ?>
    
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
  <form action="clients-export" method="post" id="export_form"></form>

  <script>

    //restore
    function client_restore_set(id_client,name){
      $("#client_restore_name").html(name);
      $("#client_restore_id_client").val(id_client);

      $(".client-"+id_client+" .list-group-item").addClass(card_hover_class);

      $("#ClientRestoreModal").modal("show");
    }

    function client_restore_submit(){
      $("#ClientRestoreModal form").submit();
    }

    function client_restore_dismiss(){
      $("#ClientRestoreModal").modal("hide");
    }

    //delete
    function client_delete_set(id_client,name){
      $("#client_delete_name").html(name);
      $("#client_delete_id_client").val(id_client);

      $(".client-"+id_client+" .list-group-item").addClass(card_hover_class);

      $("#ClientDeleteModal").modal("show");
    }

    function client_delete_submit(){
      $("#ClientDeleteModal form").submit();
    }

    function client_delete_dismiss(){
      $("#ClientDeleteModal").modal("hide");
    }

    //empty trash
    function client_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#ClientEmptyTrashModal").modal("show");
    }

    function client_empty_trash_submit(){
      $("#ClientEmptyTrashModal form").submit();
    }

    function client_empty_trash_dismiss(){
      $("#ClientEmptyTrashModal").modal("hide");
    }

    //restore all
    function client_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#ClientRestoreAllModal").modal("show");
    }

    function client_restore_all_submit(){
      $("#ClientRestoreAllModal form").submit();
    }

    function client_restore_all_dismiss(){
      $("#ClientRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>