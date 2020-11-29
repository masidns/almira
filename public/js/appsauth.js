angular.module('appsauth', [
    'helper.service',
    'services',
    "ui.select2",
    "auth.service",
    "storage.services",
    'authctrl'
])
.directive('fileModel', function ($parse) {
    return {
       restrict: 'A',
       link: function(scope, element, attrs) {
          element.bind('change', function(){
          $parse(attrs.fileModel).assign(scope,element[0].files)
             scope.$apply();
          });
       }
    };
})
.filter('removeSpaces', [function() {
   return function(string) {
       if (!angular.isString(string)) {
           return string;
       }
       return string.replace(/[\s]/g, '');
   };
}]);
