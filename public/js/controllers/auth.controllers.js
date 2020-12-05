angular.module('authctrl', [])
    .controller('LoginController', LoginController);

function LoginController($scope, helperServices, AuthService) {
    $scope.Title = "Page Header";
    $scope.model = {};
    $scope.login = () => {
        AuthService.login($scope.model).then(x => {
            if (x.rule.rule == 'Admin')
                document.location.href = helperServices.url + '/admin/home';
            else if (x.rule.rule == 'Staf')
                document.location.href = helperServices.url + '/staf/home';
            else
                document.location.href = helperServices.url + '/siswa/home';
        })
    }
}