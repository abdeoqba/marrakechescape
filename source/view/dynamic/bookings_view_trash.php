<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "bookingss-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash Bookings";
  $admin = "bookings";

  $table_name = "bookings";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $b = new Bookings();
  $b->getAllDeletedBookings($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: bookingss");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="bookingss" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Bookings
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($b->bookingss); ?></span></h2>
            <p>List of Deleted Bookings</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="bookingss" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Bookings
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="bookings_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="bookings_restore_all_set();" >
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

          <?php if(count($b->bookingss)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Bookings ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($b->bookingss as $bookings)
                include(variables::$root."/source/view/section/bookings_section_card.php");
                
              $page = $b->page;
              $nbr_pages = $b->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/bookings_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/bookings_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/bookings_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/bookings_section_modal_confirm_empty_trash.php"); ?>
    
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true" class="toast-container">
  <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;">
    <?php 

    $b->getAlert();
    $toast = $b->toast;

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
  <form action="bookingss-export" method="post" id="export_form"></form>

  <script>

    //restore
    function bookings_restore_set(id_bookings,name){
      $("#bookings_restore_name").html(name);
      $("#bookings_restore_id_bookings").val(id_bookings);

      $(".bookings-"+id_bookings+" .list-group-item").addClass(card_hover_class);

      $("#BookingsRestoreModal").modal("show");
    }

    function bookings_restore_submit(){
      $("#BookingsRestoreModal form").submit();
    }

    function bookings_restore_dismiss(){
      $("#BookingsRestoreModal").modal("hide");
    }

    //delete
    function bookings_delete_set(id_bookings,name){
      $("#bookings_delete_name").html(name);
      $("#bookings_delete_id_bookings").val(id_bookings);

      $(".bookings-"+id_bookings+" .list-group-item").addClass(card_hover_class);

      $("#BookingsDeleteModal").modal("show");
    }

    function bookings_delete_submit(){
      $("#BookingsDeleteModal form").submit();
    }

    function bookings_delete_dismiss(){
      $("#BookingsDeleteModal").modal("hide");
    }

    //empty trash
    function bookings_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#BookingsEmptyTrashModal").modal("show");
    }

    function bookings_empty_trash_submit(){
      $("#BookingsEmptyTrashModal form").submit();
    }

    function bookings_empty_trash_dismiss(){
      $("#BookingsEmptyTrashModal").modal("hide");
    }

    //restore all
    function bookings_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#BookingsRestoreAllModal").modal("show");
    }

    function bookings_restore_all_submit(){
      $("#BookingsRestoreAllModal form").submit();
    }

    function bookings_restore_all_dismiss(){
      $("#BookingsRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>