define(["angular"],
    function(angular){
        var app = angular.module("rsvpApp", []);

		app.controller("rsvpController", function($scope, $http) {
	    	$http.get("/rsvp/angular-feed/").success(function(data){
	    		$scope.xhrData = data;
	    	});
		});
    }
);
