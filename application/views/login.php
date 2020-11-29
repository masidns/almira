<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.13
* @link https://tabler.io
* Copyright 2018-2020 The Tabler Authors
* Copyright 2018-2020 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en" ng-app="appsauth" ng-controller="LoginController">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <!-- CSS files -->
  <link href="<?=base_url()?>public/css/tabler.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>public/css/tabler-flags.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>public/css/tabler-payments.min.css" rel="stylesheet" />
  <!-- <link href="<?=base_url()?>public/css/tabler-vendors.min.css" rel="stylesheet" /> -->
  <link href="<?=base_url()?>public/css/demo.min.css" rel="stylesheet" />
  <script src="<?=base_url()?>public/assets/onepage/js/jquery.js"></script>
  <style>
    /* body {
      display: none;
    } */
  </style>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
  <div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
      <form class="card card-md" ng-submit="login()">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login to your account</h2>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="email" class="form-control" placeholder="Enter Email" required ng-model="model.username">
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
            </label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" placeholder="Password" autocomplete="off" ng-model="model.password">
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </div>
        <br>
      </form>
    </div>
  </div>
  <!-- Libs JS -->
  <script src="<?=base_url()?>public/libs/angular/angular.min.js"></script>
    <script src="<?=base_url()?>public/libs/angular-ui-select2/src/select2.js"></script>
    <script src="<?=base_url()?>public/libs/angular-local-storage/dist/angular-local-storage.js"></script>
    <script src="<?=base_url()?>public/js/appsauth.js"></script>
    <script src="<?=base_url()?>public/js/services/helper.services.js"></script>
    <script src="<?=base_url()?>public/js/services/auth.services.js"></script>
    <script src="<?=base_url()?>public/js/services/storage.services.js"></script>
    <script src="<?=base_url()?>public/js/services/services.js"></script>
    <script src="<?=base_url()?>public/js/controllers/auth.controllers.js"></script>
    <script src="<?=base_url()?>public/libs/gasparesganga-jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?=base_url()?>public/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Tabler Core -->
  <script src="<?=base_url()?>public/js/tabler.min.js"></script>
  <script>
    document.body.style.display = "block"
  </script>
</body>

</html>