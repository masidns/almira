<div class="container-fluid" ng-controller="LaporanController" ng-init="Init()">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div>
              <i class="fa fa-table mr-1"></i> Siswa
            </div>
            <div class="card-tools pull-right">
              <div class="input-group">
                <!-- <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                  </span>
                </div>
                <input type="text" class="form-control float-right form-control-sm" ng-model="tanggal"
                  id="reservationtime" ng-change="showStaf(tanggal)"> -->
                <button class="btn btn-primary btn-sm"><i class="fa fa-print" ng-click="print()"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="print">
            <div class="screen">
              <div class="col-md-12 d-flex justify-content-between">
                <div class="col-md-4">
                  &nbsp;
                  <!-- <img src="<?=base_url('public/img/logo.png');?>" width="100px"> -->
                </div>
                <div class="col-md-4 text-center">
                  <h2>LAPORAN</h2>
                  <h5>DAFTAR STAF/INSTRUKTUR</h5>

                </div>
                <div class="col-md-4">&nbsp;</div>
              </div>
              <hr class="style2" style="margin-bottom:12px"><br>
            </div>
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Telepon</th>
                  <th scope="col">Email</th>
                  <th scope="col">Sebagai</th>
                  <th scope="col">Foto</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="item in stafs">
                  <th scope="row">
                    {{$index+1}}
                  </th>
                  <td>{{item.namastaf}}</td>
                  <td>{{item.tlpn}}</td>
                  <td>{{item.email}}</td>
                  <td>{{item.roles.rule}}</td>
                  <td><img src="<?= base_url()?>public/fotostaf/{{item.foto}}" alt="" width="50%"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>