var app = angular.module('populationApp',[],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('populationController', function($scope, $http) {
 
    $scope.populationData = [];    
    $scope.loading = false;

    $scope.showPopulationList = false; // we'll get these later
    $scope.selectedCountryId = null; // we'll get these later
    $scope.selectedCityId = null; // we'll get these later
    $scope.selectedGenderId = null; // we'll get these later

    $scope.countryOptions = []; // we'll get these later
    $scope.cityOptions = []; // we'll get these later
    $scope.genderOptions = []; // we'll get these later
    $scope.populationTypeList = []; // we'll get these later

    $scope.getCountryPopulation = function(){
        
        $scope.loading = true;

        $http.get('/api/population/country').
        success(function(data, status, headers, config) {
            $scope.countryOptions = data;
            $scope.loading = false; 
            // console.log($scope.selectedCountryId,$scope.cityOptions);
        });

    };

    $scope.getCityPopulationListByCountry = function(){
        
        $scope.loading = true;

        $http.get('/api/population/city/'+$scope.selectedCountryId).
        success(function(data, status, headers, config) {
            $scope.cityOptions = data;
            $scope.loading = false; 
            // console.log($scope.selectedCountryId,$scope.cityOptions);
        });

    };

    $scope.getGenderPopulationByCity = function(){        
        $scope.loading = true;
        $http.get('/api/population/gender/'+$scope.selectedCityId).
        success(function(data, status, headers, config) {
            $scope.genderOptions = data;
            $scope.loading = false; 
            // console.log($scope.selectedCityId,$scope.genderOptions);
        });                
    };

    $scope.listPopulationType = function(){        
        $scope.loading = true;
        $http.get('/api/population/type/'+$scope.selectedGenderId).
        success(function(data, status, headers, config) {
            $scope.populationTypeList = data;
            
            if ($scope.selectedGenderId) 
                $scope.showPopulationList = true;
            else
                $scope.showPopulationList = false;
            
            $scope.loading = false; 
            // console.log($scope.selectedGenderId,$scope.populationTypeList);
        });                
    };
 
    $scope.init = function() {        
        $scope.loading = true;
        $http.get('/api/population').
        success(function(data, status, headers, config) {
            $scope.populationData = data;
            $scope.getCountryPopulation();
            $scope.loading = false; 
        });
    }

    $scope.init();
 
});

