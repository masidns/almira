<div class="container-fluid" ng-controller="LaporanController">
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
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                  </span>
                </div>
                <input type="text" class="form-control float-right form-control-sm" ng-model="tanggal"
                  id="reservationtime" ng-change="showKeuangan(tanggal)">
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
                  <h5>TANGGAL: {{tanggal}}</h5>

                </div>
                <div class="col-md-4">&nbsp;</div>
              </div>
              <hr class="style2" style="margin-bottom:12px"><br>
            </div>
            <table class="table table-bordered text-justify" id="dataTable" width="100%"
              cellspacing="0">
              <thead>
                <tr>
                  <th scope="col" rowspan="2">No</th>
                  <th scope="col" rowspan="2">Nama</th>
                  <th scope="col" rowspan="2">Paket</th>
                  <th scope="col" rowspan="2">Biaya</th>
                  <th scope="col" colspan="3">Jenis Pembayaran</th>
                  <th scope="col" rowspan="2">Status Pembayaran</th>
                  <th scope="col" rowspan="2">Total</th>
                </tr>
                <tr>
                  <th>DP</th>
                  <th>Sisa Pembayaran</th>
                  <th>Lunas</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="item in datas"
                  ng-class="{'bg-danger': item.bayar.dp != 0 && item.bayar.sisa==0, 'bg-success': item.bayar.lunas!=0}">
                  <th scope="row">
                    {{$index+1}}
                  </th>
                  <td>{{item.namasiswa}}</td>
                  <td>{{item.paket.namapaket}}</td>
                  <td>{{item.paket.hargapaket}}</td>
                  <td>{{item.bayar.dp}}</td>
                  <td>{{item.bayar.sisa}}</td>
                  <td>{{item.bayar.lunas}}</td>
                  <td>{{item.bayar.dp != 0 && item.bayar.sisa==0 ? 'Belum Lunas': 'Sudah Lunas'}}</td>
                  <td class="text-right">{{item.bayar.dp == 0 ? item.bayar.lunas: item.bayar.dp + item.bayar.sisa}}</td>
                </tr>
              </tbody>
              <tfoot>
                <td colspan="8"></td>
                <td class="text-right">{{Total}}</td>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>