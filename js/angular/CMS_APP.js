var apiURL="/cms-api/api.php/records/";
var imageUploadingAPI="/archon/CMSImageUploaderAPI.php";
var CMS_APP = angular.module('CMS_APP',["ngSanitize"]);
CMS_APP.directive("ngUploadChange", function () {
    return {
        scope: {
            ngUploadChange: "&"
        },
        link: function ($scope, $element, $attrs) {
            $element.on("change", function (event) {
                $scope.$apply(function () {
                    $scope.ngUploadChange({ $event: event })
                })
            })
            $scope.$on("$destroy", function () {
                $element.off();
            });
        }
    }
});
CMS_APP.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
});





