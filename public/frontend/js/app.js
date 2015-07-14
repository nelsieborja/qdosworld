(function() {	
	var app = angular.module('tradingApp', ['ui.bootstrap', 'ngSanitize']);
	var baseURL = $('html').data('baseurl');

	app.controller('AppController', function($scope, $location) {
		$scope.isView = false;
		$scope.products = {};
		$scope.product = {};
		// $scope.oldURL = '';
		
		this.viewProduct = function(id) {
			$scope.product = $scope.products[id];
			
			$scope.isView = true;
			
			// $scope.oldURL = $location.path();
			// $location.path('/view/'+id);
			

			$("body,html").animate({scrollTop: 120}, 300);
		};
		
		this.hideProduct = function() {
			$scope.isView = false;
		};
	});
	
	app.directive("categoryList", function() {
		return {
			restrict: "E",
			templateUrl: baseURL+"template/categorylist",
			controller: function($scope, $http) {
				$scope.categories = {};
				$http.get(baseURL+'categories').success(function(json) {
					if (!json.status || !json.data || json.status == 'ERROR') {
						return;
					}
					$scope.categories = json.data
				});
			}
		};
	});
	
	app.directive("productList", function() {
		return {
			restrict: "E",
			templateUrl: baseURL+"template/productlist",
			controller: function($scope, $http) {}
		};
	});
	
	app.directive("productView", function() {
		return {
			restrict: "E",
			templateUrl: baseURL+"template/productview",
			controller: function($scope, $http) {}
		};
	});
})();