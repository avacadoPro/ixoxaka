CMS_APP.service('imageUploadService', ['$http', function ($http) {
    this.uploadImage = function (input, path) {
        var promise = new Promise(function (resolve, reject) {
            const uploadData = new FormData();
            uploadData.append('file', input);
            uploadData.append('path', path);
            $http({
                method: 'post',
                url: imageUploadingAPI,
                data: uploadData,
                headers: {
                    'Content-Type': undefined
                },
            }).then(function (response) {
                if(response.data.status){
                    resolve(response.data.filename);
                }else{
                    reject(response.data.message);
                }
            }, function (error) {
                reject(error);
            });
        })
        return promise;
    }
}]);