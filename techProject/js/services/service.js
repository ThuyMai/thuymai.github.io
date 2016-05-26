vegeApp.factory('vegeProductsFactory', function ($resource) {
   return $resource('/products'); 
});