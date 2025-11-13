<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "paymentss-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash Payments";
  $admin = "payments";

  $table_name = "payments";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new Payments();
  $p->getAllDeletedPayments($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: paymentss");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="paymentss" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Payments
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($p->paymentss); ?></span></h2>
            <p>List of Deleted Payments</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="paymentss" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Payments
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="payments_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="payments_restore_all_set();" >
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

          <?php if(count($p->paymentss)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Payments ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($p->paymentss as $payments)
                include(variables::$root."/source/view/section/payments_section_card.php");
                
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/payments_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/payments_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/payments_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/payments_section_modal_confirm_empty_trash.php"); ?>
    
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
  <form action="paymentss-export" method="post" id="export_form"></form>

  <script>

    //restore
    function payments_restore_set(id_payments,name){
      $("#payments_restore_name").html(name);
      $("#payments_restore_id_payments").val(id_payments);

      $(".payments-"+id_payments+" .list-group-item").addClass(card_hover_class);

      $("#PaymentsRestoreModal").modal("show");
    }

    function payments_restore_submit(){
      $("#PaymentsRestoreModal form").submit();
    }

    function payments_restore_dismiss(){
      $("#PaymentsRestoreModal").modal("hide");
    }

    //delete
    function payments_delete_set(id_payments,name){
      $("#payments_delete_name").html(name);
      $("#payments_delete_id_payments").val(id_payments);

      $(".payments-"+id_payments+" .list-group-item").addClass(card_hover_class);

      $("#PaymentsDeleteModal").modal("show");
    }

    function payments_delete_submit(){
      $("#PaymentsDeleteModal form").submit();
    }

    function payments_delete_dismiss(){
      $("#PaymentsDeleteModal").modal("hide");
    }

    //empty trash
    function payments_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#PaymentsEmptyTrashModal").modal("show");
    }

    function payments_empty_trash_submit(){
      $("#PaymentsEmptyTrashModal form").submit();
    }

    function payments_empty_trash_dismiss(){
      $("#PaymentsEmptyTrashModal").modal("hide");
    }

    //restore all
    function payments_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#PaymentsRestoreAllModal").modal("show");
    }

    function payments_restore_all_submit(){
      $("#PaymentsRestoreAllModal form").submit();
    }

    function payments_restore_all_dismiss(){
      $("#PaymentsRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>