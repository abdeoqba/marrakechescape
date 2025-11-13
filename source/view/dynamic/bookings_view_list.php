<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "bookingss";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Bookings";
  $admin = "bookings";
  
  $table_name = "bookings";
  $page_type = "list";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $b = new Bookings();
  $b->getAllBookings($page_number);
  

  $client_ = new Client();
  $client_->getAllClient();
  $nbr_clients = count($client_->clients);

  $program_ = new Program();
  $program_->getAllProgram();
  $nbr_programs = count($program_->programs);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h2>List of Bookings <span class="badge badge-primary badge-pill" style="font-size:11pt;"><?=count($b->bookingss); ?></span></h2>
          </div>
          <div class="col-lg-6 col-md-6 text-right pb-3">

            <?php $nbr_btn = 1; ?>

            <!-- truncate -->
            <button type="button" class="btn btn-danger d-none" onclick="bookings_truncate_set();" <?php 
            if(!$_SESSION[variables::$prefix."allow_truncate"]) echo "disabled";
            ?>>
              <i class="fa fa-trash-alt"></i> Truncate Bookings
            </button>
            
            <!-- trash link -->
            <?php 
            if($_SESSION[variables::$prefix."allow_trash"]){
              $b->getNbrDeletedBookings(); 
            ?>
            <a href="bookingss-trash" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>">
              
              <i class="fa fa-trash-alt fa-lg"></i>
              
              <span class="hover-show">
                Trash
                <i class="fa fa-external-link-alt"></i>
              </span>
              
              <?php if($b->trash_counter!=0){ ?>
              <span class="badge badge-pill badge-light border border-danger text-center">
                <?= $b->trash_counter; ?>
              </span>
              <?php } ?>

            </a>
            <?php   $nbr_btn++; ?>
            <?php } ?>
            
            <!-- add new row -->
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>" data-toggle="modal" data-target="#BookingsAddModal">
              <i class="fa fa-plus fa-lg"></i>
              <span class="hover-show">
                Add Bookings
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

          <?php if(count($b->bookingss)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Bookings ...
          </div>
          <?php 

            }else{
              foreach ($b->bookingss as $bookings)
                include(variables::$root."/source/view/section/bookings_section_card.php");
              
              $page = $b->page;
              $nbr_pages = $b->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            } 
            
            ?>

    <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>

      <?php include(variables::$root."/source/view/modal/bookings_section_modal_form_add.php"); ?>
      <?php include(variables::$root."/source/view/modal/bookings_section_modal_form_update.php"); ?>
      <?php include(variables::$root."/source/view/modal/bookings_section_modal_confirm_move_to_trash.php"); ?>
      
      <?php if(($_SESSION[variables::$prefix."allow_truncate"])){ ?>
        <?php include(variables::$root."/source/view/modal/bookings_section_modal_confirm_truncate.php"); ?>
      <?php }//end of allow truncute ?>

    <?php }//end of allow edit ?>


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


    </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>