<!DOCTYPE html>
<html lang="en">
<head>

  <title><?= $title_head; ?></title>

  <?php 
    include( variables::$root."/source/view/section/head.php");
  ?>


  <?php if (isset($css_files)){ ?>
  <?php foreach ($css_files as $css_file) { ?>
  <link rel="stylesheet" href="<?=variables::$css; ?><?=$css_file; ?>.css">
  <?php  } ?>
  <?php  } ?>

  <?php if (isset($table_name) and isset($page_type)){ ?>
  <?php if (!empty($table_name) and !empty($page_type)){ ?>
  <link rel="stylesheet" href="<?=variables::$css; ?><?=$table_name;?>.<?=$page_type; ?>.css">
  <script src="<?=variables::$js; ?><?=$table_name;?>.<?=$page_type; ?>.js"></script>
  <?php  } ?>
  <?php  } ?>

  <?php if (isset($js_files)){ ?>
  <?php foreach ($js_files as $js_file) { ?>
  <script src="<?=variables::$js; ?><?=$js_file; ?>.js"></script>
  <?php  } ?>
  <?php  } ?>

  <?php if(isset($js)){ ?>
  <script><?=$js; ?></script>
  <?php } ?>

  <?php if(isset($css)){ ?>
  <style><?=$css; ?></style>
  <?php } ?>
  
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-md navbar-light bg-white">
    <a class="navbar-brand" href="../admin/">
      <?= variables::$project_name; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../" target="_blank">
          <i class="fa fa-external-link-square"></i>
          Website</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'home') echo 'active'; ?>" href="../admin/" >
          <i class="fa fa-home"></i>
          Dashboard</a>
        </li><li class="nav-item">
          <a class="nav-link <?php if($admin == 'post_comment') echo 'active'; ?>" href="post_comments">Post Comment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'post_category_translation') echo 'active'; ?>" href="post_category_translations">Post Category Translation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'post_category') echo 'active'; ?>" href="post_categorys">Post Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'post_translation') echo 'active'; ?>" href="post_translations">Post Translation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'payments') echo 'active'; ?>" href="paymentss">Payments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'bookings') echo 'active'; ?>" href="bookingss">Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'program_day_translation') echo 'active'; ?>" href="program_day_translations">Program Day Translation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'program_translation') echo 'active'; ?>" href="program_translations">Program Translation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'category_translation') echo 'active'; ?>" href="category_translations">Category Translation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'image') echo 'active'; ?>" href="images">Image</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'post') echo 'active'; ?>" href="posts">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'client') echo 'active'; ?>" href="clients">Client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'program_day') echo 'active'; ?>" href="program_days">Program Day</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'category') echo 'active'; ?>" href="categorys">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($admin == 'program') echo 'active'; ?>" href="programs">Program</a>
        </li>
        
      </ul>
      
      <span class="navbar-text">
        
        <a href="#" class="btn btn-light">
          <i class="fa fa-bell"></i>
        </a>

        <div class="btn-group">
          <button type="button" class="btn btn-light"><i class="fa fa-user"></i> <?= $_SESSION[variables::$prefix."username"]; ?></button>
          <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="edit-profile"><i class="fa fa-cog"></i> Settings</a>
            <?php if($_SESSION[variables::$prefix."role"] == "admin"){ ?>
            <a class="dropdown-item" href="users">
              <i class="fa fa-users"></i> Users
            </a>
            <?php } ?>
            <?php if($_SESSION[variables::$prefix."allow_read_history"]){ ?>
            <a class="dropdown-item" href="history"><i class="fa fa-history"></i> History</a>
            <?php } ?>
            <a class="dropdown-item <?php if($admin == 'home') echo 'd-none'; ?>" href="#"><i class="fa fa-question-circle"></i> Help</a>
            <button class="dropdown-item" type="button" onclick="export_csv();"><i class="fa fa-database"></i> Export</button>

            <a class="dropdown-item <?php if($admin == 'home') echo 'd-none'; ?>" href="#">
              <i class="fa fa-file-import"></i> Import
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
          </div>
        </div>
      </span>
    </div>
  </nav>