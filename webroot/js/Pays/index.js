var onloadCallback = function() {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};


var app = angular.module('app', []);

app.controller('UsersController', function($scope, $http) {

    $scope.login = function () {

        if (grecaptcha.getResponse(widgetId1) == '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }

        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json', 'Content-Type': 'application/json', 'X-CSRF-Token': token
            },
            data: {email: $scope.username, password: $scope.password}
        }
        
        $http(req)
                .then(function (jsonData, status, headers, config) {
                    // console.log(jsonData.data.token);
                    localStorage.setItem('token', jsonData.data.data.token);
                    localStorage.setItem('user_id', jsonData.data.data.user_id);
                    $('#login').hide();
                    $('#logout').show();
                    alert('You have successfully logged in');
                },
                function(data, status, headers, config) {
                    //console.log(data.response.result);
                    alert('Error, cannot log in');
                });
    }
    
    $scope.logout = function () {
        localStorage.setItem('token', "no token");
        $('#logout').hide();
        $('#login').show();
        alert("You have successfully logged out");
    }
    
    $scope.changePassword = function () {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
                .then(function (response) {
                    alert('You have successfully changed your password');
                },
                function(response) {
                    //console.log(response);
                    alert('Error, cannot update your password');
                });
    }
});

app.controller('PaysController', ['$scope','PaysService',
    
    function ($scope, PaysService) {

    $scope.addPays = function () {
        if ($scope.pays !== null && $scope.pays.pays_nom) {
            console.log($scope.pays.pays_nom);
            PaysService.addPays($scope.pays.pays_nom, $scope.pays.pays_devise)
              .then (function success(response){
                  $scope.message = 'Country successfully added';
                  $scope.errorMessage = '';
                  $scope.getAllPays();
              },
              function error(response){
                  $scope.errorMessage = 'Could not add country';
                  $scope.message = '';
            });
        }
    }
    
    $scope.getPays = function (pays_code) {
        PaysService.getPays(pays_code)
          .then(function success(response){
              $scope.pays = response.data.data;
              $scope.pays.pays_code = pays_code;
              $scope.message='';
              $scope.errorMessage = '';
              //$scope.getAllPays();
              $('#addCountry').hide();
              $('#updateCountry').show();
          },
          function error (response ){
              $scope.message = '';
              if (response.status === 404){
                  $scope.errorMessage = 'Country not found';
              }
              else {
                  $scope.errorMessage = "Cannot get country";
              }
          });
    }
    
    $scope.getAllPays = function () {
        PaysService.getAllPays()
          .then(function success(response){
              $scope.pays = response.data.data;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message='';
              $scope.errorMessage = 'Cannot get countries';
          });
    }

    $scope.updatePays = function () {
        PaysService.updatePays($scope.pays.pays_code, $scope.pays.pays_nom, $scope.pays.pays_devise)
          .then(function success(response){
              $scope.message = 'Country has been updated';
              $scope.errorMessage = '';
              $scope.getAllPays();
              $('#addCountry').show();
              $('#updateCountry').hide();
          },
          function error(response){
              $scope.errorMessage = 'Cannot update country';
              $scope.message = '';
          });
    }
    
    $scope.deletePays = function (pays_code) {
        PaysService.deletePays(pays_code)
          .then (function success(response){
              $scope.message = 'Country has been deleted';
              $scope.pays = null;
              $scope.errorMessage='';
              $scope.getAllPays();
          },
          function error(response){
              $scope.errorMessage = 'Cannot delete country';
              $scope.message='';
          });
    }
    
    $scope.getAllPays();
}]);

app.service('PaysService',['$http', function ($http) {

    this.addPays = function addPays(pays_nom, pays_devise){
        return $http({
          method: 'POST',
          url: 'api/pays',
          data: {pays_nom:pays_nom, pays_devise:pays_devise},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json', 'X-CSRF-Token': token}
        });
    }

    this.getPays = function getPays(pays_code){
        return $http({
          method: 'GET',
          url: 'api/pays/'+ pays_code,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json', 'X-CSRF-Token': token}
        });
    }

    this.getAllPays = function getAllPays(){
        return $http({
          method: 'GET',
          url: 'api/pays',
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json', 'X-CSRF-Token': token}
        });
    }

    this.deletePays = function deletePays(pays_code){
        return $http({
          method: 'DELETE',
          url: 'api/pays/' + pays_code,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json', 'X-CSRF-Token': token}
        });
    }

    this.updatePays = function updatePays(pays_code, pays_nom, pays_devise){
        return $http({
          method: 'PATCH',
          url: 'api/pays/' + pays_code,
          data: {pays_nom:pays_nom, pays_devise:pays_devise},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json', 'X-CSRF-Token': token}
        });
    }

}]);

$(document).ready(function() {
    localStorage.setItem('token', "no token");
    $('#logout').hide();
    $('#updateCountry').hide();
});