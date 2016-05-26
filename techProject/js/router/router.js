vegeApp.config(function ($routeProvider) {
   $routeProvider
       .when('/', {
           templateUrl: "tmpl/index.html",
           controller: "indexControll"
       })
      
       .when('/products/:id', {
           templateUrl: "tmpl/product-detail.html",
           controller: "productDetailController"
       })
       .otherwise({
           redirectTo: '/'
       })
});