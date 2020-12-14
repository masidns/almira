<div class="container-fluid" ng-controller="PaketController">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table mr-1"></i> Tambah Paket
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form ng-submit="save(model)">
                        <label for="paket" class="control-label">Nama Paket</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.namapaket" required
                                placeholder="Nama Paket" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="paket" class="control-label">Harga Paket</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.hargapaket" required
                                    placeholder="Harga Paket" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                    autofocus>
                        </div>
                        <label for="paket" class="control-label">Keterangan Paket</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="ketpaket" ng-options="item as item for item in ketPaket" ng-model="model.ketpaket">
                            </select>
                        </div>
                        <label for="paket" class="control-label">Pertemuan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.jumlahkali" required placeholder="Jumlah Pertemuan"
                                aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <label for="paket" class="control-label">Durasi Waktu</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.durasiwaktu" required placeholder="Durasi Pertemuan"
                                aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        
                        <br>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-primary pull-right">{{simpan?'Simpan':'Ubah'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table mr-1"></i> Daftar Paket Almira
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ; text-justify" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Keterangan Paket</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Durasi Waktu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <th scope="row">
                                        {{$index+1}}
                                    </th>
                                    <td>{{item.namapaket}}</td>
                                    <td>{{item.hargapaket}}</td>
                                    <td>{{item.ketpaket}}</td>
                                    <td>{{item.jumlahkali}}</td>
                                    <td>{{item.durasiwaktu}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                                                class="fa fa-edit"></i> </a>
                                        <!-- <a class="btn btn-danger btn-sm" ng-click="delete(item)"><i
                                                class="fa fa-trash"></i> </a> -->
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
