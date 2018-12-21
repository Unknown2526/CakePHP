var app = angular.module('linkedlists', []);

app.controller('paysController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.pays = response.data;
    });
});