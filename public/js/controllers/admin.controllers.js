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
    .controller('JadwalController', JadwalController);

function pageController($scope) {
    $scope.Title = "Page Header";
}

function profileController($scope) {
    $scope.title = "candrakampret";
}

function LoginController($scope) {
    $scope.title = "candrakampret";
}

function UserController($scope, helperServices) {
    $scope.roles = helperServices.roles;
    $scope.title = "candrakampret";
}

function StaffController($scope, helperServices, StaffServices) {
    $scope.roles = helperServices.roles;
    $scope.sex = helperServices.sex;
    $scope.title = "candrakampret";
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    StaffServices.get().then(x => {
        $scope.datas = x;
    })
    $scope.save = (item) => {
        if (item.staf) {
            StaffServices.put(item).then(_x => {

            })
        } else {
            StaffServices.post(item).then(_x => {

            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
}

function SiswaController($scope, helperServices, SiswaServices) {
    $scope.roles = helperServices.roles;
    $scope.title = "candrakampret";
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    SiswaServices.get().then(x => {
        $scope.datas = x;
    })
    $scope.save = (item) => {
        if (item.idsiswa) {
            SiswaServices.put(item).then(_x => {

            })
        } else {
            SiswaServices.post(item).then(_x => {

            })
        }
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
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
    })
    $scope.save = (item) => {
        if (item.idpaket) {
            PaketServices.put(item).then(_x => {

            })
        } else {
            PaketServices.post(item).then(_x => {

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
    })
    $scope.save = (item) => {
        if (item.idkendaraan) {
            KendaraanServices.put(item).then(_x => {

            })
        } else {
            KendaraanServices.post(item).then(_x => {

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
    })
    $scope.save = (item) => {
        if (item.idpersyaratan) {
            PersyaratanServices.put(item).then(_x => {

            })
        } else {
            PersyaratanServices.post(item).then(_x => {

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
        KendaraanServices.get().then(resultkendaraan=>{
            $scope.kendaraans = resultkendaraan;
        })
    })
    $scope.save = (item) => {
        item.jammulai = item.jammulai.getHours() + ':'+ item.jammulai.getMinutes();
        item.jamselesai = item.jamselesai.getHours() + ':'+ item.jamselesai.getMinutes();
        if (item.idjadwal) {
            JadwalServices.put(item).then(_x => {

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
        $scope.model.jammulai = new Date(2010, 1,1, jammulai[0],jammulai[1]);

        var jamselesai = $scope.model.jamselesai.split(':');
        $scope.model.jamselesai = new Date(2010, 1,1, jamselesai[0],jamselesai[1]);
    }
}