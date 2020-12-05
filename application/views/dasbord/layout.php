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
        <link rel="stylesheet" href="<?=base_url()?>public/assets/onepage/css/animate.min.css">
		<link rel="stylesheet" href="<?=base_url()?>public/assets/onepage/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>public/assets/onepage/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?=base_url()?>public/assets/onepage/css/templatemo-style.css">
		<link rel="stylesheet" href="<?=base_url()?>public/assets/onepage/css/form.wizard.css">

		<script src="<?=base_url()?>public/assets/onepage/js/jquery.js"></script>
		<script src="<?=base_url()?>public/assets/onepage/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>public/assets/onepage/js/jquery.singlePageNav.min.js"></script>
		<script src="<?=base_url()?>public/assets/onepage/js/typed.js"></script>
		<script src="<?=base_url()?>public/assets/onepage/js/wow.min.js"></script>
		<script src="<?=base_url()?>public/assets/onepage/js/custom.js"></script>
		<script src="<?=base_url()?>public/assets/onepage/js/form.wizard.js"></script>
	</head>
	<body id="top" ng-app="appsusers">

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
                        <p><i class="fa fa-phone"></i><span> Phone</span><?= $profile['kontak']; ?></p>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <p><i class="fa fa-envelope-o"></i><span> Email</span><?= $profile['email']; ?></p>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->

        <?=$content;?>

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
    <script src="<?=base_url()?>public/js/appsusers.js"></script>
    <script src="<?=base_url()?>public/js/services/helper.services.js"></script>
    <script src="<?=base_url()?>public/js/services/auth.services.js"></script>
    <script src="<?=base_url()?>public/js/services/storage.services.js"></script>
    <script src="<?=base_url()?>public/js/services/services.js"></script>
    <script src="<?=base_url()?>public/js/controllers/user.controllers.js"></script>
    <script src="<?=base_url()?>public/libs/gasparesganga-jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-0ZU-ALSF2FLNUjtq"></script>
    <script>
    
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matching').css('color', 'green');
            } else
                $('#message').html('Not Matching').css('color', 'red');
        });
        
    </script>
    <script type="text/javascript">
        $('#pay-button').click(function (event) {
        event.preventDefault();
        // $(this).attr("disabled", "disabled");

        $.ajax({
        url: '<?=site_url()?>/snap/token',
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = '+data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

            onSuccess: function(result){
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
            },
            onPending: function(result){
                changeResult('pending', result);
                console.log(result.status_message);
                $("#payment-form").submit();
            },
            onError: function(result){
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
            }
            });
        }
        });
        });

</script>

	</body>
</html>