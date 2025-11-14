<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  include("../../init.php");
  variables::cd(1);

  $title_head = variables::$project_name;
  $admin = "home";

  $home = new Home();

  $css = "
  .quick-link .btn {
    width:80px;
    height:80px;
    padding-top:24px;
    margin-bottom:5px;
  }";

  include(variables::$root."/source/view/section/admin_header.php"); 

// Last 30 days labels
$last30DaysLabels = [];
$last30DaysCounts = [];

for ($i = 29; $i >= 0; $i--) {
    $date = date("Y-m-d", strtotime("-$i days"));
    $last30DaysLabels[] = date("M d", strtotime($date));

    // COUNT bookings for this day
    $b = new Bookings();
    $count = $b->countByDate($date); // You must add this method (I can write it)
    $last30DaysCounts[] = (int)$count;
}


?>

      <div class="container-fluid pt-lg-5 pb-5">
        <div class="row">
          <div class="col-lg-12 col-md-6 mb-3">
            <h2>Dashboard</h2>
          </div>

          <div class="col-lg-12 mb-5">
            <i class="fa fa-calendar"></i> <?=date('l j F Y'); ?> - Semaine <?=date('W'); ?>
<div class="container-fluid mt-4">

  <!-- ===================== STAT BOXES ===================== -->
  <div class="row">

    <!-- Clients -->
    <div class="col-md-4 col-lg-3 mb-4">
      <div class="card shadow-sm border-0 stat-box">
        <div class="card-body d-flex align-items-center">
          <div class="stat-icon bg-primary text-white mr-3">
            <i class="fa fa-users"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1">Clients</h6>
            <h3 class="mb-0 font-weight-bold"><?php echo $total_clients ?? 0; ?></h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Bookings -->
    <div class="col-md-4 col-lg-3 mb-4">
      <div class="card shadow-sm border-0 stat-box">
        <div class="card-body d-flex align-items-center">
          <div class="stat-icon bg-warning text-white mr-3">
            <i class="fa fa-calendar-check"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1">Bookings</h6>
            <h3 class="mb-0 font-weight-bold"><?php echo $total_bookings ?? 0; ?></h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Programs -->
    <div class="col-md-4 col-lg-3 mb-4">
      <div class="card shadow-sm border-0 stat-box">
        <div class="card-body d-flex align-items-center">
          <div class="stat-icon bg-success text-white mr-3">
            <i class="fa fa-map"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1">Programs</h6>
            <h3 class="mb-0 font-weight-bold"><?php echo $total_programs ?? 0; ?></h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Categories -->
    <div class="col-md-4 col-lg-3 mb-4">
      <div class="card shadow-sm border-0 stat-box">
        <div class="card-body d-flex align-items-center">
          <div class="stat-icon bg-danger text-white mr-3">
            <i class="fa fa-tags"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1">Categories</h6>
            <h3 class="mb-0 font-weight-bold"><?php echo $total_categories ?? 0; ?></h3>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- ===================== BOOKINGS GRAPH ===================== -->
  <div class="row mt-4">
    <div class="col-lg-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          <strong><i class="fa fa-chart-line mr-2"></i>Bookings Last 30 Days</strong>
        </div>
        <div class="card-body">
          <canvas id="bookingsChart" height="120"></canvas>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
var ctx = document.getElementById('bookingsChart').getContext('2d');

// Labels = last 30 days (PHP echoes JSON array)
var chartLabels = <?php echo json_encode($last30DaysLabels); ?>;

// Data = number of bookings each day
var chartData = <?php echo json_encode($last30DaysCounts); ?>;

new Chart(ctx, {
    type: 'line',
    data: {
        labels: chartLabels,
        datasets: [{
            label: "Bookings",
            data: chartData,
            borderColor: "rgba(253, 126, 20, 0.9)",
            backgroundColor: "rgba(253, 126, 20, 0.3)",
            borderWidth: 3,
            pointRadius: 4,
            pointBackgroundColor: "rgba(253, 126, 20, 1)"
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{ ticks: { beginAtZero: true, precision: 0 } }]
        }
    }
});
</script>


<!-- ===================== STYLES ===================== -->
<style>
.stat-box:hover { transform: translateY(-3px); transition: 0.2s ease; }
.stat-icon {
  width: 55px; height: 55px;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px; border-radius: 6px;
}
</style>



<!-- Extra styling -->
<style>
  .stat-box:hover {
    transform: translateY(-3px);
    transition: 0.2s ease;
  }
  .stat-icon {
    width: 50px;
    height: 50px;
    display: flex;
    font-size: 20px;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>


          </div>

          
          <?php foreach ($home->tables as $key => $table) { ?>
          <?php if(!($_SESSION[variables::$prefix."role"] != "admin" and $table["Name"] == 'User')){ ?>
          <div class="col-lg-4 text-center py-3">

            <div class="card">
              <div class="card-header h3">
                <?=$table["Name"]; ?>
              </div>
              <ul class="list-group list-group-flush">
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>
                    <i class="fa fa-list"></i>
                    <?=$table["Name"]; ?>s Number
                  </span>
                  <span class="badge badge-primary badge-pill"><?=$table["counter"]; ?></span>
                </li>
                
                <?php if($_SESSION[variables::$prefix."allow_trash"]){?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>
                    <i class="fa fa-trash"></i>
                    <?=$table["Name"]; ?>s Number in Trash 
                  </span>
                  <span class="badge badge-danger badge-pill"><?=$table["trash_counter"]; ?></span>
                </li>
                <?php } ?>

                <?php if($_SESSION[variables::$prefix."allow_edit"] or $_SESSION[variables::$prefix."allow_trash"]){ ?>
                <li class="list-group-item pt-0">

                  <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>

                  <div class="btn-group mt-2">
                    <a href="<?=$table["url"]; ?>" class="btn btn-success">
                      <i class="fa fa-sliders-h"></i> Manage
                    </a>
                    <?php if(!$table["has_fk"]){ ?>
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#<?=$table["Name"]; ?>AddModal">
                        <i class="fa fa-plus"></i> Add New <?=$table["Name"]; ?>
                      </a>
                    </div>
                    <?php } ?>
                  </div>
                  <?php } ?>
                  
                  <?php if($_SESSION[variables::$prefix."allow_trash"]){?>
                  <a href="<?=$table["url"]; ?>-trash" class="btn btn-danger mt-2">
                    <i class="fa fa-trash"></i> Trash
                  </a>
                  <?php } ?>

                  <form action="<?=$table["url"]; ?>-export" method="post" class="d-inline">
                    <button type="submit" class="btn btn-secondary mt-2" ><i class="fa fa-database"></i> Export</button>
                  </form>

                </li>
                <?php } ?>
              </ul>
            </div>
          </div>

          <?php include(variables::$root."/source/view/modal/". $table["name"] ."_section_modal_form_add.php"); ?>
          <script>    //add
          function <?=strtolower($table["Name"]) ?>_add_submit(){
            $("#<?=$table["Name"] ?>AddModal form").submit();
          }</script>

          <?php } ?>
          <?php } ?>

    </div>

    <?php include(variables::$root."/source/view/section/home_circles.php"); ?>

  </div>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>