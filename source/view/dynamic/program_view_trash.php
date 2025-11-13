<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "programs-trash";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Trash Program";
  $admin = "program";

  $table_name = "program";
  $page = "trash";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new Program();
  $p->getAllDeletedProgram($page_number);

  if(!$_SESSION[variables::$prefix."allow_trash"])
    header("Location: programs");

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6">
            <a href="programs" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back to List of Program
            </a>
            <h2>Trash <span class="badge badge-primary"><?=count($p->programs); ?></span></h2>
            <p>List of Deleted Program</p>
          </div>
          <div class="col-lg-6 text-right pb-3">
            <?php $nbr_btn = 1; ?>

            <a href="programs" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>">
              <i class="fa fa-list fa-lg"></i>
              <span class="hover-show">
                List Program
                <i class="fa fa-external-link-alt"></i>
              </span>
            </a>
            <?php $nbr_btn++; ?>
            
            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>" onclick="program_empty_trash_set();" >
              <i class="fa fa-trash-alt fa-lg"></i>
              <span class="hover-show">Empty Trash</span>
            </button>
            <?php $nbr_btn++; ?>
            <?php } ?>

            <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
            <button type="button" class="btn btn-success btn-fixed btn-<?=$nbr_btn; ?>" onclick="program_restore_all_set();" >
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

          <?php if(count($p->programs)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Program ...
          </div>
          <?php 
            // add isotop
            }else{ 
              foreach ($p->programs as $program)
                include(variables::$root."/source/view/section/program_section_card.php");
                
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            }
          ?>


    <?php include(variables::$root."/source/view/modal/program_section_modal_confirm_delete.php"); ?>
    <?php include(variables::$root."/source/view/modal/program_section_modal_confirm_restore.php"); ?>
    <?php include(variables::$root."/source/view/modal/program_section_modal_confirm_restore_all.php"); ?>
    <?php include(variables::$root."/source/view/modal/program_section_modal_confirm_empty_trash.php"); ?>
    
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
  <form action="programs-export" method="post" id="export_form"></form>

  <script>

    //restore
    function program_restore_set(id_program,name){
      $("#program_restore_name").html(name);
      $("#program_restore_id_program").val(id_program);

      $(".program-"+id_program+" .list-group-item").addClass(card_hover_class);

      $("#ProgramRestoreModal").modal("show");
    }

    function program_restore_submit(){
      $("#ProgramRestoreModal form").submit();
    }

    function program_restore_dismiss(){
      $("#ProgramRestoreModal").modal("hide");
    }

    //delete
    function program_delete_set(id_program,name){
      $("#program_delete_name").html(name);
      $("#program_delete_id_program").val(id_program);

      $(".program-"+id_program+" .list-group-item").addClass(card_hover_class);

      $("#ProgramDeleteModal").modal("show");
    }

    function program_delete_submit(){
      $("#ProgramDeleteModal form").submit();
    }

    function program_delete_dismiss(){
      $("#ProgramDeleteModal").modal("hide");
    }

    //empty trash
    function program_empty_trash_set(){
      //code
      $(".list-group-item").addClass(card_hover_class);
      $("#ProgramEmptyTrashModal").modal("show");
    }

    function program_empty_trash_submit(){
      $("#ProgramEmptyTrashModal form").submit();
    }

    function program_empty_trash_dismiss(){
      $("#ProgramEmptyTrashModal").modal("hide");
    }

    //restore all
    function program_restore_all_set(){
      $(".list-group-item").addClass(card_hover_class);
      $("#ProgramRestoreAllModal").modal("show");
    }

    function program_restore_all_submit(){
      $("#ProgramRestoreAllModal form").submit();
    }

    function program_restore_all_dismiss(){
      $("#ProgramRestoreAllModal").modal("hide");
    }
  </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>