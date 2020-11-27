<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.13
* @link https://tabler.io
* Copyright 2018-2020 The Tabler Authors
* Copyright 2018-2020 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en" ng-app="apps" ng-controller="LoginController">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <!-- CSS files -->
  <link href="<?=base_url()?>public/css/tabler.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>public/css/tabler-flags.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>public/css/tabler-payments.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>public/css/tabler-vendors.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>public/css/demo.min.css" rel="stylesheet" />
  <style>
    /* body {
      display: none;
    } */
  </style>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
  <div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
      <div class="text-center mb-4">
        <a href="."><img src="./static/logo.svg" height="36" alt=""></a>
      </div>
      <form class="card card-md" action="<?=base_url('auth/login')?>" method="get" autocomplete="off">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login to your account</h2>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Enter username">
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
              <span class="form-label-description">
                <a href="./forgot-password.html">I forgot password</a>
              </span>
            </label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" placeholder="Password" autocomplete="off">
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip"><svg
                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="12" cy="12" r="2" />
                    <path
                      d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                    </svg>
                </a>
              </span>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-check">
              <input type="checkbox" class="form-check-input" />
              <span class="form-check-label">Remember me on this device</span>
            </label>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </div>
        <div class="hr-text">or</div>
         <div class="text-center text-muted mt">
          Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
        </div>
        <br>
      </form>
    </div>
  </div>
  <!-- Libs JS -->
  <script src="<?=base_url()?>public/libs/angular/angular.min.js"></script>
  <script src="<?=base_url()?>public/js/apps.js"></script>
  <script src="<?=base_url()?>public/js/services/helper.services.js"></script>
  <script src="<?=base_url()?>public/js/controllers/admin.controllers.js"></script>
  <script src="<?=base_url()?>public/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Tabler Core -->
  <script src="<?=base_url()?>public/js/tabler.min.js"></script>
  <script>
    document.body.style.display = "block"
  </script>
</body>

</html>