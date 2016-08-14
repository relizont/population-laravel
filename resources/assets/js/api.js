var app = angular.module('populationApp',[],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('populationController', function($scope, $http) {
 
    $scope.highestPopulationList = [];    
    $scope.loading = false;

    $scope.showPopulationList = true; // we'll get these later
    $scope.selectedCountryId = ''; // we'll get these later
    $scope.selectedCityId = ''; // we'll get these later
    $scope.selectedGenderId = ''; // we'll get these later

    $scope.countryOptions = []; // we'll get these later
    $scope.cityOptions = []; // we'll get these later
    $scope.genderOptions = []; // we'll get these later
    $scope.populationTypeList = []; // we'll get these later

    $scope.getCountryPopulation = function(){
        
        $scope.loading = true;

        $http.get('api/population/country').
        success(function(data, status, headers, config) {
            $scope.countryOptions = data;
            $scope.listPopulationType();
            $scope.loading = false;
        });

    };

    $scope.getCityPopulationListByCountry = function(){
        
        $scope.loading = true;

        $http.get('api/population/city/'+$scope.selectedCountryId).
        success(function(data, status, headers, config) {
            $scope.cityOptions = data;
            $scope.listPopulationType();
            $scope.loading = false; 
        });

    };

    $scope.getGenderPopulationByCity = function(){        
        $scope.loading = true;
        $http.get('api/population/gender/'+$scope.selectedCountryId+'/'+$scope.selectedCityId).
        success(function(data, status, headers, config) {
            $scope.genderOptions = data;
            $scope.listPopulationType();
            $scope.loading = false; 
        });                
    };

    $scope.listPopulationType = function(){        
        $scope.loading = true;
        $http.get('api/population/type/'+$scope.selectedCountryId+'/'+$scope.selectedCityId+'/'+$scope.selectedGenderId).
        success(function(data, status, headers, config) {
            $scope.populationTypeList = data;            
            $scope.loading = false; 
        });                
    };
 
    $scope.init = function() {        
        $scope.loading = true;
        $http.get('api/population').
        success(function(data, status, headers, config) {
            $scope.highestPopulationList = data;
            $scope.getCountryPopulation();
            $scope.loading = false; 
        });
    }

    $scope.init();
 
});