angular.module('userctrl', [])
    .controller('registrasiController', registrasiController)
    .controller('loginController', loginController)

function registrasiController($scope, PersyaratanServices, RegisterServices, PembayaranServices, helperServices, PaketServices) {
    $scope.Title = "Page Header";
    $scope.fileTitle;
    $scope.myFile;
    $scope.model = {};
    $scope.persyaratan = [];
    $scope.paket = {};
    $scope.showRegistrasi = true;
    $scope.dataPembayaran = {}
    var fd = new FormData();
    PersyaratanServices.get().then(x => {
        $scope.persyaratan = x;
        // var pembayaran = $scope.getCookie('data');
        // if (pembayaran != "") {
        //     $scope.showRegistrasi = false;
        //     $scope.dataPembayaran = JSON.parse(pembayaran);
        //     $scope.dataPembayaran.sisa = parseInt($scope.dataPembayaran.nominal) - parseInt($scope.dataPembayaran.nominaldp);
        //     PaketServices.getId($scope.dataPembayaran.idpaket).then(resultPaket => {
        //         $scope.paket = resultPaket;
        //     })
        //     console.log(JSON.parse(pembayaran));
        // }
    })
    $scope.ChangeFile = (x) => {
        $scope.fileTitle = x.files[0].name;
    };
    $scope.setJenisBayar = (item) => {
        if (item == "DP") {
            console.log(item);
        }
    }
    $scope.simpan = () => {
        console.log($scope.model);
        $scope.model.tanggalmulai = $scope.model.tanggalmulai.getFullYear() + "-" + ($scope.model.tanggalmulai.getMonth() + 1) + "-" + $scope.model.tanggalmulai.getDay();
        $scope.model.tanggallahir = $scope.model.tanggallahir.getFullYear() + "-" + ($scope.model.tanggallahir.getMonth() + 1) + "-" + $scope.model.tanggallahir.getDay();
        for (var prop in $scope.model) {
            var type = typeof $scope.model[prop];
            if (typeof $scope.model[prop] == 'object' && $scope.model[prop].length == 1)
                fd.append(prop, $scope.model[prop][0]);
            else
                fd.append(prop, $scope.model[prop]);
        }
        RegisterServices.post(fd).then(x => {
            $scope.setCookie('data', JSON.stringify(x), 14);
            snap.pay(x.token, {
                onSuccess: function(result) {
                    PembayaranServices.status(result.order_id).then(statuspembayaran => {
                        if (statuspembayaran.transaction_status == 'settlement') {
                            var itemUpdate = {};
                            itemUpdate.idpembayaran = x.detailpembayaran.idpembayaran;
                            itemUpdate.transaction_time = statuspembayaran.transaction_time;
                            itemUpdate.transaction_status = statuspembayaran.transaction_status;

                            RegisterServices.put(itemUpdate).then(value => {
                                swal({
                                    title: "Information!",
                                    text: "Proses Pembayaran berhasil",
                                    icon: "success",
                                });
                                $scope.model = {};
                                fd = new FormData();
                                $scope.showRegistrasi = false;
                                x.detailpembayaran.status = 'Success';
                            })
                        } else if (statuspembayaran.transaction_status == 'pending') {
                            swal({
                                title: "Information!",
                                text: "Transaksi sedang diproses",
                                icon: "info",
                            });

                        } else {
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
                    PembayaranServices.status(result.order_id).then(statuspembayaran => {
                        if (statuspembayaran.transaction_status == 'settlement') {
                            var itemUpdate = {};
                            itemUpdate.idpembayaran = x.detailpembayaran.idpembayaran;
                            itemUpdate.transaction_time = statuspembayaran.transaction_time;
                            itemUpdate.transaction_status = statuspembayaran.transaction_status;

                            RegisterServices.put(itemUpdate).then(value => {
                                swal({
                                    title: "Information!",
                                    text: "Proses Pembayaran berhasil",
                                    icon: "success",
                                });
                                $scope.model = {};
                                fd = new FormData();
                                $scope.showRegistrasi = false;
                                x.detailpembayaran.status = 'Success';
                            })
                        } else if (statuspembayaran.transaction_status == 'pending') {
                            swal({
                                title: "Information!",
                                text: "Transaksi sedang diproses",
                                icon: "info",
                            });

                        } else {
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
                    PembayaranServices.status(result.order_id).then(statuspembayaran => {
                        if (statuspembayaran.transaction_status == 'settlement') {
                            swal({
                                title: "Information!",
                                text: "Proses Pembayaran berhasil",
                                icon: "success",
                            });
                        } else if (statuspembayaran.transaction_status == 'pending') {
                            swal({
                                title: "Information!",
                                text: "Transaksi sedang diproses",
                                icon: "info",
                            });

                        } else {
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
                }
            });
        })
    }
    $scope.pembayaransisa = () => {

    }
    $scope.setCookie = (cname, cvalue, exdays) => {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    $scope.getCookie = (cname) => {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    $scope.login = () => {
        document.location.href = helperServices.url + '/login';
    }
}

function loginController($scope, helperServices) {
    $scope.Title = "Page Header";
    $scope.login = () => {
        document.location.href = helperServices.url + '/login';
    }
}