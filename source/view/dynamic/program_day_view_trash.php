<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "program_days-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash ProgramDay";
  $admin = "program_day";

  $table_name = "program_day";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new ProgramDay();
  $p->getAllDeletedProgramDay($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: program_days");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="program_days" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Program Day
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($p->program_days); ?></span></h2>
            <p>List of Deleted Program Day</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="program_days" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Program Day
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="program_day_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="program_day_restore_all_set();" >
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

          <?php if(count($p->program_days)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Program Day ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($p->program_days as $program_day)
                include(variables::$root."/source/view/section/program_day_section_card.php");
                
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/program_day_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/program_day_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/program_day_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/program_day_section_modal_confirm_empty_trash.php"); ?>
    
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
  <form action="program_days-export" method="post" id="export_form"></form>

  <script>

    //restore
    function program_day_restore_set(id_program_day,name){
      $("#program_day_restore_name").html(name);
      $("#program_day_restore_id_program_day").val(id_program_day);

      $(".program_day-"+id_program_day+" .list-group-item").addClass(card_hover_class);

      $("#ProgramDayRestoreModal").modal("show");
    }

    function program_day_restore_submit(){
      $("#ProgramDayRestoreModal form").submit();
    }

    function program_day_restore_dismiss(){
      $("#ProgramDayRestoreModal").modal("hide");
    }

    //delete
    function program_day_delete_set(id_program_day,name){
      $("#program_day_delete_name").html(name);
      $("#program_day_delete_id_program_day").val(id_program_day);

      $(".program_day-"+id_program_day+" .list-group-item").addClass(card_hover_class);

      $("#ProgramDayDeleteModal").modal("show");
    }

    function program_day_delete_submit(){
      $("#ProgramDayDeleteModal form").submit();
    }

    function program_day_delete_dismiss(){
      $("#ProgramDayDeleteModal").modal("hide");
    }

    //empty trash
    function program_day_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#ProgramDayEmptyTrashModal").modal("show");
    }

    function program_day_empty_trash_submit(){
      $("#ProgramDayEmptyTrashModal form").submit();
    }

    function program_day_empty_trash_dismiss(){
      $("#ProgramDayEmptyTrashModal").modal("hide");
    }

    //restore all
    function program_day_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#ProgramDayRestoreAllModal").modal("show");
    }

    function program_day_restore_all_submit(){
      $("#ProgramDayRestoreAllModal form").submit();
    }

    function program_day_restore_all_dismiss(){
      $("#ProgramDayRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>