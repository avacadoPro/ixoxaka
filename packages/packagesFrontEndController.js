CMS_APP.controller('packagesFrontEndController', function ($scope, $http, scopeService, imageUploadService, $timeout) {

    $scope.packages = [];
    
    $scope.services = [];
    
    const APIURL_package = root + "archon/packages/api/index.php";
    const APIURL_packageServices = root + "archon/packageServices/api/index.php";
    const APIURL_packageServicesSelected = root + "archon/packageServicesSelected/api/index.php";
    $scope.getallservices = function () {
        return new Promise((resolve,reject)=>{
            if($scope.services.length==0){
                $http.get(APIURL_packageServices).then(function (res) {
                    scopeService.safeApply($scope, function () {
                        res.data.records.forEach(function (service) {
                            service["isCheck"] = false;
                            $scope.services.push(service);
                        })
                        resolve(true);
                    });
                });
            }else{
                resolve(true);
            }
            
        })
       
    }
    $scope.getpackages = function () {
        $scope.getallservices().then(m=>{
            $http.get(APIURL_package).then(function (res) {
                scopeService.safeApply($scope, function () {
                    $scope.packages = res.data.records;
                    $scope.packages.forEach(function (package,key) {
                        package['headerClass']= (key%2==0)?"greenBackGround":"blackBackGround";
                        package.services= JSON.parse(JSON.stringify($scope.services));
                        $scope.Load(package);
                        // $http.get(apiURL + "/packageservicesselected?filter=packageId,eq," + package.id).then(function (res) {
                        //     let services = "";
                        //     res.data.records.forEach(function (packageservicesselected, key) {
                        //         $http.get(apiURL + "/packageservices/" + packageservicesselected.packegeServiceId).then(cat => {
                        //             services += cat.data.title;
                        //             if (key != res.data.records.length - 1)
                        //                 services += ","
                        //             package['servicesComma'] = services;                                
                        //             $scope.search();
                        //         })
                        //     });
                        // })
                    })
                });
            });
        })
        
    }
    
    $scope.getpackages();


    $scope.Load = function (package) {
        $http.get(APIURL_packageServicesSelected + "?packageId=" + package.id).then(function (res) {
            res.data.records.forEach(packageservicesselected => {
                findInservices(package,packageservicesselected);
            });
        })
    }

    function findInservices(package,packageservicesselected) {
        let service = package.services.find(m => m.id == packageservicesselected.packegeServiceId);
        if(service){
            service['isCheck'] = true;
            service["packageservicesselectedId"] = packageservicesselected.id;
        }else{

        }
       
    }
});