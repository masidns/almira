<div class="container-fluid" ng-controller="ProfileController">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table mr-1"></i> Tambah Informasi Perusahaan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form ng-submit="save(model)">
                        <label for="layananlain" class="control-label">Layanan Almira</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.layananlain" required
                                placeholder="Layanan lain" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="promo" class="control-label">Promo</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.promo" required
                                placeholder="promo" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="Kontak" class="control-label">Kontak</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.kontak" required
                                placeholder="Kontak" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="Nama Perusahaan" class="control-label">Nama Perusahaan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.namaperusahaan" required
                                placeholder="Nama Perusahaan" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="Alamat" class="control-label">Alamat Perusahaan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.alamat" required
                                placeholder="Alamat" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="Email" class="control-label">Email Perusahaan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.email" required
                                placeholder="Email" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
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
                            <i class="fa fa-table mr-1"></i> Profile Perusahaan Almira
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ; text-justify" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">No</th>
                                    <th scope="col">Layanan Almira</th>
                                    <th scope="col">Promo</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Visi</th>
                                    <th scope="col">Misi</th>
                                    <th scope="col" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <th scope="row">
                                        {{$index+1}}
                                    </th>
                                    <td>{{item.layananlain}}</td>
                                    <td>{{item.promo}}</td>
                                    <td>{{item.kontak}}</td>
                                    <td>{{item.namaperusahaan}}</td>
                                    <td>{{item.alamat}}</td>
                                    <td>{{item.email}}</td>
                                    <td>{{item.visi}}</td>
                                    <td>{{item.misi}}</td>
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
