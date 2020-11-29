<!-- start navigation -->
<nav class="navbar navbar-default templatemo-nav" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Almira</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#top">HOME</a></li>
				<li><a href="#about">LAYANAN</a></li>
				<li><a href="#team">INSTRUKTUR</a></li>
				<li><a href="#service">PAKET</a></li>
				<li><a href="#pendaftaran">PENDAFTARAN</a></li>
				<li><a href="#contact">CONTACT</a></li>
				<li>
					<a href="<?=base_url('login')?>">LOGIN</a>
				</li>


			</ul>
		</div>
	</div>
</nav>
<!-- end navigation -->

<!-- start home -->
<section id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<h1 class="wow fadeIn" data-wow-offset="20" data-wow-delay="0.1s">KHURSUS MENGEMUDI <span>ALMIRA</span>
					<b>Jayapura</b></h1>
				<div class="element">
					<div class="sub-element">Kegiatan kursus mengemudi di Almira (IWSS) Provinsi Papua di dukung oleh
						Polantas Polda Papua.</div>
					<div class="sub-element">Setiap pembukaan kursus di Almira akan di buka oleh pejabat dari jajaran
						Polantas Polda Papua.</div>
					<div class="sub-element">Ini membuktikan bahwa kursus di Almira resmi dan diakui oleh kepolisian.
					</div>
					<div class="sub-element">Selain dari pada itu dari jajaran lantas Polresta juga ikut andil dalam
						kegiatan kursus di Almira ini khususnya dalam perolehan SIM A.
						Setiap peserta kursus sebelum mendapatkan SIM A akan di ujin oleh jajaran lantas dari Polresta
						Jayapura.</div>
					<!-- <div class="sub-element">Awesome Template is provided by templatemo.com website for everyone</div>
                            <div class="sub-element">Download, edit and apply this awesome template for your websites</div> -->
				</div>
				<a data-scroll href="#pendaftaran" class="btn btn-default wow fadeInUp" data-wow-offset="50"
					data-wow-delay="0.6s">GET STARTED</a>
			</div>
		</div>
	</div>
</section>
<!-- end home -->

<!-- start about -->
<section id="about">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Layanan <span>ALMIRA</span></h2>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.6s">
				<div class="media">
					<div class="media-heading-wrapper">
						<div class="media-object pull-left">
							<i class="fa fa-car"></i>
						</div>
						<h3 class="media-heading">KHURSUS MENGEMUDI</h3>
					</div>
					<div class="media-body">
						<p>Kami mempunyai mobil manual dan matic dengan tenaga pengajar yang berpengalaman. </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-offset="50" data-wow-delay="0.9s">
				<div class="media">
					<div class="media-heading-wrapper">
						<div class="media-object pull-left">
							<i class="fa fa-car"></i>
						</div>
						<h3 class="media-heading">Pengurusan SIM dan STNK</h3>
					</div>
					<div class="media-body">
						<p>Selain kursus mengemudi kami juga melayani pengurusan SIM untuk Anda.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
				<div class="media">
					<div class="media-heading-wrapper">
						<div class="media-object pull-left">
							<i class="fa fa-car"></i>
						</div>
						<h3 class="media-heading">Antar Jemput Siswa</h3>
					</div>
					<div class="media-body">
						<p>Kami juga melayani antar jemput siswa sekolah untuk wilayah tertentu.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end about -->

<!-- start team -->
<section id="team">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Instruktur Khursus
					<span>ALMIRA</span></h2>
			</div>
			<?php foreach ($staf as $key => $value): ?>
			<center>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.3s">
					<div class="team-wrapper">
						<img src="public/assets/onepage/images/team-img1.jpg" class="img-responsive" alt="team img 1">
						<div class="team-des">
							<h4><?=$value->namastaf;?></h4>
							<span><?=$value->tlpn;?></span>
							<p><?=$value->email;?></p>
						</div>
					</div>
				</div>
			</center>
			<?php endforeach;?>
			<!-- <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
    					<div class="team-wrapper">
    						<img src="public/assets/onepage/images/team-img2.jpg" class="img-responsive" alt="team img 2">
    							<div class="team-des">
    								<h4>MARY</h4>
    								<span>Developer</span>
    								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molest.</p>
    							</div>
    					</div>
    				</div>
    				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.3s">
    					<div class="team-wrapper">
    						<img src="public/assets/onepage/images/team-img3.jpg" class="img-responsive" alt="team img 3">
    							<div class="team-des">
    								<h4>JULIA</h4>
    								<span>Director</span>
    								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molest.</p>
    							</div>
    					</div>
    				</div>
    				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
    					<div class="team-wrapper">
    						<img src="public/assets/onepage/images/team-img4.jpg" class="img-responsive" alt="team img 4">
    							<div class="team-des">
    								<h4>LINDA</h4>
    								<span>Manager</span>
    								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molest.</p>
    							</div>
    					</div>
    				</div> -->
		</div>
	</div>
</section>
<!-- end team -->

<!-- start service -->
<section id="service">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">PAKET KHURSUS <span>ALMIRA</span>
					JAYAPURA</h2>
			</div>
			<center>
				<?php foreach ($paket as $key => $value): ?>
				<div class="col-md-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
					<i class="fa fa-car"></i>
					<h4><?=$value->namapaket;?></h4>
					<p>Biaya Rp. <?=$value->hargapaket;?>,- <br> <?=$value->ketpaket;?> <br> Jumlah Pertemuan
						<?=$value->jumlahkali;?> <br> Dengan Latihan <?=$value->durasiwaktu;?> </p>
				</div>
				<?php endforeach;?>
			</center>
		</div>
	</div>
</section>
<section id="pendaftaran" ng-app="appsusers" ng-controller="registrasiController">
	<div class="container">
		<div class="col-md-12">
			<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">PENDAFTARAN <span>ALMIRA</span>
				JAYAPURA</h2>
		</div>
		<div  ng-show="showRegistrasi">
			<div class="stepwizard">
				<div class="stepwizard-row setup-panel">
					<div class="stepwizard-step col-xs-3">
						<a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
						<p><small>User</small></p>
					</div>
					<div class="stepwizard-step col-xs-3">
						<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
						<p><small>Biodata</small></p>
					</div>
					<div class="stepwizard-step col-xs-3">
						<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
						<p><small>Paket</small></p>
					</div>
					<div class="stepwizard-step col-xs-3">
						<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
						<p><small>Peryaratan</small></p>
					</div>
				</div>
			</div>

			<form>
				<div class="panel panel-primary setup-content" id="step-1">
					<div class="panel-heading">
						<h3 class="panel-title">User</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label">Email</label>
							<input maxlength="100" type="email" required="required" ng-model="model.email"
								class="form-control" placeholder="Enter Email" />
						</div>

						<div class="form-group">
							<label class="control-label">Password</label>
							<input maxlength="100" type="password" ng-model="model.password" required="required"
								class="form-control" placeholder="Enter Last Name" id="password" />
						</div>
						<div class="form-group">
							<label class="control-label">Re-Password</label>
							<input maxlength="100" type="password" ng-model="model.repassword" required="required"
								class="form-control" placeholder="Enter Last Name" id="confirm_password" />
							<span id='message'></span>
						</div>


						<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
					</div>
				</div>

				<div class="panel panel-primary setup-content" id="step-2">
					<div class="panel-heading">
						<h3 class="panel-title">Biodata</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label">Nama</label>
							<input maxlength="200" type="text" ng-model="model.namasiswa" required="required"
								class="form-control" placeholder="Nama Anda" />
						</div>
						<div class="form-group">
							<label class="control-label">Alamat</label>
							<textarea maxlength="200" required ng-model="model.alamatsiswa" rows="3" class="form-control"
								placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Tempat Lahir</label>
							<input maxlength="200" type="text" ng-model="model.tempatlahir" required="required"
								class="form-control" placeholder="Tempat Lahir" />
						</div>
						<div class="form-group">
							<label class="control-label">Tanggal Lahir</label>
							<input maxlength="200" type="date" ng-model="model.tanggallahir" required="required"
								class="form-control" placeholder="Tempat Lahir" />
						</div>
						<div class="form-group">
							<label class="control-label">Kontak</label>
							<input maxlength="200" type="text" ng-model="model.notlpn" required="required"
								class="form-control" placeholder="kontak" />
						</div>
						<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
					</div>
				</div>

				<div class="panel panel-primary setup-content" id="step-3">
					<div class="panel-heading">
						<h3 class="panel-title">Paket</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label">Paket</label>
							<select class="form-control" ng-model="model.idpaket" id="idpaket">
								<option value="">---Pilih Paket---</option>
								<?php foreach ($paket as $key => $value): ?>
								<option value="<?=$value->idpaket?>"><?=$value->namapaket?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Tanggal Mulai Kursus</label>
							<select class="form-control" ng-model="model.idjadwal" id="idjadwal">
								<option value="">---Pilih Jadwal---</option>
								<?php foreach ($jadwal as $key => $value): ?>
								<option value="<?=$value->idjadwal?>">
									<?=$value->hari . ' ' . $value->jadwal . ': ' . $value->jammulai . ' s/d ' . $value->jamselesai?>
								</option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Jenis Bayar</label>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input" type="radio" name="jenisbayar1"
										ng-model="model.jenisbayar" value="Lunas"
										ng-change="setJenisBayar(model.jenisbayar)"> Lunas
									<input class="form-check-input" type="radio" name="jenisbayar1"
										ng-model="model.jenisbayar" value="DP" ng-change="setJenisBayar(model.jenisbayar)">
									DP
								</label>
							</div>
						</div>
						<div class="form-group" ng-show="model.jenisbayar=='DP'">
							<label class="control-label">Nominal DP</label>
							<input maxlength="100" type="number" ng-model="model.nominaldp" required="required"
								class="form-control" placeholder="Nominal DP" />
						</div>
						<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
					</div>
				</div>

				<div class="panel panel-primary setup-content" id="step-4">
					<div class="panel-heading">
						<h3 class="panel-title">Perysaratan</h3>
					</div>
					<div class="panel-body">
						<?php foreach ($persyaratan as $key => $value): ?>
						<div class="form-group">
							<label class="control-label"><?=$value->namapersyaratan;?></label>
							<input type="file" required="required" class="form-control" id="inputFile"
								file-model="model.<?=$value->file?>" accept="image/*, application/pdf"
								onchange="angular.element(this).scope().ChangeFile(this)" />
						</div>
						<?php endforeach;?>
						<button class="btn btn-success pull-right" type="submit" ng-click="simpan()">Finish!</button>
					</div>
				</div>
			</form>
		</div>

		<div ng-if="!showRegistrasi">
			<form action="">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Biodata</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label">Nama</label>
							<input maxlength="200" type="text" ng-model="model.namasiswa" required="required"
								class="form-control" placeholder="Nama Anda" />
						</div>
						<div class="form-group">
							<label class="control-label">Alamat</label>
							<textarea maxlength="200" required ng-model="model.alamatsiswa" rows="3" class="form-control"
								placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Tempat Lahir</label>
							<input maxlength="200" type="text" ng-model="model.tempatlahir" required="required"
								class="form-control" placeholder="Tempat Lahir" />
						</div>
						<div class="form-group">
							<label class="control-label">Tanggal Lahir</label>
							<input maxlength="200" type="date" ng-model="model.tanggallahir" required="required"
								class="form-control" placeholder="Tempat Lahir" />
						</div>
						<div class="form-group">
							<label class="control-label">Kontak</label>
							<input maxlength="200" type="text" ng-model="model.notlpn" required="required" class="form-control"
								placeholder="kontak" />
						</div>
						<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- end servie -->


<!-- start contact -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">CONTACT <span>ALMIRA</span></h2>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.9s">
				<!-- <form action="#" method="post">
    						<label>ng-model</model.label>
    						<input ng-model="model.fullng-model" model.type="text" class="form-control" id="fullng-model">model.

                            <label>EMAIL</label>
    						<input ng-model="model.email" type="email" class="form-control" id="email">

                            <label>MESSAGE</label>
    						<textarea ng-model="model.message" rows="4" class="form-control" id="message"></textarea>

                            <input type="submit" class="form-control">
    					</form> -->
				<address>
					<p class="address-title">JADWAL KHURSUS ALMIRA</p>
					<span>Senin - Sabtu.</span>
					<p><i class="fa fa-clock-o"></i> PAGI : JAM 08.00 sd 10.00 - JAM 10.00 sd 12.00</p>
					<p><i class="fa fa-clock-o"></i> SIANG : JAM 13.00 sd 15.00 </p>
					<p><i class="fa fa-clock-o"></i> SORE: JAM 15.00 sd 17-00</p>
				</address>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
				<address>
					<p class="address-title">KHURSUS MENGEMUDI ALMIRA</p>
					<span>Bimbingan ketrampilan mengemudi di Almira Jayapura. Murah dan cepat lincah.</span>
					<p><i class="fa fa-phone"></i> 0812-486-7587 / 0813-4474-8244</p>
					<p><i class="fa fa-envelope-o"></i> awesome@company.com</p>
					<p><i class="fa fa-map-marker"></i> 663 New Walk Roadside, Birdeye View, GO 11020</p>
				</address>
				<ul class="social-icon">
					<li>
						<h4>WE ARE SOCIAL</h4>
					</li>
					<li><a href="#" class="fa fa-facebook"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
					<li><a href="#" class="fa fa-instagram"></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- end contact -->

<!-- modal login -->

<!-- modal login -->