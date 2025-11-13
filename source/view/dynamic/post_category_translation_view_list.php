<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "post_category_translations";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Post Category Translation";
  $admin = "post_category_translation";
  
  $table_name = "post_category_translation";
  $page_type = "list";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET["page"])){
    $page_number = $_GET["page"];
  }

  $p = new PostCategoryTranslation();
  $p->getAllPostCategoryTranslation($page_number);
  

  $post_category_ = new PostCategory();
  $post_category_->getAllPostCategory();
  $nbr_post_categorys = count($post_category_->post_categorys);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h2>List of Post Category Translation <span class="badge badge-primary badge-pill" style="font-size:11pt;"><?=count($p->post_category_translations); ?></span></h2>
          </div>
          <div class="col-lg-6 col-md-6 text-right pb-3">

            <?php $nbr_btn = 1; ?>

            <!-- truncate -->
            <button type="button" class="btn btn-danger d-none" onclick="post_category_translation_truncate_set();" <?php 
            if(!$_SESSION[variables::$prefix."allow_truncate"]) echo "disabled";
            ?>>
              <i class="fa fa-trash-alt"></i> Truncate Post Category Translation
            </button>
            
            <!-- trash link -->
            <?php 
            if($_SESSION[variables::$prefix."allow_trash"]){
              $p->getNbrDeletedPostCategoryTranslation(); 
            ?>
            <a href="post_category_translations-trash" class="btn btn-danger btn-fixed btn-<?=$nbr_btn; ?>">
              
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
            <button type="button" class="btn btn-primary btn-fixed btn-<?=$nbr_btn; ?>" data-toggle="modal" data-target="#PostCategoryTranslationAddModal">
              <i class="fa fa-plus fa-lg"></i>
              <span class="hover-show">
                Add Post Category Translation
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

          <?php if(count($p->post_category_translations)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no Post Category Translation ...
          </div>
          <?php 

            }else{
              foreach ($p->post_category_translations as $post_category_translation)
                include(variables::$root."/source/view/section/post_category_translation_section_card.php");
              
              $page = $p->page;
              $nbr_pages = $p->nbr_pages;
              include(variables::$root."/source/view/section/list_pagination.php");
            } 
            
            ?>

    <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>

      <?php include(variables::$root."/source/view/modal/post_category_translation_section_modal_form_add.php"); ?>
      <?php include(variables::$root."/source/view/modal/post_category_translation_section_modal_form_update.php"); ?>
      <?php include(variables::$root."/source/view/modal/post_category_translation_section_modal_confirm_move_to_trash.php"); ?>
      
      <?php if(($_SESSION[variables::$prefix."allow_truncate"])){ ?>
        <?php include(variables::$root."/source/view/modal/post_category_translation_section_modal_confirm_truncate.php"); ?>
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
  <form action="post_category_translations-export" method="post" id="export_form"></form>

    <script>


    </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>