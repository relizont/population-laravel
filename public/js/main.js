var app = angular.module('populationApp',[],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

var option1Options = ["option1 - 1", "option1 - 2", "option1 - 3"];
var option2Options = [["option2 - 1-1","option2 - 1-2","option2 - 1-3"],
               ["option2 - 2-1","option2 - 2-2","option2 - 2-3"],
               ["option2 - 3-1","option2 - 3-2","option2 - 3-3"]];

app.controller('populationController', function($scope, $http) {
 
    $scope.populationData = [];    
    $scope.loading = false;

    $scope.options1 = option1Options;
    $scope.options2 = []; // we'll get these later

    $scope.getCityListByCountry = function(){
        // just some silly stuff to get the key of what was selected since we are using simple arrays.
        var key = $scope.options1.indexOf($scope.option1);
        // Here you could actually go out and fetch the options for a server.
        var myNewOptions = option2Options[key];
        // Now set the options.
        // If you got the results from a server, this would go in the callback
        $scope.options2 = myNewOptions;
    };
 
    $scope.init = function() {
        $scope.loading = true;
        $http.get('/api/population').
        success(function(data, status, headers, config) {
            $scope.populationData = data;
            $scope.loading = false; 
        });
    }

    $scope.init();
 
});

