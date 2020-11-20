angular.module('adminctrl', [])
    .controller('pageController', pageController)
    .controller('profileController', profileController)
    .controller('UserController', UserController)
    .controller('LoginController', LoginController)
    .controller('StaffController', StaffController)
    .controller('siswaController', siswaController)
    ;

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
    StaffServices.get().then(x => {
        $scope.datas = x;
    })
    $scope.save = (item) => {
        if (item.id) {
            StaffServices.put(item).then(x => {

            })
        } else {
            StaffServices.post(item).then(x => {

            })
        }
    }
}
function siswaController($scope, helperServices, SiswaServices) {
    $scope.roles = helperServices.roles;
    $scope.sex = helperServices.sex;
    $scope.title = "candrakampret";
    $scope.simpan = true;
    $scope.datas = [];
    StaffServices.get().then(x => {
        $scope.datas = x;
    })
    $scope.save = (item) => {
        if (item.id) {
            StaffServices.put(item).then(x => {

            })
        } else {
            StaffServices.post(item).then(x => {

            })
        }
    }
}