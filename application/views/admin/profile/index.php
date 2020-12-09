<div class="container-fluid" ng-controller="ProfileController">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class=""></i> Tambah Informasi Perusahaan
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="status" class="col-sm-6 col-form-label">Nama Perusahaan</label>
                                <label for="status" class="col-sm-6 col-form-label"><?= $profile['namaperusahaan']?></label>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="status" class="col-sm-6 col-form-label">Layanan Almira</label>
                                <label for="status" class="col-sm-6 col-form-label"><?= $profile['layananlain']?></label>
                            </div>
                            <hr>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label for="status" class="col-sm-6 col-form-label">Layanan Almira</label>
                                <label for="status" class="col-sm-6 col-form-label"><?= $profile['layananlain']?></label>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="status" class="col-sm-6 col-form-label">Kontak</label>
                                <label for="status" class="col-sm-6 col-form-label"><?= $profile['kontak']?></label>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="status" class="col-sm-6 col-form-label">Email Kantor</label>
                                <label for="status" class="col-sm-6 col-form-label"><?= $profile['email']?></label>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="">
                        <div>
                            <i class="text-center"></i> VISI
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="status" class="col-sm-12 col-form-label"><?= $profile['visi']?></label>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="text-justify-content-between"></i> MISI
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="status" class="col-sm-12 col-form-label"><?= $profile['misi']?></label>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
