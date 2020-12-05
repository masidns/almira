<div class="container-fluid" ng-controller="SiswaController">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table mr-1"></i> Daftar User
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table datatable="ng" class="table table-hover ; text-justify" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Sebagai</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <th scope="row">
                                        {{$index+1}}
                                    </th>
                                    <td>{{item.namasiswa}}</td>
                                    <td>{{item.alamatsiswa}}</td>
                                    <td>{{item.tempatlahir}}</td>
                                    <td>{{item.tanggallahir}}</td>
                                    <td>{{item.notlpn}}</td>
                                    <td>{{item.email}}</td>
                                    <td>{{item.roles.rule}}</td>
                                    <td>{{item.penilaian.length==0 ? 'Proses' : 'Selesai'}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" ng-click="view(item)"><i
                                                class="fa fa-eye"></i> </a>
                                        <a class="btn btn-info btn-sm" ng-click="pembayaran(item)"><i
                                                class="fa fa-money"></i> </a>
                                        <a class="btn btn-secondary btn-sm" ng-click="penilaian(item)" ng-show="item.penilaian.length==0"><i
                                                class="fa fa-file"></i> </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="penilaian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Penilaian Peserta Kurusus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form ng-submit="save(kriterianilai)">
                    <div class="modal-body">
                        <div class="form-group" ng-repeat="item in kriterianilai">
                            <label class="col-form-label"><strong>{{item.listkriteria | uppercase}}</strong></label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Nilai</label>
                                    <select class="form-control" name="nilai" ng-options="item as item for item in nilaisiswa" ng-model="item.nilai.hasil">
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Instruktur</label>
                                    <select class="form-control" ng-options="item as item.namastaf for item in staff" ng-model="item.staf">
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control" ng-model="item.nilai.keterangan" placeholder="Keterangan">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
</div>
