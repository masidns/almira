angular.module('adminctrl', [])
    .controller('pageController', pageController)
    .controller('ProfileController', ProfileController)
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
    .controller('UserSiswaController', UserSiswaController)
    .controller('LaporanController', LaporanController)
    .controller('JadwalStafController', JadwalStafController)
    .controller('GrafikController', GrafikController);

function pageController($scope) {
    $scope.Title = "Page Header";
    $.LoadingOverlay("hide");
}

function ProfileController($scope, helperServices, ProfileServices) {
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
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
            })
        } else {
            ProfileServices.post(item).then(_x => {
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
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
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
            })
        } else {
            StaffServices.post(fd).then(_x => {
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
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
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
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
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
            })
        } else {
            PaketServices.post(item).then(_x => {
                $scope.model = {};
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }
    $scope.delete = (item) => {
        PaketServices.delete(item.idpaket).then((x) => {
            swal("Information!", "Berhasil dihapus", "success");
        })
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
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
            })
        } else {
            KendaraanServices.post(item).then(_x => {
                $scope.model = {};
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
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
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
            })
        } else {
            PersyaratanServices.post(item).then(_x => {
                $scope.model = {};
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
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
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
            })
        } else {
            JadwalServices.post(item).then(_x => {
                $scope.model = {};
                swal({
                    title: "Information!",
                    text: "Proses berhasil",
                    icon: "success",
                });
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
    $scope.delete = (item) => {
        KriteriaServices.delete(item.idkriterianilai).then((x) => {
            swal("Information!", "Berhasil dihapus", "success");
        })
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

function UserSiswaController($scope, helperServices, SiswaServices, KriteriaServices, StaffServices, PenilaianServices, PembayaranServices, RegisterServices) {
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
        $scope.pembayaran($scope.datas);
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
    $scope.prosesBayar = (x) => {
        snap.pay(x.token, {
            onSuccess: function(result) {
                $.LoadingOverlay("show", {
                    image: "",
                    fontawesome: "fa fa-cog fa-spin"
                });
                PembayaranServices.status(result.order_id).then(statuspembayaran => {

                    if (statuspembayaran.transaction_status == 'settlement') {
                        var itemUpdate = {};
                        itemUpdate.idpembayaran = x.detailpembayaran.idpembayaran;
                        itemUpdate.transaction_time = statuspembayaran.transaction_time;
                        itemUpdate.transaction_status = statuspembayaran.transaction_status;

                        RegisterServices.put(itemUpdate).then(value => {
                            $.LoadingOverlay("hide");
                            swal({
                                title: "Information!",
                                text: "Proses Pembayaran berhasil",
                                icon: "success",
                            });
                            SiswaServices.getId().then(x => {
                                $scope.datas = x;
                                $scope.pembayaran($scope.datas);
                                StaffServices.get().then(staff => {
                                    $scope.staff = staff;
                                    KriteriaServices.get().then(param => {
                                        $scope.kriterianilai = angular.copy(param);
                                        $.LoadingOverlay("hide");
                                    })
                                })
                            })
                            $scope.model = {};
                            fd = new FormData();
                            $scope.showRegistrasi = false;
                            x.detailpembayaran.status = 'Success';
                        })
                    } else if (statuspembayaran.transaction_status == 'pending') {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Information!",
                            text: "Transaksi sedang diproses",
                            icon: "info",
                        });

                    } else {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Information!",
                            text: "Transaksi di batalkan",
                            icon: "error",
                        });
                    }
                    x.pembayaran = statuspembayaran;
                    // $scope.setCookie('data', JSON.stringify(x), 14);
                    console.log(x);
                })
            },
            onPending: function(result) {
                $.LoadingOverlay("show", {
                    image: "",
                    fontawesome: "fa fa-cog fa-spin"
                });
                PembayaranServices.status(result.order_id).then(statuspembayaran => {

                    if (statuspembayaran.transaction_status == 'settlement') {
                        var itemUpdate = {};
                        itemUpdate.idpembayaran = x.detailpembayaran.idpembayaran;
                        itemUpdate.transaction_time = statuspembayaran.transaction_time;
                        itemUpdate.transaction_status = statuspembayaran.transaction_status;

                        RegisterServices.put(itemUpdate).then(value => {
                            $.LoadingOverlay("hide");
                            swal({
                                title: "Information!",
                                text: "Proses Pembayaran berhasil",
                                icon: "success",
                            });
                            SiswaServices.getId().then(x => {
                                $scope.datas = x;
                                $scope.pembayaran($scope.datas);
                                StaffServices.get().then(staff => {
                                    $scope.staff = staff;
                                    KriteriaServices.get().then(param => {
                                        $scope.kriterianilai = angular.copy(param);
                                        $.LoadingOverlay("hide");
                                    })
                                })
                            })
                            $scope.model = {};
                            fd = new FormData();
                            $scope.showRegistrasi = false;
                            x.detailpembayaran.status = 'Success';
                        })
                    } else if (statuspembayaran.transaction_status == 'pending') {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Information!",
                            text: "Transaksi sedang diproses",
                            icon: "info",
                        });

                    } else {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Information!",
                            text: "Transaksi di batalkan",
                            icon: "error",
                        });
                    }
                    x.pembayaran = statuspembayaran;
                    // $scope.setCookie('data', JSON.stringify(x), 14);
                    console.log(x);
                })

            },
            onError: function(result) {
                $.LoadingOverlay("show", {
                    image: "",
                    fontawesome: "fa fa-cog fa-spin"
                });
                PembayaranServices.status(result.order_id).then(statuspembayaran => {

                    if (statuspembayaran.transaction_status == 'settlement') {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Information!",
                            text: "Proses Pembayaran berhasil",
                            icon: "success",
                        });
                    } else if (statuspembayaran.transaction_status == 'pending') {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Information!",
                            text: "Transaksi sedang diproses",
                            icon: "info",
                        });

                    } else {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Information!",
                            text: "Transaksi di batalkan",
                            icon: "error",
                        });
                    }
                    x.pembayaran = statuspembayaran;
                    // $scope.setCookie('data', JSON.stringify(x), 14);
                    console.log(x);
                })
            },

        });
    }
    $scope.pembayaransisa = (item) => {
        if (item.token) {
            $scope.prosesBayar($scope.datas);
        } else {
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-cog fa-spin"
            });
            SiswaServices.getToken(item).then(x => {
                $.LoadingOverlay("hide");
                $scope.prosesBayar(x);
            })
        }
    }
    $scope.statusSisa;
    $scope.pembayaran = (item) => {
        $scope.nilai = angular.copy(item);
        $scope.nilai.bayar = { dp: 0, sisa: 0, lunas: 0, Total: 0 };
        $scope.nilai.pembayaran.forEach(itembayar => {
            if (itembayar.jenis == 'DP') {
                $scope.nilai.bayar.dp = parseInt(itembayar.nominal);
            } else if (itembayar.jenis == 'Sisa') {
                $scope.nilai.bayar.sisa = parseInt(itembayar.nominal);
                $scope.statusSisa = itembayar.status;
                $scope.datas.token = itembayar.token;
                $scope.datas.detailpembayaran = itembayar;
            } else {
                $scope.nilai.bayar.lunas = parseInt(itembayar.nominal);
            }

        });
        $scope.nilai.bayar.Total += $scope.nilai.bayar.dp == 0 ? $scope.nilai.bayar.lunas : ($scope.nilai.bayar.dp + $scope.nilai.bayar.sisa);
        // $('#pembayaran').modal('show');
    }
}

function LaporanController($scope, helperServices, LaporanServices) {
    $scope.roles = helperServices.roles;
    $scope.nilaisiswa = helperServices.nilai;
    $scope.simpan = true;
    $scope.nilai = [];
    $scope.datas = [];
    $scope.stafs = [];
    $scope.kendaraans = [];
    $scope.model = {};
    $scope.staff = [];
    $scope.kriterianilai = [];
    $scope.Init = () => {
        LaporanServices.staf($scope.model).then(x => {
            $scope.stafs = x;
            LaporanServices.kendaraan($scope.model).then(x => {
                $scope.kendaraans = x;
                $.LoadingOverlay("hide");
            })
        })
    }
    $scope.showSiswa = (item) => {
        $.LoadingOverlay("show");
        var a = item.split(' - ');
        if (a[0] !== a[1]) {
            $scope.model.awal = a[0];
            $scope.model.akhir = a[1];
            LaporanServices.siswa($scope.model).then(x => {
                $scope.datas = x;
                $.LoadingOverlay("hide");
            })
        }
        $.LoadingOverlay("hide");
    }

    $scope.showKeuangan = (item) => {
        $.LoadingOverlay("show");
        var a = item.split(' - ');
        if (a[0] !== a[1]) {
            $scope.model.awal = a[0];
            $scope.model.akhir = a[1];
            LaporanServices.siswa($scope.model).then(x => {
                $scope.Total = 0;
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
                $.LoadingOverlay("hide");
            })
        }
        $.LoadingOverlay("hide");
    }
    $scope.print = () => {
        $("#print").printArea();
    }

}

function JadwalStafController($scope, helperServices, JadwalStafServices, KendaraanServices) {
    $scope.days = helperServices.hari;
    $scope.simpan = true;
    $scope.datas = [];
    $scope.kendaraans = [];
    $scope.model = {};
    JadwalStafServices.get().then(x => {
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
            JadwalStafServices.put(item).then(_x => {
                $scope.model = {};
            })
        } else {
            JadwalStafServices.post(item).then(_x => {
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

function GrafikController($scope, helperServices, SiswaServices) {
    $scope.itemgrafik = helperServices.itemgrafik;
    $scope.datas = {};
    SiswaServices.getGrafik().then(x => {
        $scope.datas = x;
        // $scope.grafik();
    })

    $scope.showData = (item) => {
            var dataset = [];
            var sum;
            if (item == 'Usia') {
                var items = {};
                var datas = angular.copy($scope.datas.usia);
                var data = [];
                var datasum = Object.values(datas);
                sum = 0;
                datasum.forEach(element => {
                    sum += parseInt(element);
                });
                console.log(sum);
                for (const [key, value] of Object.entries(datas)) {
                    var itemusia = {};
                    itemusia.name = `${key}`;
                    itemusia.y = parseInt(`${value}`) / sum * 100;
                    itemusia.drilldown = `${key}`;
                    data.push(angular.copy(itemusia));
                }

                items.name = item;
                items.colorByPoint = true;
                items.data = data;
                dataset = items;
                console.log(data);
                // $scope.grafik();
            } else {
                var items = {};
                var datas = angular.copy($scope.datas.gender);
                var data = [];
                var datasum = Object.values(datas);
                sum = 0;
                datasum.forEach(element => {
                    sum += parseInt(element);
                });
                console.log(sum);
                for (const [key, value] of Object.entries(datas)) {
                    var itemusia = {};
                    itemusia.name = `${key}`;
                    itemusia.y = parseInt(`${value}`) / sum * 100;
                    itemusia.drilldown = `${key}`;
                    data.push(angular.copy(itemusia));
                }

                items.name = item;
                items.colorByPoint = true;
                items.data = data;
                dataset = items;
                console.log(data);
            }
            var a = [{
                    name: "Chrome",
                    y: 62.74,
                    drilldown: "Chrome"
                },
                {
                    name: "Firefox",
                    y: 10.57,
                    drilldown: "Firefox"
                },
                {
                    name: "Internet Explorer",
                    y: 7.23,
                    drilldown: "Internet Explorer"
                },
                {
                    name: "Safari",
                    y: 5.58,
                    drilldown: "Safari"
                },
                {
                    name: "Edge",
                    y: 4.02,
                    drilldown: "Edge"
                },
                {
                    name: "Opera",
                    y: 1.92,
                    drilldown: "Opera"
                },
                {
                    name: "Other",
                    y: 7.62,
                    drilldown: null
                }
            ]
            console.log(a);
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Presentase'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category',
                    title: {
                        text: item
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> from<br/> ' + sum + ' Siswa'
                },

                series: [{
                    name: item,
                    colorByPoint: true,
                    data: dataset.data
                }]
            });
        }
        // Create the chart

    $scope.grafik = (data) => {
        // $('#myChart').remove(); // this is my <canvas> element
        // $('.card-body').append(
        //     '<canvas id="myChart"class="chartjs" width="770" height="385"style="display: block; width: 770px; height: 385px;"><canvas>'
        // );

    };

}