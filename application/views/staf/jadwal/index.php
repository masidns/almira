<div class="container-fluid" ng-controller="JadwalStafController">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-table mr-1"></i> Daftar Jadwal Almira
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ; text-justify" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Jam Mulai</th>
                                    <th scope="col">Jam Selesai</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <th scope="row">
                                        {{$index+1}}
                                    </th>
                                    <td>{{item.namasiswa}}</td>
                                    <td>{{item.tanggalmulai}}</td>
                                    <td>{{item.tanggalselesai}}</td>
                                    <td>{{item.jadwal.jammulai}}</td>
                                    <td>{{item.jadwal.jamselesai}}</td>
                                    <!-- <td>
                                        <a class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                                                class="fa fa-edit"></i> </a>
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
