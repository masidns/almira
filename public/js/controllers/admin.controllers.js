angular.module('adminctrl', [])
    .controller('pageController', pageController)
    .controller('profileController', profileController)
    .controller('UserController', UserController)
    .controller('LoginController', LoginController)
    .controller('StaffController', StaffController)
    .controller('SiswaController', SiswaController)
    .controller('PaketController', PaketController)
    .controller('KendaraanController', KendaraanController);

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
        if (item.id) {
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
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    PaketServices.get().then(x => {
        $scope.datas = x;
    })
    $scope.save = (item) => {
        if (item.id) {
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
    $scope.sex = helperServices.sex;
    $scope.simpan = true;
    $scope.datas = [];
    $scope.model = {};
    KendaraanServices.get().then(x => {
        $scope.datas = x;
    })
    $scope.save = (item) => {
        if (item.id) {
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