angular.module('apps', [
    'adminctrl',
    'helper.service',
    'services',
    "ui.select2",
    "auth.service",
    "storage.services",
    'adminctrl',
    'datatables'
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
});
