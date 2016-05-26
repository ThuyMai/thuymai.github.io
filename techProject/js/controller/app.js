var vegeApp = angular.module('vegeApp', ['ngRoute', 'ngResource']);
vegeApp.controller('indexController', function ($scope,  vegeProductsFactory){
    $scope.vegeProducts = vegeProductsFactory.query();

});
