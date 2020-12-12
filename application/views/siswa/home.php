<div class="container-fluid" ng-controller="UserSiswaController">
  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div>
              <i class="fa fa-table mr-1"></i> Biodata Siswa
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="status" value="{{datas.namasiswa}}">
              </div>
          </div>
          <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="status" value="{{datas.alamatsiswa}}">
              </div>
          </div>
          <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">Tempat Lahir</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="status" value="{{datas.tempatlahir}}">
              </div>
          </div>
          <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="status" value="{{datas.tanggallahir}}">
              </div>
          </div>
          <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">Email</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="status" value="{{datas.email}}">
              </div>
          </div>
          <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">No Telephon</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="status" value="{{datas.notlpn}}">
              </div>
          </div>
          <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">Status Kursus</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="status" value="{{datas.status}}">
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div>
              <i class="fa fa-table mr-1"></i> Paket Siswa
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="status" class="col-sm-6 col-form-label">Nama Paket</label>
                <label for="status" class="col-sm-6 col-form-label">{{datas.paket.namapaket}}</label>
              </div>
              <hr>
              <div class="form-group row">
                <label for="status" class="col-sm-6 col-form-label">Harga Paket</label>
                <label for="status" class="col-sm-6 col-form-label">{{datas.paket.hargapaket}}</label>
              </div>
              <hr>
              <div class="form-group row">
                <label for="status" class="col-sm-6 col-form-label">Keterangan Paket</label>
                <label for="status" class="col-sm-6 col-form-label">{{datas.paket.ketpaket}}</label>
              </div>
              <hr>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="status" class="col-sm-6 col-form-label">Jumlah Pertemuan</label>
                <label for="status" class="col-sm-6 col-form-label">{{datas.paket.jumlahkali}}</label>
              </div>
              <hr>
              <div class="form-group row">
                <label for="status" class="col-sm-6 col-form-label">Durasi Kursus</label>
                <label for="status" class="col-sm-6 col-form-label">{{datas.paket.durasiwaktu}}</label>
              </div>
              <hr>
              <div class="form-group row">
                <label for="status" class="col-sm-6 col-form-label"><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#pembayaran" ng-click="pembayaran(datas)"><i
                                                class="fa fa-money"></i>Detail Pembayaran</a></label>
                <label for="status" class="col-sm-6 col-form-label"><a class="btn btn-warning btn-sm" ng-click="pembayaransisa(datas)" ng-show="nilai.bayar.dp != 0 && nilai.bayar.sisa==0"><i
                                                class="fa fa-money"></i>Pembayaran Sisa</a></label>
              </div>
            </div>
          </div>
        </div>
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div>
              <i class="fa fa-table mr-1"></i> Jadwal Siswa 
            </div>
          </div>
        </div>
        <div class="card-body">
        <div class="card-title">
        <Span>Tanggal Kursus</Span>
        <Span><strong>{{datas.tanggalmulai}}</strong> s/d <strong>{{datas.tanggalselesai}}</strong></Span>
        </div>
            <div class="table-responsive">
                <table class="table table-hover ; text-justify" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{datas.jadwal.jammulai}}</td>
                            <td>{{datas.jadwal.jamselesai}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="viewpenilaian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Daftar Penilaian Peserta Kurusus</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
          <div class="modal-body">
              <table class="table">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kriteria Nilai</th>
                          <th>Hasil</th>
                          <th>Catatan</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr ng-repeat="item in nilai">
                          <td scope="row">{{$index+1}}</td>
                          <td>{{item.listkriteria}}</td>
                          <td>{{item.hasil}}</td>
                          <td>{{item.Keterangan}}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
<div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Detail Pembayaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
          <div class="modal-body">
              <div class="table-responsive">
                  <table class="table table-hover ; text-justify" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th scope="col" rowspan="2">No</th>
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
                          <tr>
                              <th scope="row">
                                  {{$index+1}}
                              </th>
                              <td>{{nilai.paket.namapaket}}</td>
                              <td>{{nilai.paket.hargapaket}}</td>
                              <td>{{nilai.bayar.dp}}</td>
                              <td>{{nilai.bayar.sisa}}</td>
                              <td>{{nilai.bayar.lunas}}</td>
                              <td>{{nilai.bayar.dp != 0 && nilai.bayar.sisa==0 ? 'Belum Lunas': 'Sudah Lunas'}}</td>
                              <td class="text-right">{{nilai.bayar.dp == 0 ? nilai.bayar.lunas: nilai.bayar.dp + nilai.bayar.sisa}}</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
<!-- MODAL -->