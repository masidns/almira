<div class="container-fluid" ng-controller="PembayaranController">
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Peserta kursus</h4>
          <p><b><?= count($siswa)?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
        <div class="info">
          <h4>Staf dan Instruktur</h4>
          <p><b><?= count($staf)?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
        <div class="info">
          <h4>Pendapatan</h4>
          <p><b>Rp. <?= number_format($total,2,",",".");?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
        <div class="info">
          <h4>Piutang</h4>
          <p><b>Rp. <?= number_format($piutang,2,",",".");?></b></p>
        </div>
      </div>
    </div>


    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div>
              <i class="fa fa-table mr-1"></i> Daftar Pembayaran
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table datatable="ng" class="table table-bordered ; text-justify" id="dataTable" width="100%"
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