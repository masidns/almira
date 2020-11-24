<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- 
        Awesome Template
        http://www.templatemo.com/preview/templatemo_450_awesome
        -->
		<title>ALMIRA</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url()?>public/assets/onepage/css/animate.min.css">
		<link rel="stylesheet" href="<?= base_url()?>public/assets/onepage/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url()?>public/assets/onepage/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?= base_url()?>public/assets/onepage/css/templatemo-style.css">
		
		<script src="<?= base_url()?>public/assets/onepage/js/jquery.js"></script>
		<script src="<?= base_url()?>public/assets/onepage/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>public/assets/onepage/js/jquery.singlePageNav.min.js"></script>
		<script src="<?= base_url()?>public/assets/onepage/js/typed.js"></script>
		<script src="<?= base_url()?>public/assets/onepage/js/wow.min.js"></script>
		<script src="<?= base_url()?>public/assets/onepage/js/custom.js"></script>
	</head>
	<body id="top">

		<!-- start preloader -->
		<div class="preloader">
			<div class="sk-spinner sk-spinner-wave">
     	 		<div class="sk-rect1"></div>
       			<div class="sk-rect2"></div>
       			<div class="sk-rect3"></div>
      	 		<div class="sk-rect4"></div>
      			<div class="sk-rect5"></div>
     		</div>
    	</div>
    	<!-- end preloader -->


        <!-- start header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <p><i class="fa fa-phone"></i><span> Phone</span>0812-486-7587 / 0813-4474-8244</p>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <p><i class="fa fa-envelope-o"></i><span> Email</span><a href="#">awesome@company.com</a></p>
                    </div>
                    <div class="col-md-5 col-sm-4 col-xs-12">
                        <ul class="social-icon">
                            <li><span>Meet us on</span></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-apple"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->

        <?= $content; ?>

        <!-- start copyright -->
        <footer id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">
                       	Copyright &copy; 2084 Company Name</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end copyright -->

        <script src="<?=base_url()?>public/libs/angular/angular.min.js"></script>
        <script src="<?=base_url()?>public/libs/angular-ui-select2/src/select2.js"></script>
        <script src="<?=base_url()?>public/libs/angular-local-storage/dist/angular-local-storage.js"></script>
        <script src="<?=base_url()?>public/js/apps.js"></script>
        <script src="<?=base_url()?>public/js/services/helper.services.js"></script>
        <script src="<?=base_url()?>public/js/services/auth.services.js"></script>
        <script src="<?=base_url()?>public/js/services/storage.services.js"></script>
        <script src="<?=base_url()?>public/js/services/services.js"></script>
        <script src="<?=base_url()?>public/js/controllers/admin.controllers.js"></script>

	</body>
</html>