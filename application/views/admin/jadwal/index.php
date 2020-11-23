<div class="container-fluid" ng-controller="JadwalController">
    <div class="row">
        <!-- <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table mr-1"></i> Jadwal Almira
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form ng-submit="save(model)">
                        <label for="kendaraan" class="control-label">Nama Mobil</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.namamobil" required
                                placeholder="Nama Mobil" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="kendaraan" class="control-label">Jenis Mobil</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.jenismobil" required
                                    placeholder="Matic/Manual" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                    autofocus>
                        </div>
                        <label for="kendaraan" class="control-label">Merek Mobil</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.merkmobil" required
                                placeholder="Merek Mobil" aria-label="Default"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <label for="kendaraan" class="control-label">Stok Mobil</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.stok" required placeholder="Jumlah Pertemuan"
                                aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        
                        <br>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-primary pull-right">{{simpan?'Simpan':'Ubah'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
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
                        <table class="table table-hover ; text-justify" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Staff</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Kendaraan</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <th scope="row">
                                        {{$index+1}}
                                    </th>
                                    <td>{{item.namastaf}}</td>
                                    <td>{{item.namasiswa}}</td>
                                    <td>{{item.namakendaraan}}</td>
                                    <td>{{item.tanggalmulai}}</td>
                                    <td>{{item.tanggalselesai}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                                                class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
