<!DOCTYPE html>
<html lang="en"  ng-app="apps" ng-controller="pageController">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Vali Admin - Free Bootstrap 4 Admin Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=base_url()?>public/libs/select2/css/select2.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>public/libs/select2-bootstrap4-theme/select2-bootstrap4.min.css" rel="stylesheet" />
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php $this->load->view('_sharedsiswa/header');?>
  <?php $this->load->view("_sharedsiswa/sidebar");?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $title ?></h1>
          <!-- <p><?= $title ?></p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <?=$content?>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="<?=base_url()?>public/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>public/libs/angular/angular.min.js"></script>
    <script src="<?=base_url()?>public/libs/angular-ui-select2/src/select2.js"></script>
    <script src="<?=base_url()?>public/libs/angular-local-storage/dist/angular-local-storage.js"></script>
    <script src="<?=base_url()?>public/js/apps.js"></script>
    <script src="<?=base_url()?>public/js/services/helper.services.js"></script>
    <script src="<?=base_url()?>public/js/services/auth.services.js"></script>
    <script src="<?=base_url()?>public/js/services/storage.services.js"></script>
    <script src="<?=base_url()?>public/js/services/services.js"></script>
    <script src="<?=base_url()?>public/js/controllers/admin.controllers.js"></script>
    <script src="<?=base_url()?>public/assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/assets/js/main.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/libs/select2/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?=base_url()?>public/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?=base_url()?>public/assets/js/plugins/chart.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>