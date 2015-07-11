(function() {
	/* angular.module('store', [])
	.factory('storeFactory', function() {
		var items = {};
		// var convert = function (amount, inCurr, outCurr) {
		// return amount * usdToForeignRates[outCurr] / usdToForeignRates[inCurr];
		// };

		return items;
	}); */
  
	var app = angular.module('tradingApp', ['productModule', 'ui.bootstrap', 'ngSanitize']);
	var folderPath = '_trading/';
	var backendPath = '_trading/backend/';
	var items = {};
	
	app.controller('AppController', function(Store, $scope) {
		$scope.currentTab = 0;
		$scope.showError = false;
		$scope.showDetails = false;
		$scope.product = {}
		
		this.isCurrentTab = function(checkTab) {
			return $scope.currentTab === checkTab;
		};
		
		this.setTab = function(activeTab) {
			$scope.currentTab = activeTab;
			
			// Check if tab dont exists, then need to show error message
			// if (!$('#tab'+activeTab).length) { // OR: if (Store.items[activeTab] == undefined) {
			if (Store.items[activeTab] == undefined) {
				this.setError(true);
			} else {
				this.setError(false);
			}
		};
		
		this.setError = function(setTo) {
			$scope.showError = setTo;
		};
		
		this.showProductDetails = function(id) {
			// console.log(Store.items[$scope.currentTab].products[id]);
			$scope.product = Store.items[$scope.currentTab].products[id];
			$scope.showDetails = true;
			
			// console.log($('#carousel').attr('class'));
			// test = $('#carousel').carousel()
			// console.log(test);
		};
		
		this.hideProductDetails = function() {
			$scope.showDetails = false;
		};
	});
	
	app.directive("breadcrumbs", function() {
		return {
			restrict: "E",
			templateUrl: "template/breadcrumbs"
			// controller: function($scope, $http) {
				// $scope.categories = {};
				// $http.get(backendPath+'get_categories.php').success(function(json) {
					// if (!json.status || !json.data) {
						// $scope.categories['error'] = 'Please contact administrator';
						// return;
					// }
					// if (json.status == 'ERROR') {
						// $scope.categories['error'] = json.msg;
						// return;
					// }
					
					// $scope.categories = json.data
				// });
			// },
			// controllerAs: "tab"
		};
	});
	
	app.directive("categoryList", function() {
		return {
			restrict: "E",
			templateUrl: "template/categorylist",
			controller: function($scope, $http) {
				$scope.categories = {};
				$http.get('categories').success(function(json) {
					if (!json.status || !json.data || json.status == 'ERROR') {
						return;
					}
					
					$scope.categories = json.data
					console.log($scope.categories);
				});
			}
		};
	});
	
	app.directive('categoryContent', function(CategoryItemResource, Store, $compile){
		return {
			restrict: 'E',
			link: function(scope, elem, attrs){
				CategoryItemResource.loadData().then(function(result){
					json = result.data;
					if (!json.status || !json.data) {
						elem.append('<h3 class="content-error">Please contact administrator</h3>');

					} else if (json.status == 'ERROR') {
						// app.setError(true)
						// var s = angular.element(document.body).scope();
						// console.log(s);
						// s.$apply(function () {
						// s.setError(true);
						// });
						// elem.append('<h3 class="content-error">'+json.msg+'</h3>');

					} else {
						scope.items = json['data'];
						var htm = '<category-item id="tab{{item.id}}" ng-show="app.isCurrentTab(item.id)" ng-repeat="item in items"></category-item>';
						var compiled = $compile(htm)(scope);
						elem.append(compiled);

						// Save items to Store
						Store.saveItems(json.data);
					}

				});
			}
		}
	});
	app.directive('categoryItem', function(){
	  return {
		restrict: 'E',
		templateUrl: folderPath+"category-content.html",
	  }
	});
	app.factory('CategoryItemResource', function($http){
	  var CategoryItemResource = {};

	  CategoryItemResource.loadData = function(){
		return $http.post(backendPath+'get_items.php');
	  }

	  return CategoryItemResource;
	});
	app.factory('Store', function(){
		var Store = {};

		Store.saveItems = function(items){
			Store.items = items;
		};
	  return Store;
	});
	
	// CATEGORY TAB CONTENT
	/* app.directive("categoryContent", function() {
		return {
			restrict: "E",
			templateUrl: "_trading/category-content.html",
			controller: function($scope, $http) {
				$scope.items = {};
				this.getItems = function() {
					$http.post(backendPath+'get_items.php', {category_id: currentTab}).success(function(json) {
						console.log(json);
						if (!json.status || !json.data) {
							$scope.items['error'] = 'Please contact administrator';
							return;
						}
						if (json.status == 'ERROR') {
							$scope.items['error'] = json.msg;
							return;
						}
						
						$scope.items = json.data
					});
				}
				this.getItems();
			},
			// controllerAs: "tab"
		};
	}); */
	
	// HOME TAB CONTENT
	app.directive("homeContent", function() {
		return {
			restrict: "E",
			templateUrl: folderPath+"home.html"
		};
	});
  
  
  // app.controller('StoreController', function(){
    // this.products = gems;
  // });

  // app.controller('ReviewController', function() {
    // this.review = {};

    // this.addReview = function(product) {
      // product.reviews.push(this.review);

      // this.review = {};
    // };
  // });

  var gems = [{
      name: 'Azurite',
      description: "Some gems have hidden qualities beyond their luster, beyond their shine... Azurite is one of those gems.",
      shine: 8,
      price: 110.50,
      rarity: 7,
      color: '#CCC',
      faces: 14,
      images: [
        "images/gem-02.gif",
        "images/gem-05.gif",
        "images/gem-09.gif"
      ],
      reviews: []
    }, {
      name: 'Bloodstone',
      description: "Origin of the Bloodstone is unknown, hence its low value. It has a very high shine and 12 sides, however.",
      shine: 9,
      price: 22.90,
      rarity: 6,
      color: '#EEE',
      faces: 12,
      images: [
        "images/gem-01.gif",
        "images/gem-03.gif",
        "images/gem-04.gif",
      ],
      reviews: []
    }, {
      name: 'Zircon',
      description: "Zircon is our most coveted and sought after gem. You will pay much to be the proud owner of this gorgeous and high shine gem.",
      shine: 70,
      price: 1100,
      rarity: 2,
      color: '#000',
      faces: 6,
      images: [
        "images/gem-06.gif",
        "images/gem-07.gif",
        "images/gem-08.gif"
      ],
      reviews: []
    }];
})();