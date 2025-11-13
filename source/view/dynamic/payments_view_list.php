<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "paymentss";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Payments";
  $admin = "payments";
  
  $table_name = "payments";
  $page_type = "list";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new Payments();
  $p->getAllPayments($page_number);
  

  $bookings_ = new Bookings();
  $bookings_->getAllBookings();
  $nbr_bookingss = count($bookings_->bookingss);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h2>List of Payments <span class="badge badge-primary badge-pill" style="font-size:11pt;"><?=count($p->paymentss); ?></span></h2>
          </div>
          <div class="col-lg-6 col-md-6 text-right pb-3">

            <?php $nbr_btn = 1; ?>

            <!-- truncate -->
            <button type="button" class="btn btn-danger d-none" onclick="payments_truncate_set();" <?php 
            if(!$_SESSION[variables::$prefix."allow_truncate"]) echo "disabled";
            ?>>
              <i class="fa fa-trash-alt"></i> Truncate Payments
            </button>
            
            <!-- trash link -->
            <?php 
            if($_SESSION[variables::$prefix."allow_trash"]){
              $p->getNbrDeletedPayments(); 
            ?>
            <a href="paymentss-trash" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>">
              
              <i class="fa fa-trash-alt fa-lg"></i>
              
              <span class="hover-show">
                Trash
                <i class="fa fa-external-link-alt"></i>
              </span>
              
              <?php if($p->trash_counter!=0){ ?>
              <span class="badge badge-pill badge-light border border-danger text-center">
                <?= $p->trash_counter; ?>
              </span>
              <?php } ?>

            </a>
            <?php   $nbr_btn++; ?>
            <?php } ?>
            
            <!-- add new row -->
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>" data-toggle="modal" data-target="#PaymentsAddModal">
              <i class="fa fa-plus fa-lg"></i>
              <span class="hover-show">
                Add Payments
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

          <?php if(count($p->paymentss)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Payments ...
          </div>
          <?php 

            }else{
              foreach ($p->paymentss as $payments)
                include(variables::$root."/source/view/section/payments_section_card.php");
              
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            } 
            
            ?>

    <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>

      <?php include(variables::$root."/source/view/modal/payments_section_modal_form_add.php"); ?>
      <?php include(variables::$root."/source/view/modal/payments_section_modal_form_update.php"); ?>
      <?php include(variables::$root."/source/view/modal/payments_section_modal_confirm_move_to_trash.php"); ?>
      
      <?php if(($_SESSION[variables::$prefix."allow_truncate"])){ ?>
        <?php include(variables::$root."/source/view/modal/payments_section_modal_confirm_truncate.php"); ?>
      <?php }//end of allow truncute ?>

    <?php }//end of allow edit ?>


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


    </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>