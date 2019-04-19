CMS_APP.controller('packagesController', function ($scope, $http, scopeService, imageUploadService, $timeout) {
    $scope.package = {};
    $scope.packages = [];
    $scope.filteredpackages = [];
    $scope.services = [];
    $scope.packageservicesselectedDeleted = [];
    $scope.formBusy = false;
    $scope.searchTxt = "";
    $scope.types = [{
            value: "Select Type",
            id: ""
        },
        {
            value: "Monthly",
            id: "Months"
        },
        {
            value: "Yearly",
            id: "Years"
        }
    ]

    const APIURL_package = root + "archon/packages/api/index.php";
    const APIURL_packageServices = root + "archon/packageServices/api/index.php";
    const APIURL_packageServicesSelected = root + "archon/packageServicesSelected/api/index.php";
    $scope.getpackages = function () {
        $http.get(APIURL_package).then(function (res) {
            scopeService.safeApply($scope, function () {
                $scope.search();
                $scope.packages = res.data;
                $scope.packages.forEach(function (package) {
                    $http.get(APIURL_packageServicesSelected + "?packageId=" + package.id).then(function (res) {
                        let services = "";
                        if (res.data)
                            res.data.forEach(function (packageservicesselected, key) {
                                $http.get(APIURL_packageServices + "?id=" + packageservicesselected.packegeServiceId).then(cat => {
                                    services += cat.data.title;
                                    if (key != res.data.length - 1)
                                        services += ","
                                    package['servicesComma'] = services;
                                    $scope.search();
                                })
                            });
                    })
                })
            });
        });
    }
    $scope.search = function () {
        if ($scope.searchTxt != "") {
            $scope.filteredpackages = [];
            let s = $scope.searchTxt.toLowerCase();
            $scope.packages.forEach(m => {
                if (m.title.toLowerCase().includes(s) || (m.servicesComma && m.servicesComma.toLowerCase().includes(s))) {
                    $scope.filteredpackages.push(m);
                }
            })
        } else {
            $scope.filteredpackages = $scope.packages;
        }
    }

    $scope.getpackages();


    $scope.getallservices = function () {
        $scope.services = [];
        $scope.packageservicesselectedDeleted = [];
        $http.get(APIURL_packageServices).then(function (res) {
            scopeService.safeApply($scope, function () {
                res.data.forEach(function (service) {
                    service["isCheck"] = false;
                    $scope.services.push(service);
                })
            });
        });
    }
    $scope.serviceClick = function (service) {
        if (service.isCheck && service.packageservicesselectedId) {
            let found = $scope.packageservicesselectedDeleted.find(function (element) {
                return element == service.packageservicesselectedId;
            });
            if (!found) {
                $scope.packageservicesselectedDeleted.push(service.packageservicesselectedId);
            }

        }
        service.isCheck = (service.isCheck) ? false : true;

    }
    $scope.clear = function () {

        $scope.package = {
            id: 0,
            title: "",
            type: "",
            duration: 0,
            price: 0,
            servicesComma: [],
            errors: {
                imageError: null
            }
        };
        $scope.formBusy = false;
        $scope.getallservices();
    }
    $scope.clear();

    $scope.Load = function (package) {
        $scope.package = JSON.parse(JSON.stringify(package));
        $scope.package["errors"] = {
            imageError: null
        };
        $http.get(APIURL_packageServicesSelected + "?packageId=" + package.id).then(function (res) {
            res.data.forEach(packageservicesselected => {
                findInservices(packageservicesselected);
            });

        })
    }

    function findInservices(packageservicesselected) {
        let service = $scope.services.find(m => m.id == packageservicesselected.packegeServiceId);
        service.isCheck = true;
        service["packageservicesselectedId"] = packageservicesselected.id;
    }

    $scope.save = function () {
        $scope.saveHelper();
    }
    $scope.saveHelper = function () {
        $scope.formBusy = true;
        var package = JSON.parse(JSON.stringify($scope.package));
        delete package["servicesComma"];
        delete package["errors"];
        package.duration = parseFloat(package.duration);
        console.log(package);

        if (package.id == 0) {
            delete package["id"];
            $http.post(APIURL_package, package).then(function (respackage) {
                let packageId = respackage.data.id;
                $scope.services.forEach(function (item) {
                    if (item.isCheck) {
                        $http.post(APIURL_packageServicesSelected, {
                            "packageId": packageId,
                            "packegeServiceId": item.id
                        });
                    }
                });
                $timeout(m => {
                    $('#myModal').modal('hide');
                    $scope.clear();
                    $scope.getpackages();
                    $scope.success = true;
                }, 1000)
            });
        } else {

            $http.put(APIURL_package, package).then(function (respackage) {
                $scope.services.forEach(function (item) {
                    if (item.isCheck && !item.packageservicesselectedId) {
                        $http.post(APIURL_packageServicesSelected, {
                            "packageId": package.id,
                            "packegeServiceId": item.id
                        });
                    }
                });
                $scope.packageservicesselectedDeleted.forEach(function (item) {
                    $http.delete(APIURL_packageServicesSelected + "?id=" + item);
                })
                $timeout(m => {
                    $('#myModal').modal('hide');
                    $scope.clear();
                    $scope.getpackages();
                    $scope.success = true;
                }, 1000)
            });
        }
    }
    $scope.delete = function (packageId) {
        if (confirm('Do you really want to delete the package?')) {
            $http.delete(APIURL_package + "?id=" + packageId).then(function (res) {
                $http.get(APIURL_packageServicesSelected + "?packageId=" + packageId).then(function (res) {
                    res.data.forEach(packageservicesselected => {
                        $http.delete(APIURL_packageServicesSelected + packageservicesselected.id);
                    });

                })
                $scope.clear();
                $scope.success = true;
                $scope.getpackages();
            })
        }
    }

});

// console.log(CMS_APP);