CMS_APP.controller('BannerContentController', function ($scope, $http, scopeService, UploadService, $timeout) {
            $scope.bannerContent = {};
            const APIURL = root + "archon/banner-content/api/index.php";
            $scope.types = ["Image", "Video"];
            $scope.uploadStatus = {
                color: "danger",
                text: "",
                active: false
            };
            $scope.getBannerContent = function () {
                $http.get(APIURL+"?id=1").then(function (res) {
                    scopeService.safeApply($scope, function () {
                        $scope.bannerContent = res.data;
                    });
                });
            }

            $scope.getBannerContent();

            $scope.fileChangeEvent = function ($event) {
                var input = $event.target.files[0];
                if (input) {
                    if ($scope.bannerContent.contentType == "Image") {
                        $scope.uploadStatus = {color: "primary",text: "Uploading..",active: true};
                        UploadService.uploadImage(input, "banner_content").then(savedImagePath => {
                            $scope.bannerContent.contentURL = savedImagePath;
                            scopeService.safeApply($scope, function () {$scope.uploadStatus = {color: "success",text: "Uploaded",active: true};setTimeout(m => {scopeService.safeApply($scope, function () {$scope.uploadStatus = {color: "danger",text: "",active: false};});}, 3000)});
                        }).catch(e => {
                                $scope.uploadStatus = {color: "danger",text: e,active: true};
                        })
                    }
                    else {
                        $scope.uploadStatus = {color: "primary",text: "Uploading..",active: true};
                        UploadService.uploadVideo(input, "banner_content").then(savedVideoPath => {                                    
                            scopeService.safeApply($scope, function () {$scope.bannerContent.contentURL = savedVideoPath;$scope.uploadStatus = {color: "success",text: "Uploaded",active: true};setTimeout(m => {scopeService.safeApply($scope, function () {$scope.uploadStatus = {color: "danger",text: "",active: false};});}, 1000)});
                        }).catch(e => {
                            $scope.uploadStatus = {color: "danger",text: e,active: true};
                        })
                    }

                } else {
                    alert("Invalid file");
                }
            }
    $scope.Save = function () {
        $http.put(APIURL,$scope.bannerContent).then(function (res) {
            alert("Saved!")
        });
    }
});