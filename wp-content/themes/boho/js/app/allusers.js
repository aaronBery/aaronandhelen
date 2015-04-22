define(["angular"],
    function(angular){
        var app = angular.module("rsvpApp", []);

		app.controller("rsvpController", function($scope, $http) {
	    	$http.get("/venue/json-feed/").success(function(data){
	    		$scope.xhrData = data;
	    	});
		});
    }
);