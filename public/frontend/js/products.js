(function() {
  var app = angular.module('productModule', []);
  var folderPath = '_trading/';
  
  app.directive("productDescription", function() {
    return {
      restrict: 'E',
      templateUrl: folderPath+"product-description.html"
    };
  });

  app.directive("productSpecs", function() {
    return {
      restrict: 'E',
      templateUrl: folderPath+"product-specs.html"
    };
  });
  
  // app.directive("carousel", function() {
    // return {
      // restrict: 'E',
      // templateUrl: folderPath+"carousel.html"
    // };
  // });

  app.directive("productTabs", function() {
    return {
      restrict: "E",
      templateUrl: folderPath+"product-tabs.html",
      controller: function() {
        this.tab = 1;

        this.isSet = function(checkTab) {
          return this.tab === checkTab;
        };

        this.setTab = function(activeTab) {
          this.tab = activeTab;
        };
      },
      controllerAs: "tab"
    };
  });
})();
