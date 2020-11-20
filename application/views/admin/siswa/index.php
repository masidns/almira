<div class="container-fluid" ng-controller="siswaController">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <i class="fa fa-table"></i>
                    User Siswa
                    </div>
                    <div>
                        <a href="" class="btn btn-success btn-sm"><i class="fas fa-plus mr-1"></i>Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row">
            <div class="col-md-12">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <div>
                        <i class="fas fa-table mr-1"></i>
                    Data Kategori KBLI
                    </div>
                    <div>
                        <a href="<?= base_url('kategorikbli/tambah') ?>" class="btn btn-success btn-sm"><i class="fas fa-plus mr-1"></i>Tambah</a>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>