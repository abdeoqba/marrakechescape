<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "history";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "History";
  $admin = "history";
  
  $table_name = "cg_history";
  $page_type = "list";

  include("../../init.php");
  variables::cd(1);

  $page_number = 1;
  if(isset($_GET['page'])){
    $page_number = $_GET['page'];
  }

  $h = new cg_history();
  $h->getAllHistory($page_number);
  

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-lg-12 mb-3">
            <h2>
              <i class="fa fa-history"></i>
              List of History 
            </h2>
          <span class="badge badge-info badge-sm">page: <?=$page_number; ?></span>
          </div>

          <?php if(count($h->histories)==0){ ?>
          <div class="col-lg-12 text-center pb-3">
            There is no history ...
          </div>
          
          <?php 
          
            }else {
              $previous_connection_action = '';
              foreach ($h->histories as $key_history => $history)
                include(variables::$root."/source/view/section/cg_history_section_card.php");
              

              $page = $h->page;
              $nbr_pages = $h->nbr_pages;
              
              include(variables::$root."/source/view/section/list_pagination.php"); 
            }
            ?>

    </div>
  </div>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>