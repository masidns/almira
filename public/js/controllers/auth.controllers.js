angular.module('authctrl', [])
    .controller('LoginController', LoginController);

function LoginController($scope, helperServices, AuthService) {
    $scope.Title = "Page Header";
    $scope.model ={};
    $scope.login = () => {
        AuthService.login($scope.model).then(x=>{
            document.location.href = helperServices.url + '/home';
        })
    }
}