<div class="container-fluid" ng-controller="StaffController">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table mr-1"></i> Tambah User
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form ng-submit="save(model)">
                        <label for="iduser" class="control-label">Nama</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.namastaf" required
                                placeholder="Nama" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                autofocus>
                        </div>
                        <label for="iduser" class="control-label">Alamat</label>
                        <div class="input-group mb-3">
                            <textarea rows="3" class="form-control" ng-model="model.alamat" required></textarea>
                        </div>
                        <label for="iduser" class="control-label">Telepon</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" ng-model="model.tlpn" required
                                placeholder="Telepon" aria-label="Default"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <label for="iduser" class="control-label">Upload Foto</label>
                        <div class="input-group mb-3">
                        <input type="file" required="required" class="form-control" id="inputFile"
									file-model="myFile" accept="image/*"
									onchange="angular.element(this).scope().ChangeFile(this)" />
                        </div>
                        <label for="iduser" class="control-label">Email</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" ng-model="model.email" required placeholder="email"
                                aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <label ng-if="simpan" for="iduser" class="control-label">Password</label>
                        <div class="input-group mb-3" ng-show="simpan">
                            <input type="password" class="form-control" ng-model="model.password"
                                aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <label ng-if="simpan" for="">Akses</label>
                        <div class="input-group sm-3" ng-if="simpan">
                            <select ui-select2 class="form-control" ng-options="item as item.rule for item in roless"
                                ng-model="model.roles"ng-change="model.idrule = model.roles.idrule">
                            </select>
                        </div><br>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Sebagai</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <th scope="row">
                                        {{$index+1}}
                                    </th>
                                    <td>{{item.namastaf}}</td>
                                    <td>{{item.tlpn}}</td>
                                    <td>{{item.email}}</td>
                                    <td>{{item.roles.rule}}</td>
                                    <td><img src="<?= base_url()?>public/fotostaf/{{item.foto}}" alt="" width="50%"></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                                                class="fa fa-edit"></i> </a>
                                    </td>
                                    <!-- <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="{{item.id}}"
                                                ng-model="item.status" ng-checked="item.status" ng-change="save(item)">
                                            <label class="custom-control-label" for="{{item.id}}"></label>
                                        </div>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>