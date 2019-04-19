CMS_APP.controller('PortFolioController', function ($scope, $http, scopeService, imageUploadService, $timeout) {
    $scope.portfolio = {};
    $scope.portfolios = [];
    $scope.filteredPortfolios = [];
    $scope.categories = [];
    $scope.selectedprotfoliocategoriesDeleted = [];
    $scope.formBusy = false;
    $scope.searchTxt="";
    $scope.getPortfolios = function () {
        $http.get(apiURL + "/portfolio").then(function (res) {
            scopeService.safeApply($scope, function () {               
                $scope.portfolios = res.data.records;
                $scope.search();
                // $scope.portfolios.forEach(function (portfolio) {
                //     $http.get(apiURL + "/selectedprotfoliocategories?filter=portfolioId,eq," + portfolio.id).then(function (res) {
                //         let categories = "";
                //         res.data.records.forEach(function (selectedprotfoliocategory, key) {
                //             $http.get(apiURL + "/portfoliocategories/" + selectedprotfoliocategory.portfolioCategoryId).then(cat => {
                //                 categories += cat.data.title;
                //                 if (key != res.data.records.length - 1)
                //                     categories += ","
                //                 portfolio['categoriesComma'] = categories;                                
                //                 $scope.search();
                //             })


                //         });
                //     })
                // })
            });
        });
    }
    $scope.search=function() {
        console.log($scope.searchTxt );
        
        if ($scope.searchTxt != "") {
          $scope.filteredPortfolios = [];
          let s = $scope.searchTxt.toLowerCase();
          $scope.portfolios.forEach(m => {
            if (m.title.toLowerCase().includes(s) ||  (m.categoriesComma&&m.categoriesComma.toLowerCase().includes(s)) ) {
              $scope.filteredPortfolios.push(m);
            }
          })
        } else {
          $scope.filteredPortfolios = $scope.portfolios;
        }
      }
    
    $scope.getPortfolios();

    $scope.Selected_image = function ($event) {
        $scope.portfolio.errors.imageError = null;
        var input = $event.target.files[0];
        if (input) {

            $scope.portfolio.imageInput = input;
            var reader = new FileReader();
            reader.onload = function (e) {
                var id = '#image';
                $(id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input);
        } else {
            $scope.portfolio.errors.imageError = "Invalid File";
        }
    };
    $scope.getallcategories = function () {
        $scope.categories = [];
        $scope.selectedprotfoliocategoriesDeleted = [];
        $http.get(apiURL + "/portfoliocategories").then(function (res) {
            scopeService.safeApply($scope, function () {
                res.data.records.forEach(function (category) {
                    category["isCheck"] = false;
                    $scope.categories.push(category);
                })
            });
        });
    }
    $scope.categoryClick = function (category) {
        if (category.isCheck && category.selectedprotfoliocategoryId) {
            let found = $scope.selectedprotfoliocategoriesDeleted.find(function (element) {
                return element == category.selectedprotfoliocategoryId;
            });
            if (!found) {
                $scope.selectedprotfoliocategoriesDeleted.push(category.selectedprotfoliocategoryId);
            }

        }
        category.isCheck = (category.isCheck) ? false : true;

    }
    $scope.clear = function () {
        $scope.portfolio = {
            id: 0,
            title: "",
            type: "test",
            image: "images/portfolio-background-design_1223-57.jpg",
            imageInput: null,
            categories: "",
            categoriesComma: "",
            visibleonhome: 0,
            errors: {
                imageError: null
            }
        };
        $scope.formBusy = false;
        $scope.getallcategories();
    }
    $scope.clear();

    $scope.Load = function (portfolio) {
        $scope.portfolio = JSON.parse(JSON.stringify(portfolio));        
        $scope.portfolio.image = $scope.portfolio.image;
        $scope.portfolio.visibleonhome = ($scope.portfolio.visibleonhome==1)?true:false;
        $scope.portfolio["errors"] = {
            imageError: null
        };
        $http.get(apiURL + "/selectedprotfoliocategories?filter=portfolioId,eq," + portfolio.id).then(function (res) {
            res.data.records.forEach(selectedprotfoliocategory => {
                findInCategories(selectedprotfoliocategory);
            });

        })
    }

    function findInCategories(selectedprotfoliocategory) {
        let category = $scope.categories.find(m => m.id == selectedprotfoliocategory.portfolioCategoryId);
        category.isCheck = true;
        category["selectedprotfoliocategoryId"] = selectedprotfoliocategory.id;
    }

    $scope.save = function () {
        if ($scope.portfolio.imageInput) {
            imageUploadService.uploadImage($scope.portfolio.imageInput, "portfolio_images").then(savedImagePath => {
                $scope.portfolio.image = savedImagePath;
                $scope.saveHelper();
            }).catch(e => {
                $scope.saveHelper();
            })
        } else {
            $scope.saveHelper();
        }

    }
    $scope.saveHelper = function () {
        $scope.formBusy = true;
        var portfolio = JSON.parse(JSON.stringify($scope.portfolio));
        delete portfolio["errors"];
        portfolio.categories=GetCategoriesString(" ");
        portfolio.categoriesComma=GetCategoriesString(",");
        portfolio.visibleonhome= (portfolio.visibleonhome)?1:0;
        
        if (portfolio.id == 0) {
            delete portfolio["id"];
            $http.post(apiURL + "/portfolio", portfolio).then(function (resPortfolio) {
                let portfolioId = resPortfolio.data;
                $scope.categories.forEach(function (item) {
                    if (item.isCheck) {
                        $http.post(apiURL + "/selectedprotfoliocategories", {
                            "portfolioId": portfolioId,
                            "portfolioCategoryId": item.id
                        });
                    }
                });
                $timeout(m => {
                    $('#myModal').modal('hide');
                    $scope.clear();
                    $scope.getPortfolios();
                    $scope.success = true;
                }, 1000)
            });
        } else {
            console.log(portfolio);
            
            $http.put(apiURL + "/portfolio/" + portfolio.id, portfolio).then(function (resPortfolio) {
                $scope.categories.forEach(function (item) {
                    if (item.isCheck && !item.selectedprotfoliocategoryId) {
                        $http.post(apiURL + "/selectedprotfoliocategories", {
                            "portfolioId": portfolio.id,
                            "portfolioCategoryId": item.id
                        });
                    }
                });
                $scope.selectedprotfoliocategoriesDeleted.forEach(function (item) {
                    $http.delete(apiURL + "/selectedprotfoliocategories/" + item);
                })
                $timeout(m => {
                    $('#myModal').modal('hide');
                    $scope.clear();
                    $scope.getPortfolios();
                    $scope.success = true;
                }, 1000)
            });
        }
    }
    function GetCategoriesString(seprator) {
        let categories="";
        let CategoriesList=[];
        $scope.categories.forEach(item=>{
            if(item.isCheck){
                CategoriesList.push(item);
            }
        })
        CategoriesList.forEach((item,key)=>{
                categories+=item.title;
                if(key!=CategoriesList.length-1){
                    categories+=seprator;
                }            
        })
        return categories;
    }
    $scope.delete = function (portfolioId) {
        if (confirm('Do you really want to delete the Portfolio?')) {
            $http.delete(apiURL + "/portfolio/" + portfolioId).then(function (res) {
                $http.get(apiURL + "/selectedprotfoliocategories?filter=portfolioId,eq," + portfolioId).then(function (res) {
                    res.data.records.forEach(selectedprotfoliocategory => {
                        $http.delete(apiURL + "/selectedprotfoliocategories/" + selectedprotfoliocategory.id);
                    });

                })
                $scope.clear();
                $scope.success = true;
                $scope.getPortfolios();
            })
        }
    }

});

// console.log(CMS_APP);