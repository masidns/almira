<div class="container-fluid" ng-controller="JadwalController">
    <div class="row">
        <div class="col-md-4">
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
                        <label for="kendaraan" class="control-label">Hari</label>
                        <div class="input-group mb-3">
                              <select class="form-control" ng-options="item as item for item in days" ng-model="model.hari">
                                <option value=""></option>
                              </select>
                        </div>
                        <label for="kendaraan" class="control-label">Jam Mulai</label>
                        <div class="input-group mb-3">
                            <input type="time" class="form-control" ng-model="model.jammulai" required
                                     aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                    autofocus>
                        </div>
                        <label for="kendaraan" class="control-label">Jam Selesai</label>
                        <div class="input-group mb-3">
                            <input type="time" class="form-control" ng-model="model.jamselesai" required
                                aria-label="Default"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <label for="kendaraan" class="control-label">Kendaraan</label>
                        <div class="input-group mb-3">
                            <select class="form-control" ng-options="item as (item.namamobil + ' - ' + item.jenismobil) for item in kendaraans" ng-model="model.kendaraan">
                              </select>
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
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam Mulai</th>
                                    <th scope="col">Jam Selesai</th>
                                    <th scope="col">Mobil</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <th scope="row">
                                        {{$index+1}}
                                    </th>
                                    <td>{{item.hari}}</td>
                                    <td>{{item.jammulai}}</td>
                                    <td>{{item.jamselesai}}</td>
                                    <td>{{item.kendaraan.namamobil}}</td>
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
