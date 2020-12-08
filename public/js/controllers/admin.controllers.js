angular.module('adminctrl', [])
    .controller('pageController', pageController)
    .controller('profileController', profileController)
    .controller('UserController', UserController)
    .controller('LoginController', LoginController)
    .controller('StaffController', StaffController)
    .controller('SiswaController', SiswaController)
    .controller('PaketController', PaketController)
    .controller('KendaraanController', KendaraanController)
    .controller('PersyaratanController', PersyaratanController)
    .controller('JadwalController', JadwalController)
    .controller('KriteriaController', KriteriaController)
    .controller('PembayaranController', PembayaranController)
    .controller('UserSiswaController', UserSiswaController);

function pageController($scope) {
    $scope.Title = "Page Header";
    $.LoadingOverlay("hide");
}

function profileController($scope, helperServices, ProfileServices) {
    // $.LoadingOverlay("hide");
    $scope.roless = helperServices.roles;
    $scope.sex = helperServices.sex;
    $scope.title = "candrakampret";
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    ProfileServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.save = (item) => {
        if (item.idprofile) {
            ProfileServices.put(item).then(_x => {

            })
        } else {
            ProfileServices.post(item).then(_x => {

            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
}


function LoginController($scope) {
    $scope.title = "candrakampret";
    $.LoadingOverlay("hide");
}

function UserController($scope, helperServices) {
    $scope.roles = helperServices.roles;
    $scope.title = "candrakampret";
    $.LoadingOverlay("hide");
}

function StaffController($scope, helperServices, StaffServices) {
    $scope.roless = helperServices.roles;
    $scope.sex = helperServices.sex;
    $scope.title = "candrakampret";
    $scope.simpan = true;
    $scope.myFile;
    $scope.datas = [];
    var fd = new FormData();
    $scope.model = {};
    StaffServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.ChangeFile = (x) => {
        $scope.fileTitle = x.files[0].name;
    };
    $scope.save = (item) => {
        fd.append('file', $scope.myFile[0]);
        for (var prop in $scope.model) {
            fd.append(prop, $scope.model[prop]);
        }
        if (item.idstaf) {
            StaffServices.put(item).then(_x => {

            })
        } else {
            StaffServices.post(fd).then(_x => {

            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
}

function SiswaController($scope, helperServices, SiswaServices, KriteriaServices, StaffServices, PenilaianServices) {
    $scope.roles = helperServices.roles;
    $scope.nilaisiswa = helperServices.nilai;
    $scope.title = "candrakampret";
    $scope.simpan = true;
    $scope.nilai = [];
    $scope.datas = [];
    $scope.model = {};
    $scope.staff = [];
    $scope.kriterianilai = [];
    SiswaServices.get().then(x => {
        $scope.datas = x;
        StaffServices.get().then(staff => {
            $scope.staff = staff;
            KriteriaServices.get().then(param => {
                $scope.kriterianilai = angular.copy(param);
                $.LoadingOverlay("hide");
            })
        })
    })

    $scope.save = (item) => {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-cog fa-spin"
        });
        $scope.model.nilai = item;
        if ($scope.model.penilaian.length != 0) {
            PenilaianServices.put($scope.model).then(x => {
                var data = $scope.datas.find(siswa => siswa.idsiswa == $scope.model.idsiswa);
                data.penilaian = x;
                // swal({
                //     title: "Information!",
                //     text: "Proses berhasil",
                //     icon: "success",
                // });
                // KriteriaServices.get().then(param=>{
                //     $scope.model = {};
                //     $scope.kriterianilai = angular.copy(param);
                //     $.LoadingOverlay("hide");
                // })
                $.LoadingOverlay("hide");
                $scope.model = {};
            })
        } else {
            PenilaianServices.post($scope.model).then(x => {
                var data = $scope.datas.find(siswa => siswa.idsiswa == $scope.model.idsiswa);
                data.penilaian = x;
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
                // KriteriaServices.get().then(param=>{
                //     $scope.model = {};
                //     $scope.kriterianilai = angular.copy(param);
                //     $.LoadingOverlay("hide");
                // })
                $.LoadingOverlay("hide");
                $scope.model = {};
                $('#penilaian').modal('hide');
            })
        }
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }

    $scope.penilaian = (item) => {
        $scope.model = item;
        $('#penilaian').modal('show');
    }
    $scope.view = (item) => {
        $scope.nilai = item.penilaian;
        $('#viewpenilaian').modal('show');
    }
    $scope.pembayaran = (item) => {
        $scope.nilai = angular.copy(item);
        $scope.nilai.bayar = { dp: 0, sisa: 0, lunas: 0, Total: 0 };
        $scope.nilai.pembayaran.forEach(itembayar => {
            if (itembayar.jenis == 'DP') {
                $scope.nilai.bayar.dp = parseInt(itembayar.nominal);
            } else if (itembayar.jenis == 'Sisa') {
                $scope.nilai.bayar.sisa = parseInt(itembayar.nominal);
            } else {
                $scope.nilai.bayar.lunas = parseInt(itembayar.nominal);
            }

        });
        $scope.nilai.bayar.Total += $scope.nilai.bayar.dp == 0 ? $scope.nilai.bayar.lunas : ($scope.nilai.bayar.dp + $scope.nilai.bayar.sisa);
        $('#pembayaran').modal('show');
    }
}

function PaketController($scope, helperServices, PaketServices) {
    $scope.sex = helperServices.sex;
    $scope.ketPaket = helperServices.ketPaket;
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    PaketServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.save = (item) => {
        if (item.idpaket) {
            PaketServices.put(item).then(_x => {
                $scope.model = {};
            })
        } else {
            PaketServices.post(item).then(_x => {
                $scope.model = {};
            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }
}

function KendaraanController($scope, helperServices, KendaraanServices) {
    $scope.roles = helperServices.roles;
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    KendaraanServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.save = (item) => {
        if (item.idkendaraan) {
            KendaraanServices.put(item).then(_x => {
                $scope.model = {};
            })
        } else {
            KendaraanServices.post(item).then(_x => {
                $scope.model = {};
            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }
}

function PersyaratanController($scope, helperServices, PersyaratanServices) {
    $scope.roles = helperServices.roles;
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    PersyaratanServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.save = (item) => {
        if (item.idpersyaratan) {
            PersyaratanServices.put(item).then(_x => {
                $scope.model = {};
            })
        } else {
            PersyaratanServices.post(item).then(_x => {
                $scope.model = {};
            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }
}

function JadwalController($scope, helperServices, JadwalServices, KendaraanServices) {
    $scope.days = helperServices.hari;
    $scope.simpan = true;
    $scope.datas = [];
    $scope.kendaraans = [];
    $scope.model = {};
    JadwalServices.get().then(x => {
        $scope.datas = x;
        KendaraanServices.get().then(resultkendaraan => {
            $scope.kendaraans = resultkendaraan;
            $.LoadingOverlay("hide");
        })
    })
    $scope.save = (item) => {
        item.jammulai = item.jammulai.getHours() + ':' + item.jammulai.getMinutes();
        item.jamselesai = item.jamselesai.getHours() + ':' + item.jamselesai.getMinutes();
        if (item.idjadwal) {
            JadwalServices.put(item).then(_x => {
                $scope.model = {};
            })
        } else {
            JadwalServices.post(item).then(_x => {
                $scope.model = {};
            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        var jammulai = $scope.model.jammulai.split(':');
        $scope.model.jammulai = new Date(2010, 1, 1, jammulai[0], jammulai[1]);

        var jamselesai = $scope.model.jamselesai.split(':');
        $scope.model.jamselesai = new Date(2010, 1, 1, jamselesai[0], jamselesai[1]);
    }
}

function KriteriaController($scope, helperServices, KriteriaServices) {
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    KriteriaServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.save = (item) => {
        if (item.idkriterianilai) {
            KriteriaServices.put(item).then(_x => {
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
                $scope.model = {};
            })
        } else {
            KriteriaServices.post(item).then(_x => {
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
                $scope.model = {};
            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }
}

function PembayaranController($scope, helperServices, SiswaServices) {
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    $scope.Total = 0;
    SiswaServices.get().then(x => {
            $scope.datas = x;
            $scope.datas.forEach(element => {
                element.bayar = { dp: 0, sisa: 0, lunas: 0 };
                element.pembayaran.forEach(itembayar => {
                    if (itembayar.jenis == 'DP') {
                        element.bayar.dp = parseInt(itembayar.nominal);
                    } else if (itembayar.jenis == 'Sisa') {
                        element.bayar.sisa = parseInt(element.paket.hargapaket) - parseInt(itembayar.nominal);
                    } else {
                        element.bayar.lunas = parseInt(itembayar.nominal);
                    }

                });
                $scope.Total += element.bayar.dp == 0 ? element.bayar.lunas : (element.bayar.dp + element.bayar.sisa);
            });
            console.log($scope.datas);
            $.LoadingOverlay("hide");
        })
        // $scope.save = (item) => {
        //     if (item.idkriterianilai) {
        //         KriteriaServices.put(item).then(_x => {
        //             swal({
        //                 title: "Information!",
        //                 text: "Proses berhasil",
        //                 icon: "success",
        //             });
        //             $scope.model ={};
        //         })
        //     } else {
        //         KriteriaServices.post(item).then(_x => {
        //             swal({
        //                 title: "Information!",
        //                 text: "Proses berhasil",
        //                 icon: "success",
        //             });
        //             $scope.model ={};
        //         })
        //     }
        // }
        // $scope.edit = (item) => {
        //     $scope.model = angular.copy(item);
        // }
}

function UserSiswaController($scope, helperServices, SiswaServices, KriteriaServices, StaffServices, PenilaianServices) {
    $scope.roles = helperServices.roles;
    $scope.nilaisiswa = helperServices.nilai;
    $scope.title = "candrakampret";
    $scope.simpan = true;
    $scope.nilai = [];
    $scope.datas = [];
    $scope.model = {};
    $scope.staff = [];
    $scope.kriterianilai = [];
    SiswaServices.getId().then(x => {
        $scope.datas = x;
        StaffServices.get().then(staff => {
            $scope.staff = staff;
            KriteriaServices.get().then(param => {
                $scope.kriterianilai = angular.copy(param);
                $.LoadingOverlay("hide");
            })
        })
    })

    $scope.save = (item) => {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-cog fa-spin"
        });
        $scope.model.nilai = item;
        if ($scope.model.penilaian.length != 0) {
            PenilaianServices.put($scope.model).then(x => {
                var data = $scope.datas.find(siswa => siswa.idsiswa == $scope.model.idsiswa);
                data.penilaian = x;
                // swal({
                //     title: "Information!",
                //     text: "Proses berhasil",
                //     icon: "success",
                // });
                // KriteriaServices.get().then(param=>{
                //     $scope.model = {};
                //     $scope.kriterianilai = angular.copy(param);
                //     $.LoadingOverlay("hide");
                // })
                $.LoadingOverlay("hide");
                $scope.model = {};
            })
        } else {
            PenilaianServices.post($scope.model).then(x => {
                var data = $scope.datas.find(siswa => siswa.idsiswa == $scope.model.idsiswa);
                data.penilaian = x;
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
                // KriteriaServices.get().then(param=>{
                //     $scope.model = {};
                //     $scope.kriterianilai = angular.copy(param);
                //     $.LoadingOverlay("hide");
                // })
                $.LoadingOverlay("hide");
                $scope.model = {};
                $('#penilaian').modal('hide');
            })
        }
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }

    $scope.penilaian = (item) => {
        $scope.model = item;
        $('#penilaian').modal('show');
    }
    $scope.view = (item) => {
        $scope.nilai = item.penilaian;
        $('#viewpenilaian').modal('show');
    }
    $scope.pembayaran = (item) => {
        $scope.nilai = angular.copy(item);
        $scope.nilai.bayar = { dp: 0, sisa: 0, lunas: 0, Total: 0 };
        $scope.nilai.pembayaran.forEach(itembayar => {
            if (itembayar.jenis == 'DP') {
                $scope.nilai.bayar.dp = parseInt(itembayar.nominal);
            } else if (itembayar.jenis == 'Sisa') {
                $scope.nilai.bayar.sisa = parseInt(itembayar.nominal);
            } else {
                $scope.nilai.bayar.lunas = parseInt(itembayar.nominal);
            }

        });
        $scope.nilai.bayar.Total += $scope.nilai.bayar.dp == 0 ? $scope.nilai.bayar.lunas : ($scope.nilai.bayar.dp + $scope.nilai.bayar.sisa);
        $('#pembayaran').modal('show');
    }
}